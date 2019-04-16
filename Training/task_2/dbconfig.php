
<?php
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $DB_HOST = 'localhost';
    $DB_USERNAME ='root';
    $DB_PASSWORD = '';
    $DB_NAME = 'training';
     
    /* Attempt to connect to MySQL database */
    $conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
     
    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>