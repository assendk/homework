<?php
session_start();

if(!isset($_SESSION["user_id"])){
    header("Location:login.php");
}
else{
    header("Location:main.php");
}