<?php
class Finance {

    private $user;
    private $authenticator;
  private $conn;
    public function __construct(PDO $conn) {
        $this->conn=$conn;
        $this->authenticator = new Authenticator($conn);
        $this->user=new User($conn);
    }
// get user info by account number
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
            $this->authenticator->insertUserLogin($user['USER_ID'], 'YES');
            return true;
        } else {
            // Incorrect PIN
            $this->authenticator->insertUserLogin($user['USER_ID'], 'NO');
            return false;
        }
    } catch (PDOException $e) {
        error_log("PDO error :" .$e->getMessage());
        return false;
    }
}


// function to get user balances  by userid
public function getUserBalances($userId) {
    try {
        $query = "
            SELECT ACCOUNT.ACCOUNT_NO, ACCOUNT.BALANCE
            FROM USERS
            JOIN ACCOUNT ON USERS.USER_ID = ACCOUNT.USER_ID
            WHERE USERS.USER_ID = ?
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            return null; 
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("PDO error :" .$e->getMessage());
       return false;
    }
}

// function to create user account
function createUserAccount($userId){
    try {
        // Generate a unique account number
        $accountNumber = $this->generateUniqueAccountNumber($userId);
        // Check if the generated account number already exists
        $query = "SELECT ACCOUNT_ID FROM ACCOUNT WHERE ACCOUNT_NO = ?";
        $existingAccountStmt = $this->conn->prepare($query);
        $existingAccountStmt->execute([$accountNumber]);
        if ($existingAccountStmt->rowCount() > 0) {
            return false;
        }
        // If account number does not exist
        $createAccountQuery = "INSERT INTO ACCOUNT (ACCOUNT_NO, USER_ID, BALANCE) VALUES (?, ?, ?)";
        $createAccountStmt = $this->conn->prepare($createAccountQuery);
        $createAccountStmt->execute([$accountNumber, $userId,0]);
        return $accountNumber;
    } catch (PDOException $e) {
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


// generate a unique 20 digit account number
function generateUniqueAccountNumber($userId) {
    $prefix = "1000504";
    // Generate a random 13-digit number
    $randomNumber = str_pad(mt_rand(1, 9999999999), 13, '0', STR_PAD_LEFT);
    $accountNumber = $prefix . $userId . $randomNumber;
    return $accountNumber;
}


// function to deposit to a given account number 
function deposit($userId, $amount,  $amount_type,$cheque_no=null) {
    $type="DEPOSIT";
    try {
        $this->conn->beginTransaction();
        // Get user details including account number
        $userDetails = $this->getUserByID($userId);
        $accountID = $userDetails['accountID'];

        // Log the deposit transaction
        $transactionQuery = "INSERT INTO TRANSACTIONS (AMOUNT, TYPE, AMOUNT_TYPE,CHEQUE_NO,ACCOUNT_ID,CHEQUE_STATUS) VALUES (?, ?, ?,?,?,?)";
        $transactionStmt = $this->conn->prepare($transactionQuery);
        $transactionStmt->execute([$amount, $type, $amount_type,$cheque_no,$accountID,"ACTIVE"]);
        $transactionId = $this->conn->lastInsertId();

        // Update the account balance
        $updateBalanceQuery = "UPDATE ACCOUNT SET BALANCE = BALANCE + ? WHERE USER_ID = ?";
        $updateBalanceStmt = $this->conn->prepare($updateBalanceQuery);
        $updateBalanceStmt->execute([$amount, $userId]);

        // Commit the transaction
        $this->conn->commit();

        return true;
    } catch (PDOException $e) {
        $this->conn->rollBack();
        error_log("PDO error :" .$e->getMessage());
        return false;
    }
}


// get User by Userid with account number and account ID
public function getUserByID($userId) {
    try {
        $query = "SELECT USERS.*, ACCOUNT.ACCOUNT_NO AS accountNumber, ACCOUNT.ACCOUNT_ID AS accountID
                  FROM USERS
                  LEFT JOIN ACCOUNT ON USERS.USER_ID = ACCOUNT.USER_ID
                  WHERE USERS.USER_ID=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$userId]);

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    } catch (PDOException $e) {
       error_log("PDO error :" .$e->getMessage());
        return null;
    }
}



// Function to stop a deposit transaction based on cheque number
public function stopDeposit($userId,$chequeNumber) {
    try {
        $this->conn->beginTransaction();
        // Get user details including account number
        $userDetails = $this->getUserByID($userId);
        $accountID = $userDetails['accountID'];
        // Find the deposit transaction based on the cheque number
        $findTransactionQuery = "SELECT * FROM TRANSACTIONS WHERE TYPE = 'DEPOSIT' 
        AND ACCOUNT_ID=?  AND AMOUNT_TYPE = 'CHEQUE' AND CHEQUE_NO = ? AND CHEQUE_STATUS = 'ACTIVE'";
        $findTransactionStmt = $this->conn->prepare($findTransactionQuery);
        $findTransactionStmt->execute([$accountID,$chequeNumber]);

        if ($findTransactionStmt->rowCount() > 0) {
            $transaction = $findTransactionStmt->fetch(PDO::FETCH_ASSOC);
            // Reverse the deposit transaction
            $reverseDepositQuery = "UPDATE ACCOUNT SET BALANCE = BALANCE - ? WHERE USER_ID = ?";
            $reverseDepositStmt = $this->conn->prepare($reverseDepositQuery);
            $reverseDepositStmt->execute([$transaction['AMOUNT'],$userId]);

            // Update the cheque status to 'STOPPED'
            $updateChequeStatusQuery = "UPDATE TRANSACTIONS SET CHEQUE_STATUS = 'STOPPED' WHERE TRANSACTION_ID = ?";
            $updateChequeStatusStmt = $this->conn->prepare($updateChequeStatusQuery);
            $updateChequeStatusStmt->execute([$transaction['TRANSACTION_ID']]);

            // Commit the transaction
            $this->conn->commit();

            return true;
        } else {
            return false; // No active deposit found with the provided cheque number
        }
    } catch (PDOException $e) {
        $this->conn->rollBack();
        error_log("PDO error :" .$e->getMessage());
        return false;
    }
}


}//end of Finance class brace




?>