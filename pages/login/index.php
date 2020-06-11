<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <title>JUBILEE AID | LOGIN</title>
</head>


<body>
    <div class="root">
        <div class="logo-container">
            <a href="../../"><img src="../../assets/images/logo-white.png" alt=""></a>
        </div>

        <div class="form-container">
            <form action="<?php echo htmlspecialchars("../components/log.inc.php"); ?>" method="POST">

                <div class="welcome-message">
                    <h3>Login to your account</h3>
                    <p>Securely login to your Jubilee aid</p>
                </div>

                <input type="email" name="email" id="email" placeholder="Email address" required>
                <span class="mlwang">Please input a valid Email</span>

                <span class="password">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fa fa-eye"></i>
                </span>

                <a href="" class="forgot">Forgot Password?</a>

                <span class="frmFtr">
                    <p>New User? <a href="../register/">Create account</a></p>
                    <button type="submit" id="signIn" name="submit">Sign In</button>
                </span>
            </form>

            <div class="ftr">
                <div class="cts">
                    <p>Trouble signing in? <a href="../../index.php #contact">Contact Support</a></p>
                </div>
                <div class="pt">
                    <a href="../prvacy/"><span>Privacy</span></a>
                    <a href="../faq/"><span>Terms</span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="rotate-screen">
        <h1>Please switch your screen back to portrait mode</h1>
    </div>

    <script src="app.js"></script>

</body>

</html>