<?php
// include necessary files 
require_once '../resources/config.php';
require_once '../users/user.php';
require_once '../auth/authenticator.php';
require_once '../finance/finance.php';

$conn = DatabaseConnection::getInstance();
// Create User,finance and Authenticator instances
$user = new User($conn);
$authenticator = new Authenticator($conn);
$finance=new Finance($conn);

// get the action specified whether a get or post  action
$action = isset($_POST['action']) ? clean($_POST['action']) : (isset($_GET['action']) ? clean($_GET['action']) : null);
// Handle different API actions based on POST data
switch ($action) {
    case 'register':
        /* Exaample usage;
         $postData = [
        'action' => 'register',
        'firstName' => 'John',
        'lastName' => 'Doe',
        'pin' => '1234',
    ];*/
        
        $firstName = isset($_POST['firstName']) ? clean($_POST['firstName']) : null;
        $lastName = isset($_POST['lastName']) ? clean($_POST['lastName']) : null;
        $pin = isset($_POST['pin']) ? clean($_POST['pin']) : null;
        if (empty($firstName) || empty($lastName) || empty($pin)) {
            echo json_encode(array("error" => "Missing required fields"));
            exit;
        }

        $userId = $user->createUser($firstName, $lastName, $pin);
        if (is_numeric($userId)) {
            // Create the user account
            $accountNumber = $finance->createUserAccount($userId);
            if (!$accountNumber) {
                echo json_encode(array("error" => "error creating user"));
                exit;
            }
            // show user logged in
            $authenticator->insertUserLogin($userId, 'YES');
            echo json_encode(array("success" => true, "userId" => $userId));
        } else {
            echo json_encode(array("error" => "error creating user")); 
        }
        break;



        // loggin in the user with acc_no and pin
    case 'login':
        /* example usage
        $postData = [
            'action' => 'login',
            'accountNumber' => '1234567890',
            'pin' => '1234',
        ];
        */
        $accountNumber = isset($_POST['accountNumber']) ? clean($_POST['accountNumber']) : null;
        $pin = isset($_POST['pin']) ? clean($_POST['pin']) : null;

        if (empty($accountNumber) || empty($pin)) {
            echo json_encode(array("error" => "Missing required fields"));
            exit;
        }

        $loggedIn = $authenticator->login($accountNumber, $pin);
        if ($loggedIn) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("error" => "Invalid login credentials"));
        }
        break;



        // checking the user account balance
    case 'check_balance':
        /* example usage
        $getData = [
            'action' => 'check_balance',
            'userId' => '1',
        ];
        */
        $userId = isset($_GET['userId']) ? clean($_GET['userId']) : null;
        if (empty($userId)) {
            echo json_encode(array("error" => "Missing required field: userId"));
            exit;
        }

        $userData = $finance->getUserBalances($userId);
        if ($userData) {
            echo json_encode(array("success" => true, "data" => $userData));
        } else {
            echo json_encode(array("error" => "Accounts not found"));
        }
        break;



        // getting financial tips
    case 'get_financial_tips':
        /* example usage
        $GETData = [
            'action' => 'get_financial_tips',
        ];
        */
        $tips = $user->getFinancialTips();
        if ($tips) {
            echo json_encode(array("success" => true, "data" => $tips));
        } else {
            echo json_encode(array("message" => "No financial tips found"));
        }
        break;



        // changing the pin
    case 'change_pin':
         /* example usage
        $postData = [
            'action' => 'change_pin',
            'userId' => '1',
            'oldPin' => '1234',
            'newPin' => '5678',
        ];
        */
        $userId = isset($_POST['userId']) ? clean($_POST['userId']) : null;
        $oldPin = isset($_POST['oldPin']) ? clean($_POST['oldPin']) : null;
        $newPin = isset($_POST['newPin']) ? clean($_POST['newPin']) : null;

        if (empty($userId) || empty($oldPin) || empty($newPin)) {
            echo json_encode(array("error" => "Missing required fields"));
            exit;
        }
        $changedPin = $user->changePin($userId, $oldPin, $newPin);
        if ($changedPin) {
            echo json_encode(array("success" => "Pin succesfully changed"));
        } else {
            echo json_encode(array("error" => "Error changing Pin"));
        }

        break;


       // fetching user details using userID
case 'fetch_user_details':
     /* example usage
    $getData = [
        'action' => 'fetch_user_details',
        'userId' => '1',
    ];
    */
    $userId = isset($_GET['userId']) ? clean($_GET['userId']) : null;
    if (empty($userId)) {
        echo json_encode(array("error" => "Missing required fields"));
        exit;
    }
    $userDetails = $finance->getUserByID($userId);
    // if user exists
    if ($userDetails) {
        echo json_encode(array("success" => true, "data" => $userDetails));
    } else {
        echo json_encode(array("error" => "User not found"));
    }
    break;


// depositing amount either cash or cheque
case 'deposit':
     /* example usage
    $postData = [
        'action' => 'deposit',
        'userId' => '1',
        'amount' => '100',
        'amountType' => 'CHEQUE/CASH',
        'chequeNumber' => '123456',
    ];*/
    $userId = isset($_POST['userId']) ? clean($_POST['userId']) : null;
    $amount = isset($_POST['amount']) ? clean($_POST['amount']) : null; 
    $chequeNumber = isset($_POST['chequeNumber']) ? clean($_POST['chequeNumber']) : null; 
    $amountType = isset($_POST['amountType']) ? clean($_POST['amountType']) : null; 
    if (empty($userId) || empty($amount) || empty($amountType)) {
        echo json_encode(array("error" => "Missing required fields"));
        exit;
    }
    // Perform the deposit operation
    $depositResult = $finance->deposit($userId, $amount, $amountType,$chequeNumber);
    if ($depositResult) {
        echo json_encode(array("success" => true, "message" => "Deposit successful"));
    } else {
        echo json_encode(array("error" => "Failed to deposit"));
    }
    break;


    // stop cheque deposit
    case 'stop_cheque':
         /* example usage
        $postData = [
            'action' => 'stop_cheque',
            'userId' => '1',
            'chequeNumber' => '123456',
        ];
        */
        $chequeNumber = isset($_POST['chequeNumber']) ? clean($_POST['chequeNumber']) : null;
        $userId = isset($_POST['userId']) ? clean($_POST['userId']) : null;
        if (empty($chequeNumber) || empty($userId)) {
            echo json_encode(array("error" => "Missing required field: chequeNumber"));
            exit;
        }
        // Perform the stop deposit operation
        $stopDepositResult = $finance->stopDeposit($userId,$chequeNumber);
        if ($stopDepositResult) {
            echo json_encode(array("success" => true, "message" => "Stop deposit successful"));
        } else {
            echo json_encode(array("error" => "Failed to stop deposit"));
        }

        break;
        
        // $_GET["action"] or $_POST["action"] not specified
    default:
        echo json_encode(array("error" => "Invalid API action"));
}

// Close connection
$conn = null;
