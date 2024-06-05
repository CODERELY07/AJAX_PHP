<?php
    // Get the student ID from the POST request
    $student_id = $_POST['id'];
    $stu_name = $_POST['stu_name'];
    $stu_email = $_POST['stu_email'];
    $stu_country = $_POST['stu_country'];
    // Database connection parameters
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db = "my_source_code";
    
    // Create a new MySQLi object for database connection
    $conn = new mysqli($server_name, $username, $password, $db);
    // SQL query to delete the record from the 'student' table based on the provided ID
    $sql = "UPDATE student SET name = '{$stu_name}', email = '{$stu_email}', country = '{$stu_country}' WHERE id = '$student_id'";


    // Execute the query and check if it was successful
    if($conn->query($sql)){
        // If deletion was successful, return 1
        echo 1;
    }else{
        // If deletion failed, return 0
        echo 0;
    }

?>