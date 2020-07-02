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

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jubileeaid";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if (!isset($_SESSION['username'])) {
        header("Location: ../");
    } else {
        echo '
    <nav class="menu-bar"> ';
        require "../components/nav.php";
        echo '
    </nav>

    <main>
        <div class="header">
            <span><i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i></span>
            <h3>Site Users</h3>
        </div>

        <div class="main-landing">
            <div  class="landing">
                <h4>Users</h4>
                <hr>
                <div class="list">
                    <div>';
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $userid = $row["userId"];
                $firstname = $row["firstname"];
                $lastname = $row["lastname"];
                $email = $row["email"];
                $phonenumber = $row["phonenumber"];

                echo "<br><b>id</b>: " . $userid . " - <b>Name:</b> " . $firstname . " " . $lastname .
                    " <b>Email:</b> " . $email . " <b>Phone Number</b> " . $phonenumber . "<br>";
            }
        }
        echo '
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="../components/app.js"></script> ';
    }
    $conn->close();
    ?>
</body>

</html>