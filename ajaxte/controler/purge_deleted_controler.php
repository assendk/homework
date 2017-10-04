<?php
include('../model/config.php');
$pdo = connect();

//purge
try {
    //$sql = "DELETE FROM members WHERE id = :id";
    $sql = "DELETE FROM members WHERE visibility='0'";
    $query = $pdo->prepare($sql);
    //$query->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $query->execute();
} catch (PDOException $e) {
    echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_members.php');
?>