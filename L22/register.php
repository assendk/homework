<?php
session_start();
require_once "config.php";
if(isset($_POST["logout"])) {
    $_SESSION["loged"] = false;
    setcookie("myName", "not loged");
    header("location: register.php");
}

if (file_exists($usersDB)){
    $users_array = json_decode(file_get_contents($usersDB), true);
}
else {
    //generate array
    $users_array = [];
    $users_array["dummy"]["pass"] = "123";
    $users_array["dummy"]["color"] = "red";
    file_put_contents($usersDB, json_encode($users_array));
}
//$users_array = json_decode(file_get_contents($usersDB), true);
//print_r($users_array);
$reg_msg = "";
$note_index = $_SESSION["notesCount"];


if (isset($_POST["register"])) {
    $new_user = htmlentities($_POST["newuser"]);
    $new_pass = htmlentities($_POST["passw"]);
    $new_pass_confirm = htmlentities($_POST["passw-confirm"]);
    if ($new_user !== "") {
        if (array_key_exists($new_user, $users_array)) {
            $reg_msg = " User already exist";
            //echo $reg_msg;
        } else {
            if ($new_pass === $new_pass_confirm && $new_pass != "") {
                $just_registered = array();
                $just_registered[$new_user] = ["pass" => $new_pass,"color" => "gray"];
                print_r($just_registered);
                //array_push($users_array, $just_registered);
                $new_userlist = array_merge($users_array, $just_registered);
                file_put_contents($usersDB, json_encode($new_userlist));
                echo "Success";
                //create user file and add 1st note
                $dummy_note = [];
                $dummy_note["$note_index"] = [];
                $dummy_note["$note_index"]["title"] = "First note";
                $dummy_note["$note_index"]["date"] = $note_date;
                $dummy_note["$note_index"]["priority"] = 5;
                $dummy_note["$note_index"]["content"] = "Lorem ipsum text";
                file_put_contents($user_folder.$new_user."-notes.json", json_encode($dummy_note), FILE_APPEND );
                $_SESSION["notesCount"] = 1;

                header("location: login.php");
            } else {
                echo "password not ok";
            }
        }
    }
    else {
        echo "empty username not accepted";
    }

}
include "header.php";
?>
<div id="user_id">
    <span><?php
    if(isset($_COOKIE["myName"])) {
        echo "User: " . $_COOKIE["myName"];
    }
    ?></span>
    <span><form action="" method="post">
        <input type="submit" name="logout" value="logout">
    </form></span>
</div>

<div class="forma">
    <h1>Registration page</h1>
    <form action="" method="post">
        <input type="text" name="newuser"><?php if($reg_msg != "") {
            echo "<span class=\"err-msg\">".$reg_msg."</span>";
        } ?><br>
        <input type="password" name="passw" ><br>
        <input type="password" name="passw-confirm" ><br>
        <input type="submit" name="register" value="Register">
    </form>
</div>

<?php include "footer.php"; ?>
