<nav id="nav">

  <div class="logo">
    <a href="./"><img src="./assets/images/logo.png" alt=""></a>
  </div>

  <div class="mobile-nav">
    <div class="navigation">
      <ul class="navLinks">
        <li><a href="#">About</a></li>
        <li><a href="#">Invest</a></li>
        <li><a href="./user/plans/">Withdraw</a></li>
        <li><a href="./pages/faq">FAQ</a></li>
        <li><a href="./pages/privacy">Learn</a></li>
      </ul>
    </div>

    <div class="status">
      <?php
      if (isset($_SESSION['userId'])) {
        echo '
              <a href="./user/home/"><button class="b1">Client</button></a>
              <a href="./pages/components/logout.inc.php"><button>Log Out</button></a>
            ';
      } else {
        echo '
            <a href="./pages/login/"><button class="b1">Log in</button></a>
            <a href="./pages/register/"><button>Register</button></a>
            ';
      }
      ?>
    </div>
  </div>

  <div class="hamburger">
    <div class="l1"></div>
    <div class="l2"></div>
    <div class="l3"></div>
  </div>

</nav>