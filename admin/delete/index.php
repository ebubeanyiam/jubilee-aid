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

    $servername = "localhost";
    $username = "root";
    $password = "";
    // $username = "anyiamebube";
    // $password = "1095chinemerem";
    $dbname = "jubileeaid";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!isset($_SESSION['username'])) {
        header("Location: ../");
    } else { ?>
        <nav class="menu-bar"> ';
            <?php require "../components/nav.php"; ?>
        </nav>

        <main>
            <div class="header">
                <span><i class="fa fa-bars" style="font-size: 20px; cursor: pointer;"></i></span>
                <h3>Delete Users</h3>
            </div>

            <div class="main-landing">
                <div class="landing">
                    <div class="balance">
                        <p>Type in the ID number of the user you want to delete</p>
                        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="GET">
                            <label for="idnum">Input Id Number</label>
                            <input type="number" id="idnum" name="id" placeholder="ID Number" class="form-control">
                            <button type="submit" class="btn btn-primary" name="submit">Check</button>
                        </form>
                    </div>
                    <?php

                    if (isset($_GET['submit'])) {
                        $id = mysqli_real_escape_string($conn, $_GET['id']);
                        $sql = "SELECT * FROM users WHERE userId='$id'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $userid = $row["userId"];
                                $firstname = $row["firstname"];
                                $lastname = $row["lastname"];
                                $email = $row["email"];
                                $phonenumber = $row["phonenumber"];
                    ?>

                                <table class="table">
                                    <thead style="background-color: #000000; color: #ffffff">
                                        <tr>
                                            <td>#</td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Phonenumber</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $userid; ?></td>
                                            <td><?php echo $firstname . " " . $lastname; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phonenumber; ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <form action='<?php echo htmlspecialchars("../components/del.inc.php"); ?>' method="POST">
                                    <select name="userId" id="" style="display: none;">
                                        <option value="<?php echo $userid; ?>"></option>
                                    </select>
                                    <button type="submit" class="btn btn-primary" name="delete">Confirm Deletion</button>
                                </form>
                    <?php
                            }
                        }
                    }
                    ?>

                </div>
            </div>
        </main>
    <?php }
    ?>


    <script src="../components/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        var button = document.querySelector(".submit");

        button.addEventListener("click", () => {
            button.style.display = "none";
        })
    </script>

</body>

</html>