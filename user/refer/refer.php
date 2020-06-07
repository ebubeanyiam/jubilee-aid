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
    <nav class="menu-bar">
        <?php require "../components/nav.php" ; ?>
    </nav>

    <main>
        <div class="header">
            <i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i>
            <h3>Referral</h3>
            <a href="../profile/profile.php"><img src="../../images/user.svg" alt="" width="50" height="50"></a>
        </div>

        <div class="main-landing">
            <div class="landing">
                <div class="balance">
                    <p>Current Rewards Earned</p>
                    <span class="naira">&#8358</span><span> 0.00</span>
                </div>

                <div class="action">
                    <div class="cards">
                        <div class="palette">
                            <div class="palette-head">
                                <h5>Referral Code</h5>
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
                            </div>
                            <hr>
                            <div class="palette-body">
                                <h1>USER001</h1>
                                <a href="">
                                    <p>https.//jubileeaid.com/user001</p>
                                </a>
                            </div>
                        </div>

                        <div class="palette">
                            <div class="palette-head"></div>
                            <hr>
                            <div class="palette-body"></div>
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
                            <span>Your risk appetite shows how much you're willing to invest</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="../components/app.js"></script>
</body>

</html>