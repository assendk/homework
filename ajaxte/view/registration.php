<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
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
</body>
</html>