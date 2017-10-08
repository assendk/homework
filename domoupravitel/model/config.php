<?php
// PDO function connect()
function connect()
{
    try {
        $host = 'localhost';
        //$host = "192.168.8.22";
        $port = 3306;
        $dbname = 'adk';
        $db_user = 'root';
        $db_password = '';
        $pdo = new PDO("mysql:host=$host:$port;dbname=$dbname", $db_user, $db_password );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        $error = "PDO Problem: " . $e->getMessage(). "<br>";
        return $error;
    }
}