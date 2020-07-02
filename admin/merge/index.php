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
    $dbname = "Users";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, firstname, lastname, email, phonenumber, amount FROM Payment";
    $result = $conn->query($sql);

    $mysql = "SELECT  userid, firstname, lastname, email, phonenumber, amount FROM Withdrawal";
    $withdrawal = $conn->query($mysql);

    if (!isset($_SESSION['userId'])) {
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
            <h3>MERGE</h3>
            <a href="../profile/profile.php"><img src="../../images/user.svg" alt="" width="50" height="50"></a>
        </div>

        <div class="main-landing">
            <div  class="landing">
                <h4>Payers</h4>
                <hr>
                <div class="list">
                    <div>';
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $userid = $row["id"];
                $firstname = $row["firstname"];
                $lastname = $row["lastname"];
                $email = $row["email"];
                $phonenumber = $row["phonenumber"];
                $amount = $row["amount"];

                echo "<br><b>id</b>: " . $userid . " - <b>Name:</b> " . $firstname . " " . $lastname .
                    " <b>Email:</b> " . $email . " <b>Phone Number:</b> " . $phonenumber . " <b>Amount:</b> "
                    . $amount . "<br>";
            }
        } else {
            echo "no user found";
        }
        echo '
                    </div>
                </div>

                <h4>Withdrawals</h4>
                <hr>
                <div class="list">
                    <div> ';
        if ($withdrawal->num_rows > 0) {
            // output data of each row
            while ($row = $withdrawal->fetch_assoc()) {
                $adminid = $row["userid"];
                $adminfirstname = $row["firstname"];
                $adminlastname = $row["lastname"];
                $adminemail = $row["email"];
                $adminphonenumber = $row["phonenumber"];
                $amount = $row["amount"];

                echo "<br><b>id</b>: " . $adminid . " - <b>Name:</b> " . $adminfirstname . " "
                    . $adminlastname . " <b>Email:</b> " . $adminemail . " <b>Phone Number:</b> "
                    . $adminphonenumber . " <b>Amount:</b> " . $amount . "<br>";
            }
        }
        echo '
                    </div>
                </div>

                <h4>Merge Users</h4>
                <hr>
                <div class="merge">
                    <div> 
                    <form action=';
        echo htmlspecialchars($_SERVER["PHP_SELF"]);
        echo ' method="POST">
                        Select Payer id <input type="number" name="pid" id="" placeholder="Payer Id"> <br/><br/>
                        Choose Amount to be payed <input type="text" name="amt" id="" placeholder="Amount"> <br><br>
                        Select Withdrawer id <input type="number" name="wid" id="" placeholder="Withdrawer Id"> <br/><br/>
                        <input type="submit" value="Merge">
                    </form> ';

        if (isset($_POST['submit'])) {
            $pid = mysqli_real_escape_string($conn, $POST['pid']);
            $pmysql = "SELECT id, firstname, lastname, email, phonenumber, amount FROM Payment WHERE 
                        id ='$pid'";
            $presult = $conn->query($pmysql);

            $wid = mysqli_real_escape_string($conn, $POST['wid']);
            $wmysql = "SELECT  userid, firstname, lastname, email, phonenumber, amount FROM Withdrawal 
                        WHERE userid = '$wid'";
            $wresult = $conn->query($wmysql);
        }
        echo '
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