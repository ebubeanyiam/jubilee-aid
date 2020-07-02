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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Users";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname, email, phonenumber FROM MyGuests WHERE useradmin = '0'";
$result = $conn->query($sql);

$mysql = "SELECT  id, firstname, lastname, email, phonenumber FROM MyGuests WHERE useradmin = '1'";
$adminresult = $conn->query($mysql);

if (!isset($_SESSION['userId'])) {
    header ("Location: ../home/home.php") ;
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
            <h3>PAYMENT</h3>
            <a href="../profile/profile.php"><img src="../../images/user.svg" alt="" width="50" height="50"></a>
        </div>

        <div class="main-landing">
            <div  class="landing">
                <h4>Payees</h4>
                <hr>
                <div class="list">
                    <div>
                    <p>The names and phone number of users you\'re merged with will appear below</p> ';
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $userid = $row["id"];
                            $firstname = $row["firstname"];
                            $lastname = $row["lastname"];
                            $email = $row["email"];
                            $phonenumber = $row["phonenumber"];
                    
                            echo "<br><b>id</b>: ". $userid. " - <b>Name:</b> ". $firstname. " " . $lastname. 
                            " <b>Email:</b> ". $email. " <b>Phone Number</b> ". $phonenumber. "<br>";
                        }
                    }
                    echo '
                    </div>
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

