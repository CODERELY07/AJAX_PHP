<?php
    // Get the student ID from the POST request
    $student_id = $_POST['id'];

    // Database connection parameters
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db = "my_source_code";
  
    // Create a new MySQLi object for database connection
    $conn = new mysqli($server_name, $username, $password, $db);

    // SQL query to delete the record from the 'student' table based on the provided ID
    $sql = "DELETE FROM student WHERE id = '$student_id'";

    // Execute the query and check if it was successful
    if($conn->query($sql)){
        // If deletion was successful, return 1
        echo 1;
    }else{
        // If deletion failed, return 0
        echo 0;
    }
?>
