<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testing-shedule";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$category_id = $_POST['category_id'];

$query = "SELECT * FROM courses WHERE category_id = $category_id";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['course_id'] . '">' . $row['course_name'] . '</option>';
    }
} else {
    echo '<option value="">No Courses Found</option>';
}

$conn->close();
?>
