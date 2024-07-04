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

$course_id = $_POST['course_id'];

$query = "SELECT * FROM schedules WHERE course_id = $course_id";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<table border="1">
            <tr>
                <th>Batch Date</th>
                <th>Batch Time</th>
            </tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['batch_date'] . '</td>
                <td>' . $row['batch_time'] . '</td>
              </tr>';
    }
    echo '</table>';
} else {
    echo 'No schedule available for this course';
}

$conn->close();
?>
