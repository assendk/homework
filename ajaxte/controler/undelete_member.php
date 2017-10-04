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
    $sql = "UPDATE members SET visibility='1' WHERE id = :id";
	$query = $pdo->prepare($sql);
	$query->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_members.php');
?>