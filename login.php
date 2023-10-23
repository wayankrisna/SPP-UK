<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM LOGIN</title>
    <link rel="stylesheet" href="css/login2.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <form action="proseslogin.php" method="POST">
                <h1>Login</h1>
                <hr>
                <p>Program Pembayaran SPP</p>
                <label for="">Username / NIS</label>
                <input type="text" placeholder="username / nis" id="username" name="username">
                <label for="">Password</label>
                <input type="password" placeholder="password" id="password" name="password">
                <button>Login</button>

            </form>
        </div>
        <div class="right">
            <img src="images/login-bg7.png" alt="spp">
        </div>
    </div>
</body>

</html>