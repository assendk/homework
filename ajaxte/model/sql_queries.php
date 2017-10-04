<?php
/*
//constants
define('DB_IP', "127.0.0.1");
define('DB_PORT', "3306");
//define('DB_USER', "ittstudent");
//define('DB_PASS', "ittstudent-123");
//define('DB_NAME', "imagehub");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_NAME', "adk");



function getConnection(){
    try{
        $pdo = new PDO("mysql:host=".DB_IP.":".DB_PORT.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch (PDOException $e){
        echo "Ops! PDO Problem - " . $e->getMessage();
    }
} */
require_once "config.php";

/** Checks for successfull login with username and password
 * @param $username - the username from the login form
 * @param $password - the password from the login form
 * @return bool|mixed - the user if he exists or false if login not successful
 */
function existsUser($username, $password = null){
    try{
        //$pdo = getConnection();
        $pdo = connect();
        //$statement = $pdo->prepare("SELECT id, username, full_name, email, password FROM members WHERE username = ?");
        $statement = $pdo->prepare("SELECT id, username, password FROM adk.members WHERE username = ?");
        $statement->execute(array($username));

        if($password == null){
            return $statement->rowCount() > 0;
        }
        if($statement->rowCount() > 0){
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            if($user["password"] == sha1($password)){
                return $user;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    catch (PDOException $e){
        //header("Location:error.php");
        echo "err msg: " . $e->getMessage();
    }
}

function insertUser($username, $full_name, $password, $email, $age = null){
    $pdo = connect();
    $statement = $pdo->prepare("INSERT INTO members (username, full_name, password, email, age) VALUES (?, ?, ?, ?, ?)");
    $statement->execute(array($username, $full_name, sha1($password), $email, $age));
    return $pdo->lastInsertId();
}

function currentUser($uid){
    $pdo = connect();
    $statement = $pdo->prepare("SELECT username FROM members WHERE id = ?;");
    $statement->execute(array($uid));
    $username = $uid;
    return $username;
}

/*  images ======================================================*/
function getImagesForUser($owner_id, $page = 1){
    try{
        $pdo = connect();
        $statement = $pdo->prepare("SELECT image_url FROM images WHERE owner_id = ? LIMIT 1 OFFSET " . ($page-1));
        $statement->execute(array($owner_id));
        $urls = array();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row){
            $urls[] = $row["image_url"];
        }
        return $urls;
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
}

function insertImage($image_url, $owner_id){
        $pdo = connect();
        $stm = $pdo->prepare("INSERT INTO images (image_url, owner_id) VALUES (?, ?)");
        $params = array($image_url, $owner_id);
        $stm->execute($params);
}
