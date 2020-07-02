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
        echo '  
    <nav class="menu-bar"> ';
        require "./components/nav.php";
        echo '
    </nav>

    <main>
        <div class="header">
            <span><i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i></span>
            <h3>Account Overview</h3>
        </div>

        <div class="main-landing">
            <div  class="landing">
                <div class="balance">
                    <p>Welcome ';
        echo $_SESSION["username"];
        echo '</p>
                    <span class="naira">You\'re logged in as an admin.</span>
                </div>

                <div class="action">
                    <h1>Actions</h1>
                    <div class="cards">
                        <div>
                            <h3>View Users</h3>
                            <a href="">Get Started</a>
                        </div>
                        <div>
                            <h3>Merge Users</h3>
                            <a href="">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> 

    <script src="./components/app.js"></script> ';
    }

    ?>


</body>

</html>