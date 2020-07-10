<?php
session_start();
if (isset($_POST['submit'])) {

    $servername = "localhost";
    // $username = "root";
    // $password = "";
    $username = "anyiamebube";
    $password = "1095chinemerem";
    $dbname = "jubileeaid";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userId = $_SESSION["userId"];
    $bank = mysqli_real_escape_string($conn, $_POST['bank']);
    $accname = mysqli_real_escape_string($conn, $_POST['accname']);
    $accnum = mysqli_real_escape_string($conn, $_POST['accnum']);
    $acctype = mysqli_real_escape_string($conn, $_POST['acctype']);

    $sql = "INSERT INTO accInfo (userId, accName, accType, accNumber, bank)
VALUES ('$userId', '$accname', '$acctype', '$accnum', '$bank')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ./?registration=success");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header("Location: ./");
}
