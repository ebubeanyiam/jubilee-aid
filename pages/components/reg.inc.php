<?php 
if (isset($_POST['signup'])) {
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Users";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
   
    $firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastname']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $sql = "SELECT email FROM MyUsers WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "another user has signed up with that email" ;
    } 
    else {
        $sql = "INSERT INTO MyUsers (firstname, lastname, email, phonenumber, userpassword)
        VALUES ('$firstName', '$lastName', '$email', '$number', '$password')";


            if ($conn->query($sql) === TRUE) {
                session_start();
                $_SESSION["userId"] = $row["id"];
                $_SESSION["name"] = $row["firstname"];
                $_SESSION["lastname"] = $row["lastname"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["number"] = $row["phonenumber"];
                header ("Location: ../../index.php?signup=success");

                exit();

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
}
else {
    header ("Location: ../../index.php");
}
?>