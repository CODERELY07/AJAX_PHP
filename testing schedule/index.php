<?php

// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testing-shedule";

$conn = new mysqli($servername, $username, $password, $dbname);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Course Schedule</title>

</head>
<body>

<h2>Select Course and View Schedule</h2>

<form action="">
    <label for="category">Select Course Category:</label>
    <select name="category" id="category">
        <option value="">Select Category</option>
        <!-- Options will be populated dynamically using PHP -->
         <?php
           $sql = "SELECT * FROM coursecategories";
           $result = $conn->query($sql);
   
           while($row = $result->fetch_assoc()){
               echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
           }
            ?>
    </select>
    <br><br>
    <div id="test">
        
    </div>
    <label for="course">Select Course:</label>
    <select name="course" id="course">
        <option value="">Select Course</option>
        <!-- Options will be populated dynamically using AJAX -->
    </select>
    <br><br>
    
    <div id="schedule">
        <!-- Schedule details will be displayed here using AJAX -->
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    // AJAX to fetch courses based on selected category
    $('#category').change(function(){
        var category_id = $(this).val();
        console.log(category_id)
        $.ajax({
            url: 'fetch_courses.php',
            type: 'POST',
            data: { category_id: category_id },
            success: function(response){
                $('#course').html(response);
            }
        });
    });

    // AJAX to fetch schedule based on selected course
    $('#course').change(function(){
        var course_id = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'fetch_schedule.php',
            data: { course_id: course_id },
            success: function(response){
                $('#schedule').html(response);
            }
        });
    });
});
</script>
</body>
</html>
