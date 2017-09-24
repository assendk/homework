<?php
require_once "pdo.php";
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 24.9.2017 г.
 * Time: 09:54 ч.
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO view</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "menu.php"; ?>
<div id="main">
<h1>View</h1>
<?php
$result ="";
try {
    $stmt = $pdo->query("SELECT user_name, first_name, age FROM adk.homework");
    echo "<table class='bordered'>";
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['user_name'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['age']."</td>";
        echo "</tr>";
    }
    echo "<table>";
    $ncols = $stmt->columnCount();
    $ecols = $stmt->rowCount();
    echo "cols: ". $ncols. " rows: " . $ecols;
}

catch (PDOException $e) {
$error = $e->getMessage();
}



?>
</div>
</body>
</html>
