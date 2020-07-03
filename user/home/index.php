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
    // $username = "anyiamebube";
    // $password = "1095chinemerem";
    $username = "root";
    $password = "";
    $dbname = "jubileeaid";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userId = $_SESSION['userId'];

    if (!isset($_SESSION['userId'])) {
        header("Location: ../../pages/login/");
    } else {
        echo '  
    <nav class="menu-bar"> ';
        require "../components/nav.php";
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
                    <p>Total Balance</p>
                    <span class="naira">&#8358</span><span> 0.00</span>
                </div>

                <div class="reg-warning">';
        $sql = $sql = "SELECT id FROM accInfo WHERE userId='$userId'";
        $result = $conn->query($sql);

        if (!$result->num_rows > 0) {
            echo '
                            <p>Please confirm your account information to unlock your account.</p>
                            <p>Click <a href="../profile/">here</a> to continue</p> ';
        }
        echo '
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

                <div class="data">
                    <div class="s-i-s">
                        <h4>Portfolio</h4>
                        <hr>
                        <div class="align">
                            <div>
                                <p>Net Worth</p>
                                <h2>&#8358 0.00</h2>
                            </div>
                            <ul style="list-style: none;">
                                <li>
                                    <h4>Investments</h4>
                                    <p>&#8358 0.00</p>
                                </li>

                                <li>
                                    <h4>Withdrawals</h4>
                                    <p>&#8358 0.00</p>
                                </li>
                            </ul>
                        </div>
                        <footer>
                            <a href="">Investments</a>
                            <a href="">Stash</a>
                        </footer>
                    </div>

                    <div class="rate">
                        <div>
                            <h4>Rating</h4>
                            <hr>
                            <p>10/100</p>
                            <span>Your score grows constantly as you invest</span>
                        </div>

                        <div>
                            <h4>Risk Appetite</h4>
                            <hr>
                            <p>10/100</p>
                            <span>Your risk appetite shows how much you\'re willing to invest</span>
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