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
    die("Connection failed: " . $conn->connect_error);
  }

  $userId = $_SESSION['userId'];

  if (!isset($_SESSION['userId'])) {
    header("Location: ../../pages/login/");
  } else { ?>
    <nav class="menu-bar"> ';
      <?php require "../components/nav.php"; ?>
    </nav>

    <main>
      <div class="header">
        <span><i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i></span>
        <h3>Profile</h3>
      </div>

      <div class="main-landing">
        <div class="landing">
          <ul>
            <li><button class="account-button active">Account</button></li>
            <li><button class="security-button">Security</button></li>
          </ul>
          <div class="account">
            <?php
            $sql = "SELECT id FROM accInfo WHERE userId='$userId'";
            $result = $conn->query($sql);

            if (!$result->num_rows > 0) { ?>
              <h1>Set up account Info</h1>

              <form action="<?php echo htmlspecialchars("./reg.acc.php"); ?>" method="POST">
                <div class="flex bank">
                  <div class="info">
                    <h3>Select your bank</h3>
                    <p>Choose your bank of choice</p>
                  </div>
                  <div class="action">
                    <select class="bank-choice form-control" name="bank" onchange="checkBank()">
                      <option value="">Choose bank</option>
                      <option value="Access bank">Access bank</option>
                      <option value="Citibank Nigeria Limited">Citibank Nigeria Limited</option>
                      <option value="Ecobank Nigeria PLC">Ecobank Nigeria</option>
                      <option value="Fidelity Bank PLC">Fidelity Bank PLC</option>
                      <option value="First City Monument Bank Limited (FCMB)">First City Monument Bank Limited (FCMB)</option>
                      <option value="First Bank of Nigeria limited">First Bank of Nigeria Limited</option>
                      <option value="Guarantee Trust Bank PLC">Guarantee Trust Bank PLC</option>
                      <option value="Heritage Banking Company Limited">Heritage Banking Company Limited</option>
                      <option value="Keystone Bank Limited">Keystone Bank Limited</option>
                      <option value="Polaris Bank Limited">Polaris Bank Limited</option>
                      <option value="Skye Bank PLC">Skye Bank PLC</option>
                      <option value="Stanbic IBTC Bank PLC">Stanbic IBTC Bank PLC</option>
                      <option value="Standard Chartered">Standard Chartered</option>
                      <option value="Sterling Bank PLC">Sterling Bank PLC</option>
                      <option value="Titan Trust Bank Limited">Titan Trust Bank Limited</option>
                      <option value="Union Bank of Nigeria PLC">Union Bank of Nigeria PLC</option>
                      <option value="United Bank of Africa PLC (UBA)">United Bank of Africa PLC (UBA)</option>
                      <option value="Unity Bank PLC">Unity Bank PLC</option>
                      <option value="Wema Bank PLC">Wema Bank PLC</option>
                      <option value=Zenith Bank PLC">Zenith Bank PLC</option>
                    </select>
                    <p style="color:#062863; font-size:13px; margin-top: 5px" class="bank-warning">Please select a bank</p>
                  </div>
                </div>

                <div class="flex acc-name">
                  <div class="info">
                    <h3>Bank account name</h3>
                    <p>Set your bank account name</p>
                  </div>
                  <div class="action">
                    <input type="text" class="form-control" name="accname" id="accname" placeholder="First name" required>
                  </div>
                </div>

                <div class="flex accnum">
                  <div class="info">
                    <h3>Bank account number</h3>
                    <p>Set your bank account number</p>
                  </div>
                  <div class="action">
                    <input type="number" class="form-control" name="accnum" id="accnum" placeholder="Account number" required>
                  </div>
                </div>

                <div class="flex acctype">
                  <div class="info">
                    <h3>Bank account type</h3>
                    <p>Select your bank account type</p>
                  </div>
                  <div class="action">
                    <select class="acc-type form-control" name="acctype" onchange="accType()">
                      <option value="">Choose account type</option>
                      <option value="current">Current</option>
                      <option value="savings">Savings</option>
                    </select>
                    <p style="color:#062863; font-size:13px; margin-top: 5px" class="type-warning">Please select an account type</p>
                  </div>
                </div>

                <input type="submit" class="btn btn-primary pointer-none" value="Save Changes" name="submit">
              </form>
            <?php
            } else {
              $sql = "SELECT * FROM accInfo WHERE userId='$userId'";
              $result = $conn->query($sql);

              if ($row = $result->fetch_assoc()) {
                $accname = $row["accName"];
                $accnum = $row["accNumber"];
                $bank = $row["bank"];
              } ?>
              <h1>Profile</h1>

              <div class="flex name">
                <div class="info">
                  <h3>Full name</h3>
                </div>
                <div class="action">
                  <span><?php echo $_SESSION["firstname"]; ?></span>
                  <span><?php echo $_SESSION["lastname"]; ?></span>
                </div>
              </div>

              <div class="bank flex">
                <div class="info">
                  <h3>Bank</h3>
                  <p>Your bank of choice:</p>
                </div>
                <div class="action">
                  <p><?php echo $bank; ?></p>
                </div>
              </div>

              <div class="accname flex">
                <div class="info">
                  <h3>Account Name</h3>
                  <p>Your account name</p>
                </div>
                <div class="action">
                  <p><?php echo $accname; ?></p>
                </div>
              </div>

              <div class="accnum flex">
                <div class="info">
                  <h3>Account Number</h3>
                  <p>Your account number</p>
                </div>
                <div class="action">
                  <p><?php echo $accnum; ?></p>
                </div>
              </div>
            <?php } ?>
          </div>

          <div class="security show">
            <h1>Verified Information</h1>
            <p>Your verified information helps us secure your account, need to make a change?
              Shoot an email to <a href="">support@jubileeaid.com</a></p>
            <div class="email">
              <div class="info">
                <h3>Email Address</h3>
              </div>
              <div class="action">
                <p><?php echo $_SESSION["email"]; ?></p>
              </div>
            </div>

            <div class="number">
              <div class="info">
                <h3>Phone Number</h3>
              </div>
              <div class="action">
                <p><?php echo $_SESSION["number"]; ?></p>
              </div>
            </div>

            <h1>Password</h1>
            <p>Change your password to a new one</p>
            <form action="" method="POST">
              <div class="old-password">
                <div class="info">
                  <h3>Old Password</h3>
                </div>
                <div class="action">
                  <input type="text" name="" id="" placeholder="Enter old password">
                </div>
              </div>

              <div class="new-password">
                <div class="info">
                  <h3>New Password</h3>
                </div>
                <div class="action">
                  <input type="text" name="" id="" placeholder="Enter new password"> <br>
                  <button class="btn btn-primary" type="submit" name="submit" style="margin-top: 10px;">Change Password</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <script src="app.js"></script>
      <script src="../components/app.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <?php }
    ?>

</body>

</html>