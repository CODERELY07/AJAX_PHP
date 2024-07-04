<?php
require_once 'config.php'; // Ensure your database connection details are correctly set up in config.php

// Response array to send JSON response
$response = array(
    'status' => 0,
    'message' => 'Form Validation Failed'
);

// Directory where uploaded files will be saved
$uploadDir = "uploads/";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set and not empty
    if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']) && isset($_FILES['file'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // File upload validation
        $file = $_FILES['file'];
        $fileName = basename($file['name']);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $uploadStatus = 1;

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['message'] = "Invalid Email";
        } elseif (!in_array(strtolower($fileType), array('jpg', 'jpeg', 'png'))) {
            $response['message'] = "Sorry, only JPEG, JPG, PNG files are allowed to upload.";
        } elseif ($file['size'] > 1000000) { // Limit file size to 1MB (1000000 bytes)
            $response['message'] = "Sorry, your file is too large.";
        } elseif (!move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            $response['message'] = "Sorry, an error occurred uploading your file.";
        } else {
            // Hash the password securely
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Check if email already exists in the database
            $checkQuery = "SELECT * FROM user WHERE email = ?";
            $stmt = $conn->prepare($checkQuery);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $response['message'] = "Sorry, email already exists.";
            } else {
                // Insert data into database
                $insertQuery = "INSERT INTO user (firstname, lastname, email, password, image) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($insertQuery);
                $stmt->bind_param('sssss', $firstname, $lastname, $email, $hash, $fileName);

                if ($stmt->execute()) {
                    $response['message'] = "Inserted successfully!";
                    $response['status'] = 1;
                } else {
                    $response['message'] = "Failed to insert into database.";
                }
            }
        }
    } else {
        $response['message'] = "Please fill in all required fields.";
    }
} else {
    $response['message'] = "Invalid request method.";
}

// Send JSON response
echo json_encode($response);
?>
