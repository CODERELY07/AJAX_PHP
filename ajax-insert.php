<?php
    // Retrieve data from POST request
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $student_country = $_POST['student_country'];
    
    // Database connection parameters
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db = "my_source_code";

    // Create a new MySQLi object for database connection
    $conn = new mysqli($server_name, $username, $password, $db);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert record into the 'student' table
    $sql = "INSERT INTO student (name, email, country) VALUES ('$student_name', '$student_email', '$student_country')";

    // Execute the SQL query
    if(mysqli_query($conn, $sql)){
        echo 1; // Success
    }else{
        echo 0; // Failure
    }

    // Close the database connection
    mysqli_close($conn);
?>
