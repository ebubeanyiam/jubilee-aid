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
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM Admins WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            if ($password == $row['userpassword'] && $row['isAdmin'] == "Yes") {
                session_start();
                $_SESSION["adminId"] = $row["adminId"];
                $_SESSION["firstname"] = $row["firstname"];
                $_SESSION["lastname"] = $row["lastname"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["number"] = $row["number"];
                header("Location: ../?login=success");

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
