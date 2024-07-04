<?php

    $conn = new mysqli('localhost', 'root','','registerform');

    if($conn->connect_error){
        echo "failed";
    }else{
        echo "success";
    }
?>