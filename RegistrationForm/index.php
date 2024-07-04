<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form">
        <form autocomplete="off" id="myForm" action="signup.php" method="POST" enctype="multipart/form-data">
            <div class="banner">
                <!-- Banner content -->
            </div>
            <h1>Create an account</h1>
            <div class="form-message"></div>

            <div class="row">
                <div class="field column">
                    <label>First Name:</label>
                    <input type="text" name="firstname" >
                </div>

                <div class="field column">
                    <label>Last Name:</label>
                    <input type="text" name="lastname" >
                </div>
            </div>

            <div class="row">
                <div class="field column">
                    <label>Email:</label>
                    <input type="email" name="email" >
                </div>
            </div>

            <div class="row">
                <div class="field column">
                    <label>Password:</label>
                    <input type="password" name="password" >
                </div>
                <div class="field column">
                    <label>Upload Picture:</label>
                    <input type="file" id="file" name="file" accept=".jpg, .jpeg, .png" >
                </div>
            </div>
            <div class="row">
                <div class="field column">
                    <input type="submit" name="submit" value="Sign Up">
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
        $('#myForm').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "signup.php",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    $(".form-message").css("display", "block");
                    
                    if(response.status == 1){
                        $("#myForm")[0].reset(); // Reset the form fields
                        $(".form-message").removeClass("error").addClass("success").html('<p>' + response.message + '</p>'); // Display success message
                    } else {
                        $(".form-message").removeClass("success").addClass("error").html('<p>' + response.message + '</p>'); // Display error message
                    }
                },
                error: function(xhr, status, error){
                    console.log(xhr.responseText); // Log the full response text for debugging
                    $(".form-message").css("display", "block").html('<p>Error: ' + xhr.statusText + '</p>'); // Display the error message
                }
            });
        });

        // File type validation
        $("#file").change(function(){
            var file = this.files[0];
            var fileType = file.type;
            var match = ['image/jpeg', 'image/jpg', 'image/png'];

            if(!(fileType == match[0] || fileType == match[1] || fileType == match[2])){
                alert("Sorry, only JPEG, JPG, PNG files are allowed to upload.");
                $("#file").val('');
                return false;
            }
        });
    });

    </script>
</body>
</html>
