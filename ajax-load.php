<?php

    // Database connection parameters
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db = "my_source_code";

    // Create a new MySQLi object for database connection
    $conn = new mysqli($server_name, $username, $password, $db);

    // SQL query to select all records from the 'student' table
    $sql = "SELECT * FROM student";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql) or die("SQL QUERY FAILED");

    // Initialize an empty string to store the HTML output
    $output = "";

    // Check if there are any rows returned by the query
    if(mysqli_num_rows($result) > 0){
        // Start building the HTML table
        $output = "<table>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Country</td>
            </tr>
        ";

        // Loop through each row of the result set
        while($row = mysqli_fetch_assoc($result)){
            // Add a new row to the table for each record in the result set
            $output .= "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['country']}</td>
            </tr>";
        }

        // Close the HTML table tag
        $output .= "</table>";

        // Close the database connection
        mysqli_close($conn);

        // Output the HTML table
        echo $output;
    } else {
        // If no records found, display a message
        echo "<h2>No Record Found</h2>";
    }

?>
