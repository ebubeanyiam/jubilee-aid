<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Account</title>

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

  $userId = $_SESSION["userId"];
  $name = $_SESSION["firstname"] . " " . $_SESSION["lastname"];
  $email = $_SESSION["email"];
  $phonenumber = $_SESSION["number"];

  $sql = "SELECT * FROM payment WHERE userId = '$userId'";
  $result = $conn->query($sql);

  $mysql = "SELECT * FROM withdraw WHERE userId = '$userId'";
  $sql_result = $conn->query($mysql);

  $_sql = "SELECT * FROM merged WHERE withdrawerId='$userId' OR payerId='$userId'";
  $_result = $conn->query($_sql);

  if (!isset($_SESSION['userId'])) {
    header("Location: ../../pages/login/");
  } else { ?>
    <nav class="menu-bar">
      <?php require "../components/nav.php"; ?>
    </nav>

    <main>
      <div class="header">
        <span><i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i></span>
        <h3>Payment</h3>
      </div>

      <div class="main-landing">
        <div class="landing">
          <h4>Pairings</h4>
          <hr>
          <div class="list">
            <div>
              <p>The names and phone number of users you're merged with will appear below</p>
              <?php
              if ($result->num_rows > 0) {
                // output data of each row
                if ($_result->num_rows > 0) {
                  while ($row = $_result->fetch_assoc()) {
                    $payeeId = $row["withdrawerId"];
                    $amount = $row["amount"];
                    $confirm = $row["confirm"];

                    $my_sql = "SELECT * FROM users WHERE userId = '$payeeId'";
                    $my_result = $conn->query($my_sql);

                    if ($my_result->num_rows > 0) {
                      while ($row = $my_result->fetch_assoc()) {
                        $fullname = $row["firstname"] . " " . $row["lastname"];
                        $payeenumber = $row["phonenumber"];

                        $acc_sql = "SELECT * FROM accInfo WHERE userId = '$payeeId'";
                        $acc_result = $conn->query($acc_sql);

                        if ($acc_result->num_rows > 0) {
                          while ($row = $acc_result->fetch_assoc()) {
                            $accname = $row["accName"];
                            $accnum = $row["accNumber"];
                            $acctype = $row["accType"];
                            $bank = $row["bank"];
              ?>
                            <?php
                            if (isset($_POST['submit'])) {
                              $update_sql = "UPDATE merged SET confirm=confirm + 1 WHERE payerId='$userId'";
                              $update_result = $conn->query($update_sql); ?>

                              <div class="alert alert-success">
                                Request Sent, Awaiting Confirmation <br />
                                <a href="../payment">Click to Refresh</a>
                              </div>
                            <?php } ?>
                            <table class="table">
                              <thead style="background-color: #000000; color: #ffffff">
                                <tr>
                                  <td>Fullname</td>
                                  <td>Phone Number</td>
                                  <td>Bank</td>
                                  <td>Account Name</td>
                                  <td>Account Number</td>
                                  <td>Account Type</td>
                                  <td>Amount to Pay</td>
                                  <td>Status</td>
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <td><?php echo $fullname; ?></td>
                                  <td><?php echo $payeenumber; ?></td>
                                  <td><?php echo $bank; ?></td>
                                  <td><?php echo $accname; ?></td>
                                  <td><?php echo $accnum; ?></td>
                                  <td><?php echo $acctype; ?></td>
                                  <td><?php echo $amount; ?></td>
                                  <td>
                                    <?php
                                    if ($confirm == 0) { ?>
                                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                        <button class="btn btn-primary" type="submit" name="submit">Ask to confirm payment</button>
                                      </form>
                                    <?php } else {
                                      echo "Waiting Confirmation";
                                    } ?>
                                  </td>
                                </tr>
                              </tbody>
                            </table> <?php
                                    }
                                  }
                                }
                              }
                            }
                          } else {
                            echo "Nothing is here";
                          }
                        } else if ($sql_result->num_rows > 0) {
                          if ($_result->num_rows > 0) {
                            while ($row = $_result->fetch_assoc()) {
                              $payerId = $row["payerId"];
                              $amount = $row["amount"];
                              $confirm = $row["confirm"];

                              $my_sql = "SELECT * FROM users WHERE userId = '$payerId'";
                              $my_result = $conn->query($my_sql);

                              if ($my_result->num_rows > 0) {
                                while ($row = $my_result->fetch_assoc()) {
                                  $fullname = $row["firstname"] . " " . $row["lastname"];
                                  $payernumber = $row["phonenumber"];
                                  $payeremail = $row["email"];

                                  if (isset($_POST['submit'])) {
                                    $del_sql = "DELETE FROM merged WHERE payerId='$payerId'";
                                    $del_result = $conn->query($del_sql);

                                    $paid_sql = "UPDATE payment SET paid=paid + $amount WHERE userId='$payerId'";
                                    $paid_result = $conn->query($paid_sql);

                                    $received_sql = "UPDATE withdraw SET received=received + $amount WHERE userId='$userId'";
                                    $received_result = $conn->query($received_sql);

                                    $payer_check_sql = "SELECT amount, paid FROM payment WHERE userId = '$payerId'";
                                    $payer_check_result = $conn->query($payer_check_sql);

                                    $payee_check_sql = "SELECT amount, received FROM withdraw WHERE userId = '$userId'";
                                    $payee_check_result = $conn->query($payee_check_sql);

                                    if ($payer_check_result->num_rows > 0) {
                                      while ($row = $payer_check_result->fetch_assoc()) {
                                        $merged_amount = $row["amount"];
                                        $paid_amount = $row["paid"];

                                        if ($merged_amount <= $paid_amount) {
                                          $update_completePayment_sql = "UPDATE users SET completePayments=completePayments + 1, netWorth=$amount + $amount * 0.5 WHERE userId='$payerId'";
                                          $update_completePayment_result = $conn->query($update_completePayment_sql);

                                          $del_payer_sql = "DELETE FROM payment WHERE userId='$payerId'";
                                          $del_payer_result = $conn->query($del_payer_sql);
                                        }
                                      }
                                    }

                                    if ($payee_check_result->num_rows > 0) {
                                      while ($row = $payee_check_result->fetch_assoc()) {
                                        $payee_merged_amount = $row["amount"];
                                        $payee_received_amount = $row["received"];

                                        if ($merged_amount <= $payee_received_amount) {
                                          $update_payee_netWorth_sql = "UPDATE users SET Withdrawal=Withdrawal + $amount WHERE userId='$userId'";
                                          $update_payee_netWorth_result = $conn->query($update_payee_netWorth_sql);

                                          $del_payee_sql = "DELETE FROM withdraw WHERE userId='$userId'";
                                          $del_payee_result = $conn->query($del_payee_sql);
                                        }
                                      }
                                    }

                                      ?>

                          <div class="alert alert-success">
                            Request Sent, Awaiting Confirmation <br />
                            <a href="../payment">Click to Refresh</a>
                          </div>
                        <?php } ?>
                        <table class="table">
                          <thead style="background-color: #000000; color: #ffffff">
                            <tr>
                              <td>Fullname</td>
                              <td>Phone Number</td>
                              <td>Email</td>
                              <td>Status</td>
                            </tr>
                          </thead>

                          <tbody>
                            <tr>
                              <td><?php echo $fullname; ?></td>
                              <td><?php echo $payernumber; ?></td>
                              <td><?php echo $payeremail; ?></td>
                              <td>
                                <?php
                                  if ($confirm == 1) { ?>
                                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                    <button class="btn btn-primary" type="submit" name="submit">Confirm payment</button>
                                  </form>
                                <?php } else {
                                    echo "Waiting Confirmation";
                                  } ?>
                              </td>
                            </tr>
                          </tbody>
                        </table> <?php
                                }
                              }
                            }
                          } else {
                            echo "Nothing is here";
                          }
                        }
                        echo '
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="../components/app.js"></script> ';
                      }
                      $conn->close();
                                  ?>
</body>

</html>