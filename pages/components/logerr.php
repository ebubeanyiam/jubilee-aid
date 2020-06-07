<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Scripts and Stylesheeets -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <!-- ---- -->

    <title>JUBILEE AID | OOPS</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        h1, p, a {
            text-align: center;
            font-family: 'Montserrat', sans-serif;
        }
        h1 {
            font-size: 25px;
            font-weight: 400;
            margin-bottom: 30px;
        }
        p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .head {
            height: 60vh;
            background-image: url("../../images/error.svg");
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            margin-bottom: 30px;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: space-around;
        }

        footer p {
            font-size: 14px;
        }
        footer p a {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="head"></div>

    <h1>Oops, seems your email or password was incorrect</h1>
    <p>Why don't you try again <a href="../login/login.php">here</a></p>
    <p>OR</p>
    <p>Contact <a href="../../index.php #contact">Support</a></p>

    <footer>
        <p> © <?php echo date("Y");?> JUBILEE AID </p>
        <p><a href="#">Privacy</a><a href="#">Terms</a></p>
    </footer>
</body>
</html>