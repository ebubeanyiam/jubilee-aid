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

if (!isset($_SESSION['userId'])) {
    header ("Location: ../../user/home/home.php") ;
}
else if (!isset($_SESSION['admin'])) {
    header ("Location: ../../user/home/home.php") ;
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
            <h3>DELETE USERS</h3>
            <a href="../profile/profile.php"><img src="../../images/user.svg" alt="" width="50" height="50"></a>
        </div>

        <div class="main-landing">
            <div class="landing">
                <div class="balance">
                    <p>Type in the ID number of the user you want to delete</p>
                    <form action='; echo htmlspecialchars($_SERVER["PHP_SELF"]); echo ' method="GET">
                        <input type="number" name="id" placeholder="ID Number">
                        <button type="submit" class="submit" name="submit">Check</button>
                    </form>
                </div> ';

                if (isset($_GET['submit'])) {
                    $id = mysqli_real_escape_string($conn, $_GET['id']);
                    $sql = "SELECT id, firstname, lastname, userpassword, useradmin, email, 
                    phonenumber FROM MyGuests WHERE id='$id'";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {

                            $userid = $row["id"];
                            $firstname = $row["firstname"];
                            $lastname = $row["lastname"];
                            $email = $row["email"];
                            $phonenumber = $row["phonenumber"];
                            $useradmin = $row["useradmin"];

                            if ($useradmin != 1) {
                                echo '
                                <div class="condel"> 
                                    <p>You want to delete the following user</p>
                                    <p> ';
                                    echo "<b>id</b>: ". $userid. " - <b>Name:</b> ". $firstname. " " . $lastname. 
                                        " <b>Email:</b> ". $email. " <b>Phone Number</b> ". $phonenumber. "<br>";
                                    echo '
                                    </p>
                                    <form action='; echo htmlspecialchars($_SERVER["PHP_SELF"]); echo ' method="POST">
                                        <button type="submit" class="del-submit" name="submit">Confirm Deletion</button>
                                    </form> ';
                                echo '
                                </div> ';

                                if (isset($_POST['submit'])) {
                                    $sql = "DELETE FROM MyGuests WHERE id='$userid'";
                                    if (mysqli_query($conn, $sql)) {
                                        echo '
                                        <div class="del"> 
                                        <p>Record deleted successfully</p>
                                        </div> ';
                                    } else {
                                        echo '
                                        <div class="del"> 
                                        <p>
                                        Oops, seems an error occured. Please try again or contact your developer
                                        </p>
                                        </div> ';
                                    }
                                }
                            } 
                            else {
                                echo '
                                <div class="condel"> 
                                    <p>You cannot remove the following user from the site</p>
                                    <p> ';
                                    echo "<b>id</b>: ". $userid. " - <b>Name:</b> ". $firstname. " " . $lastname. 
                                        " <b>Email:</b> ". $email. " <b>Phone Number</b> ". $phonenumber. "<br>";
                                    echo '
                                    <p>This user is an admin. To delete an admin, please contact your developer.</p>
                                </div> ';
                            }
                        }
                    } else {
                        echo '
                        <div class="err"> 
                            <p>User not found in the database</p>
                        </div> ';
                    }
                }
            echo '
            </div>
        </div>
    </main>


    <script src="../components/app.js"></script> 
    <script>
        var button = document.querySelector(".submit");

        button.addEventListener("click", () => {
            button.style.display = "none";
        })
    </script> ';
    
}
?>

</body>
</html>