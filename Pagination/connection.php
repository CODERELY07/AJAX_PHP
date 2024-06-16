<?php

     // Database connection parameters
     $server_name = "localhost";
     $username = "root";
     $password = "";
     $db = "my_source_code";
 
     // Create a new MySQLi object for database connection
     $conn = new mysqli($server_name, $username, $password, $db);


    if($conn->connect_error){
        echo "Connection Failed: " . $conn->error;
    }else{
        echo "Success";
    }
?>