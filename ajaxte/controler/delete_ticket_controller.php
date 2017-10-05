<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Using Ajax with PHP/MySQL
*/

include('../model/config.php');
$pdo = connect();
// deleting a member using PDO with try/catch to escape the exceptions
try {
    //$sql = "DELETE FROM members WHERE id = :id";
    //$sql = "UPDATE members SET visibility='0' WHERE id = :id";
    $sql = "DELETE FROM tickets WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $query->execute();
    header("location: list_tickets_controller.php");
} catch (PDOException $e) {
    echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_tickets_controller.php');
?>