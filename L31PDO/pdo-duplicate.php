<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 23.9.2017 г.
 * Time: 21:51 ч.
 */

$dsn = "mysql:host=127.0.0.1:3306;dbname=adk";

try {
    $pdo = new PDO($dsn, 'root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "we rock";
    //$pdo->exec("update adk.homework set age = age+2 WHERE id = 1 ");
    //$pdo->exec("INSERT into homework (email) VALUE ('adk@adk.com') WHERE id = 1 ");
    //$pdo->exec("UPDATE homework SET email = 'aaa@aaa.com' WHERE id = 1");
    $res = $pdo->query("SELECT * FROM homework");
    echo "<table>";
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>";
        echo $row["first_name"];
        echo "</td>";
        echo "<td>";
        echo $row["second_name"];
        echo "</td>";

        echo "</tr>";
    }
    echo "</table>";
}
catch (PDOException $e){
    echo "error:" . $e->getMessage();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td {border: 1px solid black;}
    </style>
</head>
<body>

</body>
</html>