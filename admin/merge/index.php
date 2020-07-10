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
    $username = "root";
    $password = "";
    // $username = "anyiamebube";
    // $password = "1095chinemerem";
    $dbname = "jubileeaid";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT userId, amount, merged FROM Payment";
    $result = $conn->query($sql);

    $mysql = "SELECT userId, amount, merged FROM Withdraw";
    $withdrawal = $conn->query($mysql);

    $update = false;

    if (!isset($_SESSION['username'])) {
        header("Location: ../");
    } else { ?>
        <nav class="menu-bar"> ';
            <?php require "../components/nav.php"; ?>
        </nav>

        <main>
            <div class="header">
                <span><i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i></span>
                <h3>MERGE</h3>
            </div>

            <div class="main-landing">
                <div class="landing">
                    <h4>Payers</h4>
                    <hr>
                    <div class="list">
                        <div>
                            <?php
                            if ($result->num_rows > 0) { ?>
                                <table class="table">
                                    <thead style="background-color: #000000; color: #ffffff">
                                        <tr>
                                            <td>#</td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Phone Number</td>
                                            <td>Amount Pledged</td>
                                            <td>Amount Merged</td>
                                        </tr>
                                    </thead>
                                    <?php
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $userid = $row["userId"];
                                        $amount = $row["amount"];
                                        $merged_amount = $row["merged"];

                                        $sql = "SELECT * FROM users WHERE userId='$userid'";
                                        $result = $conn->query($sql);

                                        while ($row = $result->fetch_assoc()) {
                                            $firstname = $row["firstname"];
                                            $lastname = $row["lastname"];
                                            $email = $row["email"];
                                            $phonenumber = $row["phonenumber"];
                                        }
                                    ?>

                                        <tbody>
                                            <tr>
                                                <td><?php echo $userid; ?></td>
                                                <td><?php echo $firstname . " " . $lastname; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $phonenumber; ?></td>
                                                <td><?php echo $amount; ?></td>
                                                <td><?php echo $merged_amount; ?></td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                </table> <?php
                                        } else { ?>
                                <div class="alert alert-warning">No user found</div>
                            <?php } ?>
                        </div>
                    </div>

                    <h4>Withdrawals</h4>
                    <hr>
                    <div class="list">
                        <div>
                            <?php
                            if ($withdrawal->num_rows > 0) { ?>
                                <table class="table">
                                    <thead style="background-color: #000000; color: #ffffff">
                                        <tr>
                                            <td>#</td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Phone Number</td>
                                            <td>Amount Pledged</td>
                                            <td>Amount Merged</td>
                                        </tr>
                                    </thead>
                                    <?php
                                    // output data of each row
                                    while ($row = $withdrawal->fetch_assoc()) {
                                        $w_userid = $row["userId"];
                                        $amount = $row["amount"];
                                        $merged_amount = $row["merged"];

                                        $sql = "SELECT * FROM users WHERE userId='$w_userid'";
                                        $result = $conn->query($sql);

                                        while ($row = $result->fetch_assoc()) {
                                            $firstname = $row["firstname"];
                                            $lastname = $row["lastname"];
                                            $email = $row["email"];
                                            $phonenumber = $row["phonenumber"];
                                        }
                                    }
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $w_userid; ?></td>
                                            <td><?php echo $firstname . " " . $lastname; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phonenumber; ?></td>
                                            <td><?php echo $amount; ?></td>
                                            <td><?php echo $merged_amount; ?></td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                                </table>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $pid = mysqli_real_escape_string($conn, $_POST['payerId']);
                            $wid = mysqli_real_escape_string($conn, $_POST['payeeId']);
                            $amount = mysqli_real_escape_string($conn, $_POST['amount']);

                            $sql = "SELECT * FROM users WHERE userId ='$wid'";
                            $sql_result = $conn->query($sql);

                            $mysql = "SELECT * FROM users WHERE userId ='$pid'";
                            $_result = $conn->query($mysql);

                            if ($sql_result->num_rows > 0) {
                                while ($row = $sql_result->fetch_assoc()) {
                                    $payeename = $row["firstname"] . " " . $row["lastname"];
                                    $payeeId = $row["userId"];

                                    $sql = "INSERT INTO merged (withdrawer, withdrawerId) VALUES ('$payeename', '$payeeId')";
                                    $result = $conn->query($sql);

                                    $my_sql = "UPDATE withdraw SET merged= merged + '$amount' WHERE userId='$payeeId'";
                                    $query_result = $conn->query($my_sql);
                                }
                            }

                            if ($_result->num_rows > 0) {
                                while ($row = $_result->fetch_assoc()) {
                                    $payername = $row["firstname"] . " " . $row["lastname"];
                                    $payerId = $row["userId"];

                                    $sql = "UPDATE merged SET payer='$payername',  payerId='$payerId', amount='$amount' WHERE withdrawerId='$payeeId'";
                                    // $update = $conn->query($sql);

                                    $my_sql = "UPDATE payment SET merged= merged + '$amount' WHERE userId='$payerId'";
                                    $query_result = $conn->query($my_sql);

                                    if (mysqli_query($conn, $sql)) { ?>
                                        <div class="alert alert-success" style="margin-top: 20px">
                                            Merged Successfully
                                            <a href="../merge/">Click to Update</a>
                                        </div>
                        <?php
                                    }
                                }
                            }
                        } ?>
                    </div>

                    <h4>Merge Users</h4>
                    <hr>
                    <div class="merge">
                        <div>
                            <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
                                <div class="form-group">
                                    <label for="payerId">Select Payer Id</label>
                                    <input type="text" name="payerId" class="form-control" id="payerId" />
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" name="amount" class="form-control" id="amount" />
                                </div>
                                <div class="form-group">
                                    <label for="payeeId">Select Payee Id</label>
                                    <input type="text" name="payeeId" class="form-control" id="payeeId" />
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Check</button>
                            </form>
                        </div>
                    </div>
                </div>
        </main>


        <script src="../components/app.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <?php };
    $conn->close();
    ?>
</body>

</html>