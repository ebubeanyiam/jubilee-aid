<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php
  $servername = "localhost";
  // $username = "anyiamebube";
  // $password = "1095chinemerem";
  $username = "root";
  $password = "";
  $dbname = "jubileeaid";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " .
      $conn->connect_error);
  }

  if (!isset($_SESSION['userId'])) {
    header("Location: ../../pages/login/");
  } else {
    $userId = $_SESSION["userId"];
    $value;
    $plan
  ?>
    <nav class="menu-bar">
      <?php require "../components/nav.php" ?>
    </nav>

    <main>
      <div class="header">
        <span><i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i></span>
        <h3>Plans</h3>
      </div>

      <div class="main-landing">
        <div class="landing">
          <h4>Actions</h4>
          <hr>
          <?php
          $sql = $sql = "SELECT id FROM accInfo WHERE userId='$userId'";
          $result = $conn->query($sql);
          if (!$result->num_rows > 0) { ?>
            <div class="alert alert-danger">
              <p>Please confirm your account information to unlock your account.</p>
              <p>Click <a href="../profile/">here</a> to continue</p>
            </div>
          <?php } else { ?>

            <?php
            $sql = "SELECT amount, reg_date FROM payment WHERE userId='$userId'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $amount = $row["amount"];
                $date = $row["reg_date"];
            ?>
                <div class="pending">
                  <div class="alert alert-danger" role="alert">
                    <p>You have a pending plan of <b><span class="pending">&#8358; <?php echo $amount; ?></span></b></p>
                    <p>Please pay on or before <b><span><?php echo date('d-m-Y', strtotime($date . ' + 2 days')); ?></span></b></p>
                    <p>To view your payees, click <a href="../payment/">here</a></p>
                  </div>
                </div>
              <?php }
            } else { ?>
              <?php
              if (isset($_POST['submit'])) {
                $value = mysqli_real_escape_string($conn, $_POST['amount']);
                $plan = mysqli_real_escape_string($conn, $_POST['plan']);
              ?>
                <div class="alert alert-info confirm" role="alert">
                  <span>Confirm Pledge of &#8358;<?php echo $value; ?></span>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <select name="amount" id="">
                      <option value="<?php echo $value; ?>"></option>
                    </select>
                    <select name="plan" id="">
                      <option value="<?php echo $plan; ?>" selected></option>
                    </select>
                    <button type="submit" name="signup" class="btn btn-primary">Confirm</button>
                  </form>
                </div>
              <?php }
              ?>
              <?php
              if (isset($_POST["signup"])) {
                $amount = mysqli_real_escape_string($conn, $_POST['amount']);
                $plan = mysqli_real_escape_string($conn, $_POST['plan']);

                $sql = "INSERT INTO payment (userId, amount) VALUES ('$userId', '$amount')";
                if ($conn->query($sql) === TRUE) {
                  if ($plan === "Basic") {
                    $update = "UPDATE users SET Basic=Basic + 1, totalPledges=totalPledges + 1 WHERE userId='$userId'";
                    if (mysqli_query($conn, $update)) {
                      header("Location: ../plans/");
                    }
                  } else if ($plan === "Bronze") {
                    $update = "UPDATE users SET Bronze=Bronze + 1, totalPledges=totalPledges + 1 WHERE userId='$userId'";
                    if (mysqli_query($conn, $update)) {
                      header("Location: ../plans/");
                    }
                  }
                  else if ($plan === "Silver") {
                    $update = "UPDATE users SET Silver=Silver + 1, totalPledges=totalPledges + 1 WHERE userId='$userId'";
                    if (mysqli_query($conn, $update)) {
                      header("Location: ../plans/");
                    }
                  }
                  else if ($plan === "Gold") {
                    $update = "UPDATE users SET Gold=Gold + 1, totalPledges=totalPledges + 1 WHERE userId='$userId'";
                    if (mysqli_query($conn, $update)) {
                      header("Location: ../plans/");
                    }
                  }
                  else if ($plan === "Platinum") {
                    $update = "UPDATE users SET Platinum=Platinum + 1, totalPledges=totalPledges + 1 WHERE userId='$userId'";
                    if (mysqli_query($conn, $update)) {
                      header("Location: ../plans/");
                    }
                  }
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
              }
              ?>
              <div class="flex">
                <?php
                $sql = "SELECT Basic, Bronze, Silver, Gold, Platinum FROM users WHERE userId='$userId'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $basic = $row["Basic"];
                    $bronze = $row["Bronze"];
                    $silver = $row["Silver"];
                    $gold = $row["Gold"];
                    $platinum = $row["Platinum"];
                  }
                }
                ?>
                <div class="card text-center">
                  <div class="card-header" style="color:#000000">
                    Basic
                  </div>
                  <div class="card-body">
                    <?php if ($basic >= 4 || $bronze >= 1 || $silver >= 1 || $gold >= 1 || $platinum >= 1) { ?>
                      <h5 class="card-title">&#8358; 5,000</h5>
                      <p class="card-text">Please select a higher plan</p>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <button class="btn btn-danger" disabled>Not Allowed</button>
                      </form>
                    <?php } else { ?>
                      <h5 class="card-title">&#8358; 5,000</h5>
                      <p class="card-text">Brings you a return of &#8358; 7,500</p>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <select name="amount" id="">
                          <option value="5,000" selected></option>
                        </select>
                        <select name="plan" id="">
                          <option value="Basic" selected></option>
                        </select>
                        <button type="submit" name="submit" class="btn btn-primary">Select Plan</button>
                      </form>
                    <?php } ?>
                  </div>
                  <div class="card-footer text-muted">
                    <?php echo "Pledged " . $basic . " time(s)"; ?>
                  </div>
                </div>

                <div class="card text-center">
                  <div class="card-header" style="background-color: #cd7f32;">
                    Bronze
                  </div>
                  <div class="card-body">
                    <?php if ($bronze >= 4 || $silver >= 1 || $gold >= 1 || $platinum >= 1) { ?>
                      <h5 class="card-title">&#8358; 10,000</h5>
                      <p class="card-text">Please select a higher plan</p>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <button class="btn btn-danger" disabled>Not Allowed</button>
                      </form>
                    <?php } else { ?>
                      <h5 class="card-title">&#8358; 10,000</h5>
                      <p class="card-text">Brings you a return of &#8358; 15,000</p>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <select name="amount" id="">
                          <option value="10,000" selected></option>
                        </select>
                        <select name="plan" id="">
                          <option value="Bronze" selected></option>
                        </select>
                        <button type="submit" name="submit" class="btn btn-primary">Select Plan</button>
                      </form>
                    <?php } ?>
                  </div>
                  <div class="card-footer text-muted">
                    <?php echo "Pledged " . $bronze . " time(s)"; ?>
                  </div>
                </div>

                <div class="card text-center">
                  <div class="card-header" style="background-color: #c0c0c0; color:#000000">
                    Silver
                  </div>
                  <div class="card-body">
                    <?php if ($silver >= 4 || $gold >= 1 || $platinum >= 1) { ?>
                      <h5 class="card-title">&#8358; 20,000</h5>
                      <p class="card-text">Please select a higher plan</p>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <button class="btn btn-danger" disabled>Not Allowed</button>
                      </form>
                    <?php } else { ?>
                      <h5 class="card-title">&#8358; 20,000</h5>
                      <p class="card-text">Brings you a return of &#8358; 30,000</p>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <select name="amount" id="">
                          <option value="20,000" selected></option>
                        </select>
                        <select name="plan" id="">
                          <option value="Silver" selected></option>
                        </select>
                        <button type="submit" name="submit" class="btn btn-primary">Select Plan</button>
                      </form>
                    <?php } ?>
                  </div>
                  <div class="card-footer text-muted">
                    <?php echo "Pledged " . $silver . " time(s)"; ?>
                  </div>
                </div>

                <div class="card text-center">
                  <div class="card-header" style="background-color: #ffd700;">
                    Gold
                  </div>
                  <div class="card-body">
                    <?php if ($gold >= 4 || $platinum >= 1) { ?>
                      <h5 class="card-title">&#8358; 50,000</h5>
                      <p class="card-text">Please select a higher plan</p>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <button class="btn btn-danger" disabled>Not Allowed</button>
                      </form>
                    <?php } else { ?>
                      <h5 class="card-title">&#8358; 50,000</h5>
                      <p class="card-text">Brings you a return of &#8358; 75,000</p>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <select name="amount" id="">
                          <option value="50,000" selected></option>
                        </select>
                        <select name="plan" id="">
                          <option value="Gold" selected></option>
                        </select>
                        <button type="submit" name="submit" class="btn btn-primary">Select Plan</button>
                      </form>
                    <?php } ?>
                  </div>
                  <div class="card-footer text-muted">
                    <?php echo "Pledged " . $gold . " time(s)"; ?>
                  </div>
                </div>

                <div class="card text-center">
                  <div class="card-header" style="background-color: #a0b2c6;">
                    Platinum
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">&#8358; 100,000</h5>
                    <p class="card-text">Brings you a return of &#8358; 150,000</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                      <select name="amount" id="">
                        <option value="100,000" selected></option>
                      </select>
                      <select name="plan" id="">
                        <option value="Platinum" selected></option>
                      </select>
                      <button type="submit" name="submit" class="btn btn-primary">Select Plan</button>
                    </form>
                  </div>
                  <div class="card-footer text-muted">
                    <?php echo "Pledged " . $platinum . " time(s)"; ?>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </main>
  <?php } ?>

  <script src="app.js"></script>
  <script src="../components/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>