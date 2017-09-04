<?php
session_start();

if(isset($_SESSION["loged"])) {
    if($_SESSION["loged"] == true) {
        //include "main.php";
        header("location: main.php");
    } 
    else {
        header("location: login.php");
    }
}
else {
    header("location: login.php");
}
//require_once "header.php";

?>