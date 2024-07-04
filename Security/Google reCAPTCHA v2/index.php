
<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $secretKey = "6LcP9AcqAAAAAL7SgSrPIwrm2CwL1mwUK1WXlCkL";
        $response = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR']; 
     
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
        $response = file_get_contents($url);

        $response = json_decode($response);
        if($response->success){
            echo "Verification success. Your name is: $username";
        }else{
            echo "Verification Failed";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ReCAPTCHA</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="username" placeholder="What is your name">
        <input type="submit" name="submit" value="Save">
        <div class="g-recaptcha" data-sitekey="6LcP9AcqAAAAAFNnxuRQgSVRQSeDM4a7I16StaVK"></div>
    </form>
</body>
</html>
<!-- 
https://www.google.com/recaptcha/admin/create - visit this to create 


6LcP9AcqAAAAAFNnxuRQgSVRQSeDM4a7I16StaVK site key

6LcP9AcqAAAAAL7SgSrPIwrm2CwL1mwUK1WXlCkL secret key-->