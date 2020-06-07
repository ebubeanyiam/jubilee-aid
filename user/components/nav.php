<div class="logo">
        <a href="../../index.php"><img src="../../images/logo.png" alt=""></a>
        <i class="fa fa-times" style="font-size: 20px; cursor: pointer;"></i>
    </div>  

    <ul class="nav-list">
        <li class="nav-items">
            <section class="name"><span>Hi</span><a href="../profile/profile.php" class="nav-links">
            <?php echo $_SESSION["name"] ; ?></a></section>
        </li>
        <li class="nav-items">
            <a href="../home/home.php" class="nav-links"><i class="fa fa-home"></i><span>Home</span></a>
        </li>
        <li class="nav-items">
            <a href="../plans/plans.php" class="nav-links"><i class="fa fa-credit-card-alt"></i><span>Plans</span></a>
        </li>
        <li class="nav-items">
            <a href="../withdraw/withdraw.php" class="nav-links"><i class="fa fa-history"></i><span>Withdraw</span></a>
        </li>
        <li class="nav-items">
            <a href="../refer/refer.php" class="nav-links"><i class="fa fa-gift"></i><span>Referral</span></a>
        </li>
        <li class="nav-items">
            <a href="../payment/payment.php" class="nav-links"><i class="fa fa-money"></i><span>Payment</span></a>
        </li>
        <li class="nav-items">
            <form action="../../pages/components/logout.inc.php" method="POST">
                <button type="submit" class="ctaSelect" name="logout"><i class="fa fa-sign-out"></i>
                <span>Log Out</span></button>
            </form>
        </li>
    </ul>