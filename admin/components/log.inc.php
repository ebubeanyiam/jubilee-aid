<?php
if (isset($_POST['submit'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    // $username = "anyiamebube";
    // $password = "1095chinemerem";
    $dbname = "jubileeaid";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM admins WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            if ($password == $row['adminpassword']) {
                session_start();
                $_SESSION["adminId"] = $row["id"];
                $_SESSION["firstname"] = $row["firstname"];
                $_SESSION["username"] = $row["username"];
                header("Location: ../?login=success");

                exit();
            } else {
                // header("Location: logerr.php");
                echo "Wrong password";
            }
        }
    } else {
        echo "Wrong username";;
    }
} else {
    header("Location: ../login/");
}
