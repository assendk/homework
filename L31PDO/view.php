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
<h1>View</h1>
<?php
$result ="";
try {
    $stmt = $pdo->query("SELECT user_name, first_name, age FROM adk.homework");
    while ($row = $stmt->fetch()) {
        echo "<p>" . $row['user_name'] . " | " . $row['first_name'] . " | " . $row['age']."</p>";
    }
    $ncols = $stmt->columnCount();
    $ecols = $stmt->rowCount();
    echo "cols: ". $ncols. $ecols;
}

catch (PDOException $e) {
$error = $e->getMessage();
}



?>
</body>
</html>
