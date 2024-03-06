<?php

  $siteName="Mobile Banking";
  $youtubeChannel ="https://www.youtube.com";
  $siteLocation="Nairobi";
  $siteContact="+254 793 610 821";
  $siteEmail="mobileBanking@email.com";
  class DatabaseConnection {
    private static $instance = null;
    private static $connection = null;

    private function __construct() {
        // Create a new PDO instance
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "MOBILEBANKING";
        try {
            // Create a new PDO instance if a connection doesn't exist or connection is lost
            if (self::$connection === null || !$this->isConnectionActive()) {
                self::$connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // Disable strict mode
                self::$connection->exec("SET sql_mode = ''");
                // Set PDO error mode to exception
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    private function isConnectionActive() {
        // Check if the connection is active
        return self::$connection !== null && self::$connection->getAttribute(PDO::ATTR_CONNECTION_STATUS) === "Connection successful";
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
            self::$instance->retryConnection();
        }
        return self::$connection;
    }

    // function to retry database connection connection
    private function retryConnection() {
        $retryCount = 0;
        $maxRetries = 3;
        while (self::$connection === null && $retryCount < $maxRetries) {
            sleep(1); // Wait for 1 second before retrying
            self::$instance = new self();
            $retryCount++;
        }

        if (self::$connection === null) {
            // Failed to establish a connection after maximum retries
            die("Failed to connect to the database");
        }
    }
}



 //clean user input to prevent mysql injection
  function clean($data){
      $data=trim($data);
      $data=implode("",explode("\\",$data)); // Replace backslashes
      $data=stripslashes($data);
      $data=htmlspecialchars($data);//strip html tags
      return $data;
  }

  ?>