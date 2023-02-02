<?php

session_start();
include_once('functions/member-function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="assets/logo.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="style/login.css">
    <?php include_once('assets/styles.html'); ?>

</head>

<body>

    <div class="limiter">
        <div class="container-login">
            <div class="wrap-login">
                <form method="POST" action="login_db.php" class="login-form validate-form">
                    <span class="login-form-title p-b-26">
                        Dollytopfy Management
                    </span>
                    <span class="login-form-title p-b-48">
                        <i class="fab fa-reddit-alien"></i>
                    </span>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="error">
                            <h3>
                                <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
                            </h3>
                        </div>
                    <?php endif ?>
                    <div class="wrap-input validate-input" data-validate="Valid username is: a@b.c">
                        <input class="input100 input-group" type="text" name="username" required placeholder="Username">
                    </div>
                    <div class="wrap-input validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100 input-group" type="password" name="password" required placeholder="Password">
                    </div>
                    <div class="container-login-form-btn">
                        <div class="wrap-login-form-btn input-group">
                            <button type="submit" name="login_user" class="login-form-btn button">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
                <div class="text-center p-t-115">
                    <span class="txt1">
                        Back to Market Doll &nbsp;
                    </span>
                    <a class="txt2" href="index.php">
                        BACK
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('assets/scripts.html'); ?>

    <!-- <script>

        document.getElementById('username');

    </script> -->

</body>



</html>