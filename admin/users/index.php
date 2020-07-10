<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Users</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "anyiamebube";
    $password = "1095chinemerem";
    // $username = "root";
    // $password = "";
    $dbname = "jubileeaid";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if (!isset($_SESSION['username'])) {
        header("Location: ../");
    } else { ?>
        <nav class="menu-bar">
            <?php require "../components/nav.php"; ?>
        </nav>

        <main>
            <div class="header">
                <span><i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i></span>
                <h3>Site Users</h3>
            </div>

            <div class="main-landing">
                <div class="landing">
                    <h4>Users</h4>
                    <hr>

                    <div class="list">
                        <?php
                        if ($result->num_rows > 0) { ?>
                            <table class="table">
                                <thead style="background-color: #000000; color: #ffffff">
                                    <tr>
                                        <td>#</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Phone Number</td>
                                        <td>Total Pledges</td>
                                        <td>Paid</td>
                                        <td>Withdrawn</td>
                                        <td>Net Worth</td>
                                    </tr>
                                </thead>
                                <?php
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    $userid = $row["userId"];
                                    $firstname = $row["firstname"];
                                    $lastname = $row["lastname"];
                                    $email = $row["email"];
                                    $phonenumber = $row["phonenumber"];
                                    $totalPledges = $row["totalPledges"];
                                    $paid = $row["confirmedPayment"];
                                    $withdrwan = $row["Withdrawal"];
                                    $networth = $row["netWorth"];
                                ?>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $userid ?></td>
                                            <td><?php echo $firstname . " " . $lastname ?></td>
                                            <td><?php echo $email ?></td>
                                            <td><?php echo $phonenumber ?></td>
                                            <td><?php echo $totalPledges ?></td>
                                            <td><?php echo $paid ?></td>
                                            <td><?php echo $withdrwan ?></td>
                                            <td><?php echo $networth ?></td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main> <?php } ?>

    <script src="../components/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>