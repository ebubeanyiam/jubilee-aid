<?php
if (isset($_POST['signup'])) {

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

  $firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastname']);
  $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $referralId = mysqli_real_escape_string($conn, $_POST['referralId']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT email FROM users WHERE email='$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "another user has signed up with that email";
  } else {
    function generateRandomString($length = 10)
    {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }

    $referralId = generateRandomString(8);

    $sql = "INSERT INTO users (firstname, lastname, email, phonenumber, userpassword, referralId)
        VALUES ('$firstName', '$lastName', '$email', '$phonenumber', '$password', '$referralId')";

    if ($conn->query($sql) === TRUE) {
      session_start();
      $_SESSION["userId"] = $row["userId"];
      $_SESSION["name"] = $row["firstname"];
      $_SESSION["lastname"] = $row["lastname"];
      $_SESSION["email"] = $row["email"];
      $_SESSION["number"] = $row["phonenumber"];
      header("Location: ../../user/home/?signup=success");

      exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
} else {
  header("Location: ../../index.php");
}
