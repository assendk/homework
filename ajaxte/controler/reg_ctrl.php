<?php
//register.php
//session_start();

require_once "../model/config.php";

if (isset($_POST['registerme'])) {
    $username = !empty(htmlentities($_POST['username'])) ? trim($_POST['username']) : null;
    $full_name = !empty(htmlentities($_POST['full_name'])) ? trim($_POST['full_name']) : null;
    $pass = !empty(htmlentities($_POST['password'])) ? trim($_POST['password']) : null;
    $email = !empty(htmlentities($_POST['email'])) ? trim($_POST['email']) : null;
    $age = !empty(htmlentities($_POST['email'])) ? trim($_POST['email']) : null;

    //Now, we need to check if the supplied username already exists.

    //Construct the SQL statement and prepare it.
    $pdo = connect();
    $sql = "SELECT COUNT(username) AS num FROM members WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();

    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['num'] > 0) {
        //die('That username already exists!');
        ($_COOKIE["err"] = 1);
        exit(header('Location: ../view/registration.php'));
    }

    $passwordHash = sha1($pass);

    //Prepare our INSERT statement.
    //Remember: We are inserting a new row into our users table.
    //$sql = "INSERT INTO members (username, password) VALUES (:username, :password)";
    //$stmt = $pdo->prepare($sql);
    try {
        $sql = "INSERT INTO members (username, full_name, password, email, age) VALUES (?, ?, ?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->execute(array($username, $full_name, $passwordHash, $email, $age));
        $resu = $pdo->lastInsertId();
        $_COOKIE["err"] = 0;
        header("location: ../view/login.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>