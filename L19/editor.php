<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 21.8.2017 г.
 * Time: 01:13 ч.
 */
require_once "config.php";
$producti = [];
$producti[] = "kakao - 4";
$producti[] = "bob - 3";
$producti[] = "zele - 5";
$myFileName = $path . "myDB.txt";
$myFile = fopen($myFileName, "a") or die("can't open file");
$clear = file_put_contents($myFileName, "");

fwrite($myFile, json_encode($producti));
fclose($myFile);

$text = file_get_contents("db/myDB.txt");
echo PHP_EOL;
var_dump(json_decode($text, true));



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "menu.php";?>
<form action="">
    Product <br>
    <input type="text" name="product">
    <br>
    Qty <br>
    <input type="text" name="qty">
    <br>
    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>
