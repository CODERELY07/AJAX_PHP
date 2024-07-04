<?php
session_start();

// Redirect if user is already logged in
if(isset($_SESSION['email']) && isset($_SESSION['loggedIn'])){
    header("Location: index.php");
    exit();
}

// Handle login form submission
if(isset($_POST['logIn'])){
    $connection = new mysqli("localhost", "root", "", "membershipsystem");

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $email = $connection->real_escape_string($_POST['email']);
    $password = $connection->real_escape_string($_POST['password']);

    // Prepare SQL statement
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        // User found, verify password
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            // Password correct, start session
            $_SESSION['email'] = $email;
            $_SESSION['loggedIn'] = true;

            header("Location: index.php");
            exit();
        } else {
            // Password incorrect
            echo "Incorrect password. Please try again.";
        }
    } else {
        // User not found
        echo "User not found. Please check your email.";
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
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" value="Log In" name="logIn">
    </form>
</body>
</html>
