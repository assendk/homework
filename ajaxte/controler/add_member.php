<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Using Ajax with PHP/MySQL
*/

include('../model/config.php');
$pdo = connect();
$default_visibility = '1';
// adding new member using PDO with try/catch to escape the exceptions
try {
	$sql = "INSERT INTO members (username, full_name, password, email, age, visibility) VALUES (:username, :full_name, :password, :email, :age, :visibility)";
	$query = $pdo->prepare($sql);
    $query->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
	$query->bindParam(':full_name', $_POST['full_name'], PDO::PARAM_STR);
    $query->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
	$query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
	$query->bindParam(':age', $_POST['age'], PDO::PARAM_STR);
    $query->bindParam(':visibility', $default_visibility, PDO::PARAM_STR);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_members.php');
?>