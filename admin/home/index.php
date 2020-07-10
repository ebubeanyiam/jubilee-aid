<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Users</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php
    if (!isset($_SESSION['adminId'])) {
        header("Location: ../login");
    } else { ?>
        <nav class="menu-bar"> ';
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
                        <p>Welcome <?php echo $_SESSION["username"]; ?></p>
                        <span class="alert alert-primary" role="alert"">You're logged in as an admin.</span>
                    </div>

                    <div class=" action">
                            <h1>Actions</h1>
                            <div class="cards">
                                <div>
                                    <h3>View Users</h3>
                                    <a href="../users/">Get Started</a>
                                </div>
                                <div>
                                    <h3>Merge Users</h3>
                                    <a href="../merge/">Get Started</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="../components/app.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <?php } ?>


</body>

</html>