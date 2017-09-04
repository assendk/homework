<?php
session_start();
$pageTitle  = "Login page";
$log_msg ="";
$usersDB = "files/users.json";
if (file_exists($usersDB)){
    $users_array = json_decode(file_get_contents($usersDB), true);
}
else {
    //generate array
    $users_array = [];
    $users_array["dummy"] = array();
    $users_array["dummy"]["pass"] = "123";
    $users_array["dummy"]["color"] = "red";
    //new user
    $users_array["magi"] = array();
    $users_array["magi"]["pass"] = "234";
    $users_array["magi"]["color"] = "green";
    //put them in file
    file_put_contents($usersDB, json_encode($users_array));
}
$log_error = false;
if(isset($_POST["submit"])){
    $log_user = htmlentities($_POST["user"]);
    $log_pass = htmlentities($_POST["passw"]);
    //foreach ($users_array as $username => $info) {}
    foreach ($users_array as $username => $info) {
        $pass = $info["pass"];
        $color = $info["color"];
        //$pass = $info["pass"];
//        print_r($username);
//        print_r($pass);
        if($username == $log_user && $pass == $log_pass) {
            $log_msg = "SUCCESS";
            $_SESSION["loged"] = true;
            $_SESSION["uname"] = $log_user;
            setcookie("myName", $log_user);
//            print_r($username);
//            print_r($pass);
            header("Location: main.php");
        }
        else {$log_error = true;}//echo "wrong password";}
    }
    //var_dump($users_array);
}

include "header.php";
?>
<div class="forma">
<h1>Login page</h1>

<form action="" method="post">
    <input type="text" name="user" required><?php if($log_error){echo "Wrong username or password";} else {echo $log_msg;} ?><br>
    <input type="password" name="passw" required><br>
    <input type="submit" name="submit" value="Login">
</form>

<!-- <?php if($log_error){echo " Wrong username or password";} else {echo $log_msg;} ?> -->
</div>

<?php include "footer.php"; ?>