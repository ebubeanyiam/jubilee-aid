<?php
if (isset($_POST['submit'])) {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Users";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    $sql = "SELECT id, firstname, lastname, userpassword, useradmin, email, phonenumber FROM MyUsers WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            if ($password == $row['userpassword']) {
                if ($row['useradmin'] == 1) {
                    session_start();
                    $_SESSION["userId"] = $row["id"];
                    $_SESSION["name"] = $row["firstname"];
                    $_SESSION["lastname"] = $row["lastname"];
                    $_SESSION["admin"] = $row["useradmin"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["number"] = $row["phonenumber"];
                    header ("Location: ../../admin/index/index.php?login=success");

                    exit();
                }
                else {
                    session_start();
                    $_SESSION["userId"] = $row["id"];
                    $_SESSION["name"] = $row["firstname"];
                    $_SESSION["lastname"] = $row["lastname"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["number"] = $row["phonenumber"];
                    header ("Location: ../../index.php?login=success");

                    exit();
                }
            }
            else {
                header ("Location: logerr.php");
            }
        }
    } else {
        header ("Location: logerr.php");
    }
}
else {
    header ("Location: ../login.php");
}
?>