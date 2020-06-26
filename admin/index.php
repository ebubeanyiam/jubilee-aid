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
    } else if (!isset($_SESSION['admin'])) {
        header("Location: ../../user/home/home.php");
    } else {
        echo '  
    <nav class="menu-bar"> ';
        require "../components/nav.php";
        echo '
    </nav>

    <main>
        <div class="header">
            <i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i>
            <h3>Admin Overview</h3>
            <a href="../profile/profile.php"><img src="../../images/user.svg" alt="" width="50" height="50"></a>
        </div>

        <div class="main-landing">
            <div  class="landing">
                <div class="balance">
                    <p>Welcome ';
        echo $_SESSION["name"];
        echo '</p>
                    <span class="naira">You\'re logged in as an admin. Want to log in to your user account
                    instead? <a href=" ../../pages/login/login.php">Click here</a></span>
                </div>

                <div class="action">
                    <h1>Actions</h1>
                    <div class="cards">
                        <div>
                            <h3>Choose an Investment</h3>
                            <a href="">Get Started</a>
                        </div>
                        <div>
                            <h3>Withdraw Funds</h3>
                            <a href="">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> 

    <script src="../components/app.js"></script> ';
    }

    ?>


</body>

</html>