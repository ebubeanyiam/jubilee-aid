<?php

if (isset($_POST["submit"])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Users";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            $userid = $row["id"];

    
}

?>