<div class="logo">
    <i class="fa fa-times" style="font-size: 20px; cursor: pointer;"></i>
</div>

<ul class="nav-list">
    <li class="nav-items">
        <section class="name">
            <h3 class=""><a href="../profile/" class="nav-links">Hi, <?php echo $_SESSION["firstname"]; ?></a></h3>
        </section>
    </li>
    <li class="nav-items">
        <h6><a href="../home/" class="nav-links"><i class="fa fa-home"></i>Home</a></h6>
    </li>
    <li class="nav-items">
        <h6><a href="../plans/" class="nav-links"><i class="fa fa-credit-card-alt"></i>Plans</a></h6>
    </li>
    <li class="nav-items">
        <h6><a href="../withdraw/index.php" class="nav-links"><i class="fa fa-history"></i>Withdraw</a></h6>
    </li>
    <li class="nav-items">
        <h6><a href="../refer/refer.php" class="nav-links"><i class="fa fa-gift"></i>Referral</a></h6>
    </li>
    <li class="nav-items">
        <h6><a href="../payment/" class="nav-links"><i class="fa fa-money"></i>Payment</a></h6>
    </li>
    <li class="nav-items">
        <form action="../../pages/components/logout.inc.php" method="POST">
            <button type="submit" class="btn btn-dark" name="logout"><i class="fa fa-sign-out"></i><span>Log Out</span></button>
        </form>
    </li>
</ul>