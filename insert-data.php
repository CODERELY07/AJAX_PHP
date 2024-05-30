<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* CSS for message display */
        .message {
            position: absolute;
            top: 0;
            text-align: center;
            color: #fff;
            left: 0;
            display: none;
            padding: 15px;
            font-weight: 800;
            width: 100%;
        }
        /* Style for error message */
        #error-message {
            background-color: red;
        }
        /* Style for success message */
        #success-message {
            background-color: green;
        }
    </style>
</head>
<body>
    <!-- Main table -->
    <table id="main">
        <tr>
            <!-- Header row -->
            <td id="header">
                <!-- Page title -->
                <h1>Php With Ajax</h1> <!-- Corrected spelling: "Ajax" -->
            </td>
        </tr>
        <tr>
            <td id="table-form">
                <!-- Form for adding data -->
                <form id="addForm">
                    Name : <input type="text" name="name" id="name">
                    Email: <input type="text" name="email" id="email">
                    Country: <input type="text" name="country" id="country">
                    <input type="submit" value="Save" id='save-button'>
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data">
                <!-- Data table will be displayed here -->
            </td>
        </tr>
    </table>
    <!-- Error message display area -->
    <div id="error-message" class="message"></div>
    <!-- Success message display area -->
    <div id="success-message" class="message"></div>
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        // Document ready function
        $(document).ready(function(){
            // Function to load table data
            function loadTable(){
                $.ajax({
                    url: "ajax-load.php", // URL for loading table data from PHP script
                    method: "POST", // HTTP method
                    success: function(response){ // Callback function on success
                        // Display the response data in the table-data section
                        $('#table-data').html(response);
                    }
                })
            }

            // Initial load of table data
            loadTable();

            // Event handler for form submission
            $('#save-button').on("click", function(e){
                e.preventDefault();
                var name = $("#name").val(); // Get name input value
                var email = $("#email").val(); // Get email input value
                var country = $("#country").val(); // Get country input value

                // Check if any field is empty
                if(name == "" || email == "" || country == ""){
                    $("#error-message").html("All fields are required").slideDown(); // Display error message
                    $("#success-message").slideUp(); // Hide success message
                }else{
                    // If all fields are filled, send AJAX request to insert data
                    $.ajax({
                        url: "ajax-insert.php", // URL for inserting data via PHP script
                        type: "POST", // HTTP method
                        data: {student_name: name, student_email: email, student_country: country}, // Data to be sent
                        success: function(data){ // Callback function on success
                            if(data == 1){
                                // If insertion is successful, reload table data, reset form, and show success message
                                loadTable();
                                $("#addForm").trigger("reset"); // Reset form fields
                                $("#success-message").html("Data Inserted Successfully").slideDown(); // Display success message
                                $("#error-message").slideUp(); // Hide error message
                            }else{
                                // If insertion fails, display error message and hide success message
                                $("#error-message").html("Can't save Record").slideDown(); // Display error message
                                $("#success-message").slideUp(); // Hide success message
                            }
                        }
                    })
                }
            })
        })
    </script>
</body>
</html>
