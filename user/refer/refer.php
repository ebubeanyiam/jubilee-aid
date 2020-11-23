<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Referral</title>

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
        <h3>Account Overview</h3>
      </div>

      <div class="main-landing">
        <div class="landing">
          <div class="balance">
            <p>Current Rewards Earned</p>
            <span class="naira">&#8358</span><span> 0.00</span>
          </div>

          <div class="action">
            <div class="cards">
              <div class="palette">
                <div class="palette-head">
                  <h5>Referral Code</h5>
                  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
                </div>
                <hr>
                <div class="palette-body">
                  <?php
                  $query = "SELECT * FROM users WHERE userId='$userId'";
                  $result = $conn->query($query);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $referralId = $row["referralId"]; ?>

                      <h1 class="referral"><?php echo $referralId; ?></h1>
                      <span class="copy-text" onclick="copyFunction()" style="cursor: pointer">Copy</span>

                  <?php }
                  } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>


    <script src="../components/app.js"></script>
    <script src="app.js"></script>

  <?php } ?>

</body>

</html>