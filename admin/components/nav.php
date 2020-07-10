<div class="logo">
    <!-- <a href="../../index.php"><img src="../../assets/images/logo.png" alt=""></a> -->
    <i class="fa fa-times" style="font-size: 20px; cursor: pointer;"></i>
</div>

<ul class="nav-list">
    <li class="nav-items">
        <section class="name">
            <h3 class=""><a href="../profile/" class="nav-links">Hi, <?php echo $_SESSION["username"]; ?></a></h3>
        </section>
    </li>
    <li class="nav-items">
        <a href="../home/" class="nav-links"><i class="fa fa-home"></i><span>Home</span></a>
    </li>
    <li class="nav-items">
        <a href="../users/" class="nav-links"><i class="fa fa-users"></i><span>Users</span></a>
    </li>
    <li class="nav-items">
        <a href="../merge/" class="nav-links"><i class="fa fa-compress"></i><span>Merge</span></a>
    </li>
    <li class="nav-items">
        <a href="../delete/" class="nav-links"><i class="fa fa-trash"></i><span>Delete</span></a>
    </li>
    <li class="nav-items">
        <a href="../bonus/" class="nav-links"><i class="fa fa-money"></i><span>Bonus</span></a>
    </li>
    <li class="nav-items">
        <form action="../../pages/components/logout.inc.php" method="POST">
            <button type="submit" class="btn btn-dark" name="logout"><i class="fa fa-sign-out"></i><span>Log Out</span></button>
        </form>
    </li>
</ul>