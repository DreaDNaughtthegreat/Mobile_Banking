
# Mobile Banking System

Mobile Banking is a straightforward PHP-MySQL banking system utilizing a Bootstrap5 Frontend that allows users to perform basic banking operations. This repository provides the necessary files to set up and run the application.

## Getting Started

Follow these steps to run the application locally:

1. **Download and Extract:**
   - Download the ZIP file and extract its contents.
   - Place the extracted folder in your server root directory.
  
   - open the  ```resources``` directory and change the variables below appropriately
     ```PHP
     $siteName="Mobile Banking";
     $youtubeChannel ="https://www.youtube.com";
     $siteLocation="City";
     $siteContact="+254 xxx xxx xxx";
     $siteEmail="mobileBanking@email.com";
     
     $servername = "mysql_host:mysql_port";
     $username = "your_mysql_username";
     $password = "your_mysql_password";
     ```
  
     the above variables re important in customizing the site and establishing a mysql connection
     , 

2. **Start Servers:**
   - Start your MySQL and Apache servers.

3. **Database Setup:**
   - Create a new database named `MOBILEBANKING`.
   - Import the SQL file ```MOBILEBANKING.sql``` located in the `db-file` folder into the `MOBILEBANKING` database.

      ```bash
      # Example command for MySQL command line
      mysql -u your_username -p MOBILEBANKING < path/to/db-file/MOBILEBANKING.sql
      or
      using phpMyadmin
      ```

4. **Launch the Application:**
   - Open your web browser and navigate to [http://localhost/banking](http://localhost/banking).

5. **Login Credentials:**
   - Use the following credentials to log in:
      - Account Number: 10005041000079103821
      - PIN: 1111
6. **rror logging**
The system supports error logging, to log in an error, you can edit ```php.ini``` and change this line ```error_log="PATH/error_log"``` replace PATH with the actual destination.
the aforementioned logs are accessible later in the specified file 

## Contributing
Contributions are welcome! Feel free to open issues or submit pull requests.

## License
This project is licensed under the [MIT License](LICENSE).

---



**Note:** Ensure that your server environment meets the requirements, and the necessary extension PDO  is enabled.

Enjoy mobile banking with simplicity and ease of use!
