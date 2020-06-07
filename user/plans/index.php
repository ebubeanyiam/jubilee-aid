<?php session_start() ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="plans.css">
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

$id = $_SESSION["userId"];
$firstname = $_SESSION["name"];
$lastname = $_SESSION["lastname"];
$email = $_SESSION["email"];
$phonenumber = $_SESSION["number"];

if (!isset($_SESSION['userId'])) {
    require "../components/accerr.php" ;
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
            <h3>Plans</h3>
            <a href="../profile/profile.php"><img src="../../images/user.svg" alt="" width="50" height="50"></a>
        </div>

        <div class="main-landing">
            <div  class="landing">
                <h4>Actions</h4>
                <hr> ';

        $sql = "SELECT id, amount, reg_date FROM Payment WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $amount = $row["amount"];
                $date = $row["reg_date"];
                echo '
                <div class="pending">
                    <div>
                        <p>You have a pending plan of <b><span class="pending">'; echo $amount; echo '</span></b></p>
                        <p>Please pay on or before <b><span> ';
                        echo date('d-m-Y', strtotime($date. ' + 2 days')); echo '</span></b></p>
                        <p>To view your payees, click <a href="../payment/payment.php">here</a></p>
                    </div>
                </div> ';
            }
        }
        else {
            echo '
                <div class="flex">
                    <div class="cards">
                        <div>
                            <i class="fa fa-plus" style="font-size: 20px; cursor: pointer;"></i>
                            <p>Create New Investment Plan</p>
                        </div>
                    </div>

                    <div class="plan">
                        <h4>Select your plan</h4>

                        <form action='; echo htmlspecialchars($_SERVER["PHP_SELF"]); echo ' method="POST">
                            <select name="plan" onchange="calc()">
                                <option value="">Choose plan</option>
                                <option value="5000">&#8358 5,000</option>
                                <option value="10000">&#8358 10,000</option>
                                <option value="15000">&#8358 15,000</option>
                                <option value="50000">&#8358 50,000</option>
                                <option value="100000">&#8358 100,000</option>
                                <option value="500000">&#8358 500,000</option>
                            </select>
                            <br><br>

                            <p>You will be eligible to recieve <b><span class="result"></span></b></p>
                            <input type="submit" class="check activate" name="submit" value="Confirm">
                        </form> ';
                        
                        if (isset($_POST['submit'])) {

                            $value = mysqli_real_escape_string($conn, $_POST['plan']); 

                            $sql = "INSERT INTO Payment (id, firstname, lastname, email, phonenumber, amount)
                            VALUES ('$id', '$firstname', '$lastname', '$email', '$phonenumber', '$value')";
                            if ($conn->query($sql) === TRUE) {
                                    header ("Location: ../plans/plans.php?reg=success");
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }    
                    echo '
                    </div>
                </div>
            </div> ';
        } echo '
        </div>
    </main>

    <script src="app.js"></script> 
    <script src="../components/app.js"></script> ';

}
?>
</body>
</html>