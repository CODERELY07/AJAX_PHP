<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Main table -->
    <table id="main">
        <tr>
            <!-- Header row -->
            <td id="header">
                <!-- Page title -->
                <h1>Php With AJax</h1>
            </td>
        </tr>
        <tr>
            <!-- Table loading section -->
            <td id="table-load">
                <!-- Button to load data -->
                <input type="button" value="Load Data" id="load-button">
            </td>
        </tr>
        <tr>
            <!-- Table data section -->
            <td id="table-data">
                <!-- Data will be dynamically loaded here -->
            </td>
        </tr>
    </table>

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        // Document ready function
        $(document).ready(function(){
            // Add click event handler for the load-button
            $('#load-button').on("click",function(e){
                // AJAX request to load data from server
               $.ajax({
                    url:"ajax-load.php", // PHP script URL
                    method: "POST", // HTTP method
                    success: function(response){ // Callback function on success
                        // Display the response data in the table-data section
                        $('#table-data').html(response);
                    }
                })
            })
        })
    </script>
</body>
</html>
