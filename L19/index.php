<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 20.8.2017 г.
 * Time: 22:48 ч.
 */
//check if username is registered
if(isset($var))

//set cookie
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "menu.php"; ?>
<form action="">
    username
    <input type="text" name="username"><br>
    password
    <input type="text"><br>
    password confirm
    <input type="text"><br>

    <input type="text"><br>
    <input type="text">
</form>
</body>
</html>
