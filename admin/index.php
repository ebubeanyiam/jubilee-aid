<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Account</title>
</head>

<body>

    <?php
    if (!isset($_SESSION['adminId'])) {
        header("Location: ./login");
    } else {
        header("Location: ./home/");
    }

    ?>


</body>

</html>