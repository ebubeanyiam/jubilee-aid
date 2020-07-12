<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

  <title>FAQ</title>
</head>


<body>
  <div class="root">
    <header>

      <?php
      require "../components/routes/nav.php";
      ?>

      <div class="landing">
        <h1>About Us</h1>
      </div>
    </header>

    <main>
      <h3>Welcome to <a href="../../">jubileeaid.com</a>!</h3>

      <p>
        If you find yourself here, you are definitely in search of reliable and profitable investment. <br>

        Yes, you are just at the right place! Our Platform offers trust assets management of the highest
        quality on the basis of foreign exchange and profitable trade through Funds exchanges. <br>

        There is no other worldwide financial market that can guarantee the ability to generate constant
        profit with the large price. <br>

        Proposed modalities for strengthening cooperation will be accepted by
        anyone who knows about its fantastic prospects.
      </p>
      <hr>

      <p>
        Jubilee aid investment project is a product of careful preparation and fruitful work of experts in
        the field of highly profitable trade and online marketing. <br>

        Using modern methods of doing business and a personal approach to each client, we offer a unique investment
        model to people who want to invest not only as a method of payment, but also as a reliable source of stable income.
      </p>
      <hr>

      <p>
        Your deposit is working on an ongoing basis, and makes profit every hour with the ability to withdraw profit. <br>

        Your deposit is for life and irretrievable. This proposal would be interesting not only for beginners of
        Investment operation, but also for experienced online investors. <br>

        <a href="../../">Jubileeaid.com</a> uses only modern equipment and trades at the most stable markets,
        which minimizes the risk of financial loss to customers and guarantees them a stable income accrued every
        hour Join our platform today and start making high profits! <br>
      </p>
    </main>

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