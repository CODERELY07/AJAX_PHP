<?php
if(isset($_POST['submit'])){
    // Establish database connection
    $connection = new mysqli("localhost", "root", "", "membershipsystem");

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Escape user inputs for security
    $firstname = $connection->real_escape_string($_POST['firstname']);
    $lastname = $connection->real_escape_string($_POST['lastname']);
    $email = $connection->real_escape_string($_POST['email']);
    $password = $connection->real_escape_string($_POST['password']);

    // Validate inputs (basic example)
    if(empty($firstname) || empty($lastname) || empty($email) || empty($password)){
        echo "All fields are required.";
        exit();
    }

    // Validate email format
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email format.";
        exit();
    }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $sql = "INSERT INTO users(fistname, lastname, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);

    if ($stmt === false) {
        die('Error: ' . $connection->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $password_hash);
    if ($stmt->execute()) {
        // Redirect to registration success page
        header("Location: register.php?status=success");
        exit();
    } else {
        // Display error message
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <input type="text" name="firstname" placeholder="First Name"><br>
        <input type="text" name="lastname" placeholder="Last Name"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" value="Register" name="submit">
    </form>
</body>
</html>
