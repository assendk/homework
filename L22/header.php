<?php
require "config.php";
/* if(isset($_POST["logout"])){
    //$_SESSION["loged"] = false;
    setcookie("myName");
    $_SESSION["loged"] = false;
    session_destroy();
    exit();
} */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if ($pageTitle !== "") {
            echo $pageTitle;
        } else {
            echo "Noname";
        }
        ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="header">
    <div id="logo"><a href="index.php"><?= $siteName; ?></a></div>
    <?php require_once "menu.php" ?>
</div>