<?php
// Simulate processing delay
sleep(2);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));

    // Validate input (basic validation)
    if (empty($name) || empty($email)) {
        echo "Please fill out all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } else {
        // Process data (for demonstration, just echo back the submitted data)
        echo "<h3>Submitted Data:</h3>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p>Thank you for submitting the form!</p>";
    }
}
?>
