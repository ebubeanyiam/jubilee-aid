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
  // $username = "anyiamebube";
  // $password = "1095chinemerem";
  $username = "root";
  $password = "";
  $dbname = "jubileeaid";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $userId = $_SESSION['userId'];

  if (!isset($_SESSION['userId'])) {
    header("Location: ../../pages/login/");
  } else { ?>
    <nav class="menu-bar">
      <?php require "../components/nav.php"; ?>
    </nav>

    <main>
      <div class="header">
        <span><i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i></span>
        <h3>Issues</h3>
      </div>

      <div class="main-landing">
        <div class="landing">
          <?php
          $sql = $sql = "SELECT id FROM accInfo WHERE userId='$userId'";
          $result = $conn->query($sql);

          if (!$result->num_rows > 0) { ?>
            <div class="alert alert-danger">
              <p>Please confirm your account information to unlock your account.</p>
              <p>Click <a href="../profile/">here</a> to continue</p>
            </div>
          <?php } ?>


          <div class="action">
            <h5>Send us an email and we'll send you a respond as soon as possible</h5>
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="data">
              <div class="s-i-s">
                <h4>Portfolio</h4>
                <hr>
                <div class="align">
                  <?php
                  $query = "SELECT * FROM Users WHERE userId='$userId'";
                  $result = $conn->query($query);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $networth = $row["netWorth"];
                      $investment = $row["Investments"];
                      $withdrawal = $row["Withdrawal"];
                    }
                  } ?>
                  <div>
                    <p>Net Worth</p>
                    <h2><?php echo '&#8358;' . $networth . '.00'; ?></h2>
                  </div>
                  <ul style="list-style: none;">
                    <li>
                      <h4>Investments</h4>
                      <p><?php echo '&#8358;' . " " . $investment . '.00'; ?></p>
                    </li>

                    <li>
                      <h4>Withdrawals</h4>
                      <p><?php echo '&#8358;' . " " . $withdrawal . '.00'; ?></p>
                    </li>
                  </ul>
                </div>
                <footer>
                  <a href="">Investments</a>
                  <a href="">Stash</a>
                </footer>
              </div>

              <div class="rate">
                <div>
                  <h4>Rating</h4>
                  <hr>
                  <p>10/100</p>
                  <p>Your score grows constantly as you invest</p>
                </div>

                <div>
                  <h4>Risk Appetite</h4>
                  <hr>
                  <p>10/100</p>
                  <p>Your risk appetite shows how much you're willing to invest</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>

    <script src="../components/app.js"></script>
  <?php } ?>

  ?>


</body>

</html>