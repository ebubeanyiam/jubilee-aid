<?php
if (isset($_POST['submit'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jubileeaid";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $userpassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            if ($userpassword == $row['userpassword']) {
                session_start();
                $_SESSION["userId"] = $row["userId"];
                $_SESSION["firstname"] = $row["firstname"];
                $_SESSION["lastname"] = $row["lastname"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["number"] = $row["phonenumber"];
                header("Location: ../../user/home/?login=success");

                exit();
            } else {
                header("Location: logerr.php");
            }
        }
    } else {
        header("Location: logerr.php");
    }
} else {
    header("Location: ../login/");
}
