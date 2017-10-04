<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Using Ajax with PHP/MySQL
*/

// PDO connect *********
/* function connect2()
{
    try {
        $host = 'localhost';
        $db_name = 'adk';
        $db_user = 'root';
        $db_password = '';
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $db_name, $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $pdo;
    } catch (PDOException $e) {
        echo "PDO Problem: " . $e->getMessage();
    }
} */

function connect()
{
    try {
        $host = 'localhost';
        $porta = 3306;
        $db_name = 'adk';
        $db_user = 'root';
        $db_password = '';
        $pdo = new PDO("mysql:host=$host:$porta;dbname=$db_name", $db_user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {

        $error = "PDO Problem: " . $e->getMessage(). "<br>";
        return $error;
    }
}

?>
