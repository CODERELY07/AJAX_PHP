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

 // SQL query to select all records from the 'student' table
 $sql = "SELECT * FROM student";

 // Execute the SQL query
 $result = mysqli_query($conn, $sql) or die("SQL QUERY FAILED");

 // Initialize an empty string to store the HTML output
 $output = "";
 
 // Check if there are any rows returned by the query
 if(mysqli_num_rows($result) > 0){


     // Loop through each row of the result set
     while($row = mysqli_fetch_assoc($result)){
         // Add a new row to the table for each record in the result set
         $output .= "<tr>
         <td>Name</td>
         <td>
            <input type='text' id='edit-name' value='{$row["name"]}'>
            <input type='text' id='edit-id' hidden value='{$row["id"]}'>
         </td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type='email' id='edit-email' value='{$row["email"]}'></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><input type='text' id='edit-country' value='{$row["country"]}'></td>
        </tr>
        <tr>
            <td><input type='submit' id='edit-submit' value='save'></td>
        </tr>";
     }


     // Close the database connection
     mysqli_close($conn);

     // Output the HTML table
     echo $output;
 } else {
     // If no records found, display a message
     echo "<h2>No Record Found</h2>";
 }

?>


?>