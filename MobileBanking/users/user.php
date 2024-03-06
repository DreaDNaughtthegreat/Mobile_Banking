<?php
class User {

    private $conn;
  
    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }
  
    public function createUser($firstName, $lastName, $pin) {
        try {
            $this->conn->beginTransaction();
            // Check if the user with the same first and last name already exists
            $existingUserQuery = "SELECT USER_ID FROM USERS WHERE FIRST_NAME = ? AND LAST_NAME = ?";
            $existingUserStmt = $this->conn->prepare($existingUserQuery);
            $existingUserStmt->execute([$firstName, $lastName]);
            if ($existingUserStmt->rowCount() > 0) {
                return false;
            }
            // If user does not exist, proceed with creating a new user
            $query = "INSERT INTO USERS (FIRST_NAME, LAST_NAME, PIN) VALUES (?,?,?)";
            $stmt = $this->conn->prepare($query);
            $hashedPin = password_hash($pin, PASSWORD_DEFAULT);
            $stmt->execute([$firstName, $lastName, $hashedPin]);
            $userId = $this->conn->lastInsertId();
            $this->conn->commit();
            return $userId;
        } catch (PDOException $e) {
            $this->conn->rollBack();
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

        $this->conn->commit();
        return true;
    } catch (PDOException $e) {
        $this->conn->rollBack();
        error_log("PDO error :" .$e->getMessage());
        return false;
    }
}




// getting financial tips
public function getFinancialTips() {
    try {
        $stmt = $this->conn->prepare("SELECT * FROM FINANCIAL_TIPS");
        $stmt->execute();
        $tips = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tips;
    } catch (PDOException $e) {
        error_log("PDO error :" .$e->getMessage());
        return false;
    }
}



}//end of User class brace




?>