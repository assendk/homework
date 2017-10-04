<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 4.10.2017 г.
 * Time: 10:43 ч.
 */
require_once "model/config.php";

//$statement = $connect2->query('SELECT * FROM users');
$stmt = "SELECT * FROM adk.members";
$query = $pdo->prepare($stmt);
$query->execute();

//while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
while($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo $row['id'] . ' ' . $row['full_name']."<br>";

}