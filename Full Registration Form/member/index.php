<?php
    require_once 'logincheck.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Welcome <?php echo $_SESSION["email"]?>
    <a href="logout.php">Logout</a>
</body>
</html>