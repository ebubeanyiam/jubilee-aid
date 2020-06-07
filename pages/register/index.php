  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <title>JUBILEE AID | REGISTER</title>
</head>


<body>
    <div class="lLogo">
        <a href="../../index.php"><img src="../../images/logo.png" alt=""></a>
    </div>

    <div class="lMain">
        <div class="lMainText">
            <h2>Create an account</h2>
            <h4>In just a few minutes</h4>
        </div>
        <div class="lForm">
            <form action="<?php echo htmlspecialchars("../components/reg.inc.php");?>" method="post">
                <span class="perInfo">
                    <input type="text" name="firstname" id="firstname" placeholder="First name" required> 
                    <input type="text" name="lastname" id="lastname" placeholder="Last name" required> 
                </span>
                <span class="number">
                <p>(+234)</p>
                <input type="text" name="number" id="num" placeholder="Phone Number" required>
                </span>
                <span class="numwang">Input a valid Phone Number</span>
                <input type="email" name="email" id="email" placeholder="Email address" required>
                <span class="mlwang">Please input a valid Email</span>
                <span class="password">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fa fa-eye"></i>
                </span>
                <span class="pwdwang">Password must be up to 8 characters</span>
                <span class="password">
                    <input type="password" name="rpt-password" id="rpt-password" placeholder="Repeat Password" required>
                </span>
                <span class="rpt-pwdwang">Passwords do not match </span>
                <a href="" class="invCode">Got invite code?</a>

                <span class="frmFtr">
                    <p>Got an account? <a href="../login/login.php">Sign In</a></p> 
                    <button type="submit" id="reg" name="signup">Register</button>
                </span>
            </form>
            <div class="ftr">
                <div class="cts">
                    <p>Need help? <a href="../../index.php #contact">Contact Support</a></p>
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