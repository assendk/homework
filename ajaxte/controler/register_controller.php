<?php
session_start();
require_once "../model/sql_queries.php";
$password = "";

if(isset($_POST["register_submit"])) {
    //check if user exists
    $username = $_POST["username"];
    $full_name = $_POST["full_name"];
    if (existsUser($username)) {
        //if yes - return error
        $exists = true;
        include "../view/register.php";
    } else {
        $email = $_POST["email"];
        $password = htmlentities($_POST["password"]);


//        $password_to_check = $_POST["password"];
//        $conpazz = $_POST["confirm_password"];
//
//        if ($password_to_check == $conpazz){
//            $password = $password_to_check;
//        }
        $age = $_POST["age"];
       // else {header("location: ../view/register-error.php");}
        
        if (strlen(trim(htmlentities($username))) > 0 &&
            strlen(trim(htmlentities($full_name))) > 0 &&
            strlen(trim(htmlentities($email))) > 0 &&
            strlen(trim(htmlentities($password))) > 0
        ) {
            try {
                $id = insertUser($username, $full_name, $password, $email, $age);
                $_SESSION["user_id"] = $id;
                header("Location:../view/main.php");
            } catch (PDOException $e) {
                echo "msg: " . $e->getMessage();
                //header("Location:../view/register-error.php");
            }
        }
    }
}
?>