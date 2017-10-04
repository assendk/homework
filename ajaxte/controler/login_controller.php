<?php
session_start();
require_once "../model/sql_queries.php";

if(isset($_POST["login_submit"])){
    //check if user exists
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = existsUser($username, $password);
    if($user !== false){
        //success
        $_SESSION["user_id"] = $user["id"];
        header("Location:../view/main.php");
    }
    else{
        //failed login
        header("Location:../view/loginerror.php");
    }
}
?>