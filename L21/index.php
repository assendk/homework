<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 23.8.2017 г.
 * Time: 00:59 ч.
 */
//check if username is registered
$visits = 0;
if(isset($_POST["submit"])) {
    $username = $_POST["usernamef"];
    $password = $_POST["passwordf"];

}
if(isset($_COOKIE["visits"])) {
    $visits = $_COOKIE["visits"];
}
setcookie("visits", $counter+1);

//set cookie
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="">
    <input type="text" name="usernamef">
    <input type="password" name="passwordf">
    <input type="submit" name="submit">
</form>
</body>
</html>
