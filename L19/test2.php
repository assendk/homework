<?php
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