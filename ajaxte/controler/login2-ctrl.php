<?php
//login2.php
session_start();

require "../model/config.php";


//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if(isset($_POST['loginf'])){
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    //Retrieve the user account information for the given username.
    //$sql = "SELECT id, username, password FROM users WHERE username = :username";
    $pdo = connect();
    $sql = "SELECT id, username, full_name, password FROM members WHERE username = :username";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->execute();

    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($user['id']);

    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username / password combination!');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.

        //Compare the passwords.
        //$validPassword = password_verify($passwordAttempt, $user['password']);
        $passwordAttempt = sha1($passwordAttempt);
        //var_dump($passwordAttempt);
        $validPassword = "";
        if ($passwordAttempt == $user["password"]) {
            $validPassword = true;
            //var_dump($validPassword);
        }

        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){

            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION["username"] = $user["username"];
            $coo_name = "usernamec";
            $coo_username = $user["username"];
            //setcookie($coo_name, $coo_username, time() + (86400 * 30), "/");
            $user_from_base =
            $_COOKIE["usernamec"] = $user["username"];
            $_SESSION['logged_in'] = time();

            //Redirect to our protected page, which we called home.php
            header('Location: ../view/main.php');
            exit;

        } else{
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect username / password combination!');
        }
    }

}