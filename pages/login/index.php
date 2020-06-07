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
    <div class="lLogo">
        <a href="../../index.php"><img src="../../images/logo.png" alt=""></a>
    </div>

    <div class="lMain">
        <div class="lMainText">
            <h2>Welcome back,</h2>
            <h4>Sign In to continue</h4>
        </div>
        <div class="lForm">
            <form action="<?php echo htmlspecialchars("../components/log.inc.php");?>" method="POST">
                <input type="email" name="email" id="email" placeholder="Email address" required>
                <span class="mlwang">Please input a valid Email</span>
                <span class="password">
                    <input type="password" name="pwd" id="password" placeholder="Password" required>
                    <i class="fa fa-eye"></i>
                </span>
                <span class="pwdwang">Password must be up to 8 characters</span>
                <a href="" class="forgot">Forgot Password?</a>

                <span class="frmFtr">
                    <p>New User? <a href="../register/register.php">Create account</a></p>
                    <button type="submit" id="signIn" name="submit">Sign In</button>
                </span>
            </form>
            <div class="ftr">
                <div class="cts">
                    <p>Trouble signing in? <a href="../../index.php #contact">Contact Support</a></p>
                </div>
                <div class="pt">
                    <span>Privacy</span>
                    <span>Terms</span>
                </div>
            </div>
        </div>
    </div>

    <script src="app.js"></script>

</body>
</html>