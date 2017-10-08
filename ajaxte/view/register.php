<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regiser</title>
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div class="container">
    <?php include "menu.php" ?>
    <h1 class="main_title">Register</h1>

    <div class="content forma">
        <fieldset class="field_container">
            <legend> Register</legend>
            <form action="../controler/register_controller.php" method="post">
                Username: <input type="text" name="username" required><br>
                Name and family: <input type="text" name="full_name" required><br>
                Password <input type="password" name="password" required><br>
                Confirm Password <input type="password" name="confirm_password"><br>
                Email: <input type="email" name="email" required><br>
                Age: <input type="number" maxlength="2" name="age" width="50px"><br>
                <input type="submit" name="register_submit" value="Register">
            </form>
        </fieldset>
    </div>
</div>
</body>
</html>