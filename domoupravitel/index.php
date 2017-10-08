<?php
session_start();

if(!isset($_SESSION["user_id"])){
    header("Location:view/login.php");
}
else{
    header("Location:view/member.php");
}