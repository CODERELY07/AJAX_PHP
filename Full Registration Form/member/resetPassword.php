<?php
// http://localhost/PHP%20DEVELOPER/AJAX%20AND%20PHP/Full%20Registration%20Form/member/resetPassword.php?token=5mj2d8ebt0&email=calipjo.markely@gmail.com

// goto database and copy the token
    if(isset($_GET['email']) && isset($_GET['token'])){
        $connection = new mysqli("localhost", "root", "", "membershipsystem");

        $email = $connection->real_escape_string($_GET['email']);
        $token = $connection->real_escape_string($_GET['token']);

        $data = $connection->query("SELECT id FROM users WHERE email = '$email' AND token='$token'");

        if($data->num_rows > 0){
            $str = "0123456789qwertuiopasdfghjklzxcvbnm";
            $str = str_shuffle($str);
            $str = substr($str,0,10);
            $hashedPassword = password_hash($str, PASSWORD_DEFAULT);

            $connection->query("UPDATE users SET password = '$hashedPassword',token='' WHERE email = '$email'");

            echo "Your new password is: $str";
        }else{
            echo "Please check your link!";
        }
    }else{
        header("Location:login.php");
        exit();
    }

?>