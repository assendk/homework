<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
setcookie("err", "");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <?php include "menu.php"; ?>
    <h1>Register</h1>

    <form action="../controler/reg_ctrl.php" method="post">
        Username: <input type="text" id="username" name="username" placeholder="Useraname"><br>
        Full name: <input type="text" id="full_name" name="full_name" placeholder="Your name and family"><br>
        Password: <input type="password" id="password" name="password" placeholder="Password"><br>
        <!-- confirm password input -->
        Email: <input type="email" name="email" value="test@test.aa"><br>
        Age: <input type="number" name="age" value="20" min="10" max="100" size="3"><br>
        <input type="submit" name="registerme" value="Register">
    </form>
    <div>
        <?php
        if ($_COOKIE["err"] = 0) {
            echo "";
        } else if ($_COOKIE["err"] = 2) {
            echo "User already exista";
        }
        else {
            echo "";
        }
        ?>
    </div>
</div>
</body>
</html>