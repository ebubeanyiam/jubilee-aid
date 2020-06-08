  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="style.css">
      <title>JUBILEE AID | REGISTER</title>
  </head>


  <body>
      <div class="root">
          <div class="logo-container">
              <a href="../../"><img src="../../assets/images/logo-white.png" alt=""></a>
          </div>

          <div class="form-container">
              <form action="<?php echo htmlspecialchars("../components/reg.inc.php"); ?>" method="post">

                  <div class="welcome-message">
                      <h4>Hello <span></span> </h4>
                      <h3>Create a Safe Account</h3>
                      <p>Welcome to the future of Savings & Investments</p>
                  </div>

                  <div class="name">
                      <input type="text" name="firstname" id="firstname" placeholder="First name" required>
                      <input type="text" name="lastname" id="lastname" placeholder="Last name" required>
                  </div>

                  <div class="number">
                      <input type="text" name="number" id="num" placeholder="Phone Number" required>
                  </div>
                  <span class="num-warning">Input a valid Phone Number</span>

                  <input type="email" name="email" id="email" placeholder="Email address" required>
                  <span class="mail-warning">Please input a valid Email</span>

                  <span class="password">
                      <input type="password" name="password" id="password" placeholder="Password" required>
                      <i class="fa fa-eye"></i>
                  </span>
                  <span class="password-warning">Password must be up to 8 characters</span>

                  <span class="password">
                      <input type="password" name="rpt-password" id="rpt-password" placeholder="Repeat Password" required>
                  </span>
                  <span class="rpt-pwdwang">Passwords do not match </span>

                  <span class="frmFtr">
                      <p>Got an account? <a href="../login/">Sign In</a></p>
                      <button type="submit" id="reg" name="signup">Register</button>
                  </span>

              </form>

              <div class="ftr">
                  <div class="cts">
                      <p>Need help? <a href="#">Contact Support</a></p>
                  </div>
                  <div class="pt">
                      <a href="../prvacy/"><span>Privacy</span></a>
                      <a href="../faq/"><span>Terms</span></a>
                  </div>
              </div>

          </div>
      </div>

      <div class="rotate-screen">
          <h1>Please switch your screen back to portrait mode</h1>
      </div>

      <script src="app.js"></script>

  </body>

  </html>