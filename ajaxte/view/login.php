<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
setcookie("usernamec","");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lOGIN</title>
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div class="container">
    <?php include "menu.php" ?>
    <div id="main-content">
        <!-- <div id="main2">
            <?php include "non_loged_list.php" ?>
        </div> -->
        <h1>Login</h1>
        <div class="forma">
            <fieldset class="field_container">
                <legend> Login </legend>
            <form action="../controler/login_controller.php" method="post">
                Username: <input type="text" name="username" required><br>
                Password <input type="password" name="password" required><br>
                <input type="submit" name="login_submit" value="Login"><br>
                Or <a href="register.php">register here</a>
            </form>

            </fieldset>
        </div>
    </div>
</div>
</body>
</html>
