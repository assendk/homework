<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 24.9.2017 г.
 * Time: 01:18 ч.
 */
require_once "pdo.php";
$success = "";
$error = "";

if(isset($_POST["submit-pdo"] )) {
    $user_name = $_POST["user_name"];
    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $age = $_POST["age"];
    $location = $_POST["location"];
    $email = $_POST["email"];
    if ($user_name == "") {
        $user_name = $first_name;
    }
    try {
        $pdo->beginTransaction();
        //$stmt = $pdo->exec("INSERT INTO adk.homework (user_name, first_name, second_name,age,location_id,email) VALUES ('$user_name', '$first_name', '$second_name',$age,$location,'$email')");

        $sql = "INSERT INTO adk.homework (`user_name`, `first_name`, `second_name`, `age`, `location_id`, `email`) VALUES (?, ?, ?, ?, ?, ?)";
        //$sql = "INSERT INTO adk.homework (`user_name`, `first_name`, `second_name`) VALUES (?, ?, ?)";
        //$sql = "INSERT INTO adk.homework (`user_name`, `first_name`) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql); // must be prepare
        $params = array($user_name, $first_name, $second_name, $age, $location, $email);
        $stmt->execute($params);
        $pdo->commit();

        $success = true;
    } catch (PDOException $e) {
        $pdo->rollBack();
        $error = $e->getMessage();
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <style>
        td {border: 1px solid black;}
    </style>
</head>
<body>
<?php include "menu.php"; ?>
<div id="main">
    <h1>Register</h1>
<form action="" method="post">
    username: <input type="text" name="user_name"><br>
    name: <input type="text" name="first_name"><br>
    family: <input type="text" name="second_name"><br>
    age: <input type="number" name="age" maxlength="2" value="20"><br>
     address:
    <select name="location" class="dropdowng">
        <option value="1" selected>Sofia</option>
        <option value="2">Plovdiv</option>
        <option value="3">Varna</option>
        <option value="4">Burgas</option>
        <option value="5">Other</option>
    </select><br>
    <!-- address: <input type="number" name="location"><br> -->
    email: <input type="email" name="email"><br>
    <input type="submit" name="submit-pdo" value="input">
</form>
<?php
    if($success) {
        echo "succes";
    }
    else {
        echo $error;
    }


    try {
        $pdo->query("SELECT * FROM adk.homework");
    } catch (PDOException $r) {
        $error = $e->getMessage();
    }

?>
</div>
</body>
</html>