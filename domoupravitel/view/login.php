<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
$uid = "";
$errormsg = "";
require_once "../model/config.php";

if(isset($_POST['login'])) {
    $username = htmlentities($_POST["username"]);
    $pass = htmlentities($_POST["password"]);
var_dump($username, $pass);
    try {
    $pdo = connect();
    $stmt = $pdo->prepare("SELECT user_id, `name`, password FROM adkus WHERE name = ?");
    $stmt->execute(array($username));

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($result);
    foreach ($result as $row) {
        if ($username == $row['name'] && $row['password'] == sha1($pass)) {
//            var_dump($row['name']);
//            var_dump($row['password']);

            $_SESSION["logedin"] = true;
            $_SESSION["user_id"] = $row['user_id'];
            $_SESSION["username"] = $row['name'];
//            $_SESSION["family"] = $row['family_name'];
            header("location: member.php");
        }
        else {
            $errormsg = "Wrong username or password";
        }
    }
    }
    catch (PDOException $e) {
        echo "PDO login error: " . $e->getMessage();
    }
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="container" class="container">
<?php include "menu.php"; ?>
<div class="errmsg">
<?php if($errormsg != "") {echo $errormsg;} ?>
</div>
<form class="reglog" action="" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username"><br>
    <label for="password">Password: </label>
    <input type="password" name="password"><br>
    <input type="submit" name="login" value="Login">
</form>
<p><a href="register.php">or Register here.</a></p>

</div>

</body>
</html>
