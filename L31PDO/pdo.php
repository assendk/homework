<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 23.9.2017 г.
 * Time: 21:51 ч.
 */

$dsn = "mysql:host=127.0.0.1:3306;dbname=adk";
$pdo = null;
try {
    $pdo = new PDO($dsn, 'root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo "error:" . $e->getMessage();
}
?>