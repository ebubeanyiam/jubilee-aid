<?php session_start() ; ?>
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
if (!isset($_SESSION['userId'])) {
    require "../components/accerr.php" ;
}
else {
    echo '
    <nav class="menu-bar"> ';
        require "../components/nav.php" ;
    echo '
    </nav>

    <main>
        <div class="header">
            <i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i>
            <h3>WITHDRAW</h3>
            <a href="../profile/profile.php"><img src="../../images/user.svg" alt="" width="50" height="50"></a>
        </div>

        <div class="main-landing">
            <div class="landing">
                <div class="balance">
                    <p>Current Rewards Earned</p>
                    <span class="naira">&#8358</span><span> 0.00</span>
                </div>
            </div>
        </div>
    </main>


    <script src="../components/app.js"></script> ';
}
?>

</body>
</html>