<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Scripts and Stylesheeets -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <!-- ---- -->

  <title>JUBILEE AID | HOME</title>
</head>

<body>

<div class="root">
  <?php
      require "./assets/components/routes/nav.php" ;
  ?>

  <main>
    <div class="cta">
      <h1>
        A Great Way <br /> To Invest
      </h1>

      <p>
      Jubilee aid helps you achieve financial freedom by enabling you save responsibly and invest on the go.
      <br /> <br />
      Earn over 25% return on investments.
      </p>

      <a href="./pages/login"><button>Get Started</button></a>
    </div>

    <div class="hero">
      <div class="hero-image">
        <img src="./assets/images/f-hero.png" alt="girl">
      </div>
    </div>
  </main>

  <div class="card-container">
    <div class="heading">
      <h1>Achieve Financial Freedom</h1>
    </div>

    <div class="cards">
      <div class="card">
        <h3>Plan <br /> Money</h3>
        <p>
          The future can be even brighter but a goal without a plan is just a wish. 
          Use our tools to plan ahead for housing, education, retirement, family & a lot more.
        </p>
        <a href="">Get Started</a>
      </div>

      <div class="card">
        <h3>Save <br /> Money</h3>
        <p>
        You deserve good things. Grow your savings on your own terms with our completely automated process & plans.
        </p>
        <a href="">Get Started</a>
      </div>

      <div class="card">
        <h3>Invest <br /> Money</h3>
        <p>
        We make investment simpler than it sounds. 
        Invest in mutual funds tailored to you and your financial position, and watch the returns keep rolling in.
        </p>
        <a href="">Get Started</a>
      </div>
    </div>
  </div>

  <div class="showcase">
    <div class="showcase-image">
      <img src="./assets/images/phone.jpeg" alt="">
      <img class="ps" src="./assets/images/phone-screen.png" alt="">
    </div> 

    <div class="showcase-content">
      <div class="content-header">
        <h1>Start building wealth in 5 minutes</h1>
      </div>

      <div class="content-list">
        <div class="list l1">
          <h3>Create an account</h3>

          <p>Sign up for an account with your name, email and phone number.</p>
        </div>

        <div class="list l2">
          <h3>Choose a plan</h3>

          <p>From a wide selection of options, setup your first plan.</p>
        </div>

        <div class="list l3">
          <h3>Watch your money grow</h3>

          <p>Sit back, relax & let your money work for you all day, everyday.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="invest-future">
    <div class="invest-future-content">
      <h1>Plant a Tree <br /> For the future <br /> With Jubilee aid</h1>

      <p>
        Small Investments <br /> Big in Returns <br /> <br />

        Saving and investing money with Jubelee aid means your money works hard all day, everyday.
      </p>

      <a href="./pages/register"><button>START INVESTING TODAY</button></a>
      
    </div>

    <div class="hero-img">
      <img src="./assets/images/plant-future.png" alt="a tree">
    </div>
  </div>

  <div class="testimonial">
    <div class="user-picture">
      <img src="./assets/images/milca.png" alt="a girl">
    </div>

    <div class="testimony">
      <h1>
        “I used to feel too young to start setting money aside, with Jubelee aid 
        I have realized it is never too early to get started with your savings. 
        Jubilee aid is my coping mechanism to build up for an independent life.“
      </h1>

      <p>Akpan Peace, <span>On getting started</span></p>

      <a href="">Read more stories</a>
    </div>
  </div>

  <?php
        require "./assets/components/routes/footer.php" ;
  ?>

  <div class="social">
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
  </div>
</div>

<div class="rotate-screen">
  <h1>Please switch your screen back to portrait mode</h1>
</div>

  <script src="app.js"></script>
</body>

</html>