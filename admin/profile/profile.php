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
    header ("Location: ../../user/home/home.php") ;
}
else if (!isset($_SESSION['admin'])) {
    header ("Location: ../../user/home/home.php") ;
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
            <h3>Profile</h3>
            <a href=""><img src="../../images/user.svg" alt="" width="50" height="50"></a>
        </div>

        <div class="main-landing">
            <div class="landing">
                <ul>
                    <li><button class="account-button active">Account</button></li>
                    <li><button class="security-button">Security</button></li>
                </ul>
                <div class="account">
                    <h1>Personalize</h1>
                    <div class="picture">
                        <div class="info">
                            <h3>Change profile picture</h3>
                            <p>Choose a new avatar to be used across Jubilee Aid</p>
                        </div>
                        <div class="action">
                            <a href=""><img src="../../images/user.svg" alt="" width="70" height="70"></a>
                        </div>
                    </div>

                    <div class="names">
                        <div class="info">
                            <h3>Full name</h3>
                            <p>Customize your account name</p>
                        </div>
                        <div class="action">
                            <form action="">
                                <input type="text" name="" id="" placeholder="First name">
                                <input type="text" name="" id="" placeholder="Last name">
                            </form>
                        </div>
                    </div>

                    <div class="gender">
                        <div class="info">
                            <h3>Gender</h3>
                            <p>How would you like to be identified?</p>
                        </div>
                        <div class="action">
                            <form action="">
                                <input type="radio" name="gender" id="" value="male">Male
                                <input type="radio" name="gender" id="" value="female">Female
                                <input type="radio" name="gender" id="" value="others">Others
                            </form>
                        </div>
                    </div>

                    <input type="submit" value="Save Changes" name="">
                </div>

                <div class="security show">
                    <h1>Verified Information</h1>
                    <p>Hey Boss, here\'s your info. Wanna change it? Please contact your developer.</p>
                    <div class="email">
                        <div class="info">
                            <h3>Email Address</h3>
                        </div>
                        <div class="action">
                            <p>'; echo $_SESSION["email"]; 
                            echo '
                            </p>
                        </div>
                    </div>

                    <div class="number">
                        <div class="info">
                            <h3>Phone Number</h3>
                        </div>
                        <div class="action">
                            <p>'; echo $_SESSION["number"]; 
                            echo '
                            </p>
                        </div>
                    </div>

                    <h1>Password</h1>
                    <p>Change your password to a new one</p>
                    <div class="old-password">
                        <div class="info">
                            <h3>Old Password</h3>
                        </div>
                        <div class="action">
                            <input type="text" name="" id="" placeholder="Enter old password">
                        </div>
                    </div>

                    <div class="new-password">
                        <div class="info">
                            <h3>New Password</h3>
                        </div>
                        <div class="action">
                            <input type="text" name="" id="" placeholder="Enter new password">
                            <input type="submit" value="Change Password" name="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="../components/app.js"></script>
    <script src="app.js"></script> ';
}
?>

</body>
</html>