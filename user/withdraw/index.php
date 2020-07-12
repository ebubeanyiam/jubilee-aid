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
  $username = "anyiamebube";
  $password = "1095chinemerem";
  // $username = "root";
  // $password = "";
  $dbname = "jubileeaid";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $userId = $_SESSION["userId"];
  $netWorth;

  if (!isset($_SESSION['userId'])) {
    header("Location: ../../pages/login/");
  } else { ?>
    <nav class="menu-bar">
      <?php require "../components/nav.php"; ?>
    </nav>

    <main>
      <div class="header">
        <span><i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i></span>
        <h3>Account Overview</h3>
      </div>

      <div class="main-landing">
        <div class="landing">
          <h4>Actions</h4>
          <hr />

          <?php
          $sql = "SELECT netWorth FROM users WHERE userId='$userId'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $netWorth = $row["netWorth"]; ?>

              <div class="alert alert-primary">
                <?php echo "Your withdrawable balance is &#8358; " . $netWorth; ?>
              </div>
              <?php }
          }

          $check_completed_payments = "SELECT completePayments FROM users WHERE userId='$userId'";
          $check_completed_payments_result = $conn->query($check_completed_payments);

          if ($check_completed_payments_result->num_rows > 0) {
            while ($row = $check_completed_payments_result->fetch_assoc()) {
              $completedPayments = $row["completePayments"];

              if ($completedPayments < 2) { ?>
                <div class="alert alert-warning">
                  You cannot withdraw till you have paid two pledges in full.

                  <?php echo "You have made " . $completedPayments . " complete Payment(s)"; ?>
                </div>
              <?php } else { ?>
                <div>
                  <h3>Please input the amount you wish to withdraw</h3>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                    <div class="form-group">
                      <label for="amount">Amount</label>
                      <input type="number" name="amount" class="form-control" id="amount" aria-describedby="amountHelp" required>
                      <small id="amountHelp" class="form-text text-muted">Ensure you crosscheck the amount properly as action cannot be reversed.</small>
                      <button class="btn btn-primary" type="submit" name="check" style="margin-top: 10px;">Withdraw</button>
                    </div>
                  </form>

                  <?php
                  if (isset($_POST["submit"])) {
                    $withdraw = mysqli_real_escape_string($conn, $_POST['withdraw']);

                    $insert_user_sql = "INSERT INTO withdraw (userId, amount)
                    VALUES ('$userId', '$withdraw')";
                    $insert_user_sql_result = $conn->query($insert_user_sql);

                    $update_netWorth_sql = "UPDATE users SET netWorth=networth - $withdraw WHERE userId='$userId'";
                    $update_netWorth_result = $conn->query($update_netWorth_sql); ?>

                    <div class="alert alert-success">
                      <?php echo "&#8358;" . $withdraw . " Withdrawn successfully"; ?> <br><br>
                      <a href="../withdraw/">Click to refresh</a>
                    </div>
                    <?php }

                  if (isset($_GET["check"])) {
                    $amount = mysqli_real_escape_string($conn, $_GET['amount']);

                    if ($netWorth >= $amount) { ?>
                      <div class="alert alert-warning">
                        <?php echo "&#8358;" . $amount . " Will be removed from your available balance"; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                          <select name="withdraw" style="display: none;">
                            <option value="<?php echo $amount; ?>"></option>
                          </select>
                          <button class="btn btn-primary" type="submit" name="submit" style="margin: 10px 10px 0 0;">Confirm</button>
                          <a href="../withdraw/"><button class="btn btn-danger" style="margin: 10px 10px 0 0;">Cancel</button></a>
                        </form>
                      </div>
                </div>
              <?php } else { ?>
                <div class=" alert alert-danger">
                  <?php echo "You cannot withdraw &#8358;" . $amount . ". Your <b>withdrawable balance is &#8358;" . $netWorth . "</b>"; ?>
                </div>
            <?php }
                  }
            ?>
        </div>
  <?php }
            }
          }
  ?>
      </div>
      </div>
    </main>


    <script src="app.js"></script>
    <script src="../components/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <?php } ?>

</body>

</html>