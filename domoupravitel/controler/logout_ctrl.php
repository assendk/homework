<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST['logout'])){
session_destroy();
//setcookie("");
header("location: ../view/index.php");
}