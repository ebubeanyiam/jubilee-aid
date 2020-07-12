<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">

  <title>Jubilee aid | FAQ</title>

</head>

<body>
  <div class="root">
    <header>
      <?php
      require "../components/routes/nav.php";
      ?>

      <div class="landing">
        <h1>Frequently Asked Questions</h1>
        <!-- <input type="text" name="" id="myInput" placeholder="Search for a question" onkeyup="myFunction()"> -->
      </div>
    </header>

    <div class="accordion-body">
      <div class="accHeader">
        <h1>General</h1>
      </div>

      <div class="accQues">

        <div class="collapsible">What is Jubilee Aid?</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

        <div class="collapsible">Is account registration required</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

        <div class="collapsible">Why should I use Jubilee Aid?</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

      </div>
    </div>

    <div class="accordion-body">
      <div class="accHeader">
        <h1>Investment & Gains</h1>
      </div>

      <div class="accQues">

        <div class="collapsible">How much can I invest on Jubilee Aid?</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

        <div class="collapsible">What types of investment plans are available on Jubilee Aid?</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

        <div class="collapsible">How many investment plans can I create?</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

        <div class="collapsible">When does my investment begin to earn returns?</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

        <div class="collapsible">Can I monitor my investment and returns?</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

      </div>
    </div>


    <div class="accordion-body">
      <div class="accHeader">
        <h1>Fees & Charges</h1>
      </div>

      <div class="accQues">

        <div class="collapsible">How much do you charge?</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

      </div>
    </div>

    <div class="accordion-body">
      <div class="accHeader">
        <h1>Safety & Security</h1>
      </div>

      <div class="accQues">

        <div class="collapsible">How secure is my information?</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

        <div class="collapsible">How safe is my money?</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

      </div>
    </div>

    <div class="accordion-body">
      <div class="accHeader">
        <h1>Withdrawals</h1>
      </div>

      <div class="accQues">

        <div class="collapsible">When can I withdraw my money?</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

        <div class="collapsible">How do I withdraw my money?</div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae non eveniet rem. Magnam explicabo
            illo ullam! Necessitatibus tempore enim delectus, sit praesentium porro, doloribus ratione illo
            recusandae debitis odio architecto.</p>
        </div>

      </div>
    </div>

    <?php
    require "../components/routes/footer.php";
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


  <script src="../../app.js"></script>
  <script src="app.js"></script>
  <script>
    window.onscroll = () => {
      if (document.body.scrollTop > 50 ||
        document.documentElement.scrollTop > 50) {

        document.querySelector("nav").style.backgroundColor = "#ffffff"
      } else {
        document.querySelector("nav").style.backgroundColor = "unset"
      }
    }
  </script>

</body>

</html>