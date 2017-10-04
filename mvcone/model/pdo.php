<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 23.9.2017 г.
 * Time: 21:51 ч.
 */
$hosta = "127.0.0.1";
$porta = "3306";
$dbName = "adk";
$usernamea = "root";
$passworda = "";

$dsn = "mysql:host=$hosta:$porta;dbname=$dbName";
$pdo = null;
try {
    $pdo = new PDO($dsn, $usernamea,'$passworda');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo "error:" . $e->getMessage();
}
?>