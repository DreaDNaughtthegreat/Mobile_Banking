<?php
class Authenticator {
    private $user;
    private $conn;
    public function __construct(PDO $conn) {
        $this->conn=$conn;
        $this->user=new User($conn);
    }

    public function login($accountNumber, $pin) {
        try {
            // Retrieve user information
            $loginSuccessful = $this->getUserByAccountNumber($accountNumber, $pin);
            return $loginSuccessful;
        } catch (PDOException $e) {
            error_log("PDO error :" .$e->getMessage());
            return false;
        }
    }

    // function to insert into USER_LOGIN table
public function insertUserLogin($userId, $successful) {
    try {
        $stmt = $this->conn->prepare("INSERT INTO USER_LOGIN (USER_ID, SUCCESSFUL) VALUES (?, ?)");
        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->bindParam(2, $successful, PDO::PARAM_STR);
        $stmt->execute();
        // Store user ID in a session after successful login
        if ($successful === 'YES') {
            session_start();
            $_SESSION['user_id'] = $userId;
            $_SESSION['logged_in'] = true;
            session_write_close();
        }
    } catch (PDOException $e) {
        error_log("PDO error :" .$e->getMessage());
       return false;
    }
}

  // function to change user Pin
  public function changePin($userId, $oldPin, $newPin) {
    try {
        $this->conn->beginTransaction();
        // Retrieve hashed pin from the database
        $stmt = $this->conn->prepare("SELECT PIN FROM USERS WHERE USER_ID = ?");
        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user || !password_verify($oldPin, $user['PIN'])) {
            return false;
        }
        // Change pin
        $hashedNewPin = password_hash($newPin, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE USERS SET PIN = ? WHERE USER_ID = ?");
        $stmt->bindParam(1, $hashedNewPin, PDO::PARAM_STR);
        $stmt->bindParam(2, $userId, PDO::PARAM_INT);
        $stmt->execute();
            // pin chabged successfully
        $this->conn->commit();
        return true;
    } catch (PDOException $e) {
        $this->conn->rollBack();
        error_log("PDO error :" .$e->getMessage());
        return false;
    }
}


// get user info by account number--for logging in user
public function getUserByAccountNumber($accountNumber, $pin) {
    try {
        // Retrieve user information based on the provided account number
        $stmt = $this->conn->prepare("
            SELECT USERS.USER_ID, USERS.PIN
            FROM USERS INNER
            JOIN ACCOUNT ON USERS.USER_ID = ACCOUNT.USER_ID
            WHERE ACCOUNT.ACCOUNT_NO = ?
        ");
        $stmt->execute([$accountNumber]);
        if ($stmt->rowCount() === 0) {
            return false; // User not found
        }
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($pin, $user['PIN'])) {
            // Login successful
            $this->insertUserLogin($user['USER_ID'], 'YES');
            return true;
        } else {
            // Incorrect PIN
            $this->insertUserLogin($user['USER_ID'], 'NO');
            return false;
        }
    } catch (PDOException $e) {
        error_log("PDO error :" .$e->getMessage());
        return false;
    }
}




}//end of class brace
?>
