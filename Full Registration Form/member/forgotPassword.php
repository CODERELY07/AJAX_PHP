<?php

   
    if(isset($_POST['forgotPass'])){
        $connection = new mysqli("localhost", "root","","membershipsystem");

        $email = $connection->real_escape_string($_POST['email']);

        $sql = "SELECT id FROM users WHERE email = '$email'";
        $result = $connection->query($sql);

        if($result->num_rows > 0){
            $str = "0123456789qwertuiopasdfghjklzxcvbnm";
            $str = str_shuffle($str);
            $str = substr($str,0,10);
            // $url = "http://domain.com/members/resetPassword.php?token=$str&email=$email";
            // mail($email, "Reset Password","To reset your password, please visit this: $url", "From: myanotheremail@domain.com\r\n");
            $connection->query("UPDATE users SET token ='$str' WHERE email='$email'");
            echo "Please check your email";
        }else{
            echo "Please check your inputs";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <form action="forgotPassword.php" method="post">
        <input type="email" name="email" value="<?php $email?>"><br>
        <input type="submit" value="Reset Password" name="forgotPass">
    </form>
</body>
</html>