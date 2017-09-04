<?php
session_start();
require_once "config.php";
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 24.8.2017 г.
 * Time: 15:41 ч.
 */
$pageTitle  = "Main notes";
if(!isset($_SESSION["loged"]) || $_SESSION["loged"] == false) {
    header("Location: login.php");
}

if(isset($_POST["logout"])){
    setcookie("myName", "noname");
    $_SESSION["loged"] = false;
    $_SESSION["uname"] = "not loged";
    header("Location: index.php");
    exit();
}
$loged_user = $_SESSION["uname"];
$file_exist = false;
//$note_index = date("Y-m-d-H-i");
$note_index = $_SESSION["notesCount"];

if(file_exists($user_folder.$loged_user."-notes.json") == false) {
    $dummy_note = [];
    $dummy_note["$note_index"] = [];
    $dummy_note["$note_index"]["title"] = "First note";
    $dummy_note["$note_index"]["date"] = $note_date;
    $dummy_note["$note_index"]["priority"] = 5;
    $dummy_note["$note_index"]["content"] = "Lorem ipsum text";

    file_put_contents($user_folder.$loged_user."-notes.json", json_encode($dummy_note), FILE_APPEND );
}
else {
    $user_notes = json_decode(file_get_contents($user_folder.$loged_user."-notes.json"),true);
    $file_exist = true;
}

/* add note */
if(isset($_POST["new-note"])){
    $new_note_index = $_SESSION["notesCount"]+1;
    $new_note = [];
    $new_note["$new_note_index"] = [];
    $new_note["$new_note_index"]["title"] = $_POST["title"];
    $new_note["$new_note_index"]["date"] = $note_date;
    $new_note["$new_note_index"]["priority"] = $_POST["priority"];
    $new_note["$new_note_index"]["content"] = $_POST["content"];
    //add the note
    $user_notes = json_decode(file_get_contents($user_folder.$loged_user."-notes.json"),true);
    $add_the_note = array_merge($user_notes,$new_note);
    file_put_contents($user_folder.$loged_user."-notes.json", json_encode($add_the_note));
    header("location: main.php");

}


require_once "header.php";
?>
<!-- username field -->
<div id="user_id">
    <?php

    if(isset($_COOKIE["myName"])) {
        echo "User: " . $_COOKIE["myName"];
    }
    ?>
    <form action="" method="post">
        <input type="submit" name="logout" value="logout">
    </form>

</div>

<div class="main-content">
<h1>My notes</h1>
    <div class="note-list">
<?php
    $user_notes_list = json_decode(file_get_contents($user_folder.$loged_user."-notes.json"),true);
    echo "<ul class=\"note\">";
    foreach ($user_notes_list as $row) {
            echo "<li>";
            echo "<strong>" . $row["title"]."</strong> [".$row["priority"]. "]<br>";
            echo "<span class=\"note-date\">" .$row["date"]."</span><br>";

            echo $row["content"]."<br>";
            echo "</li>";
        }
    echo "</ul>";

?>
    </div>
    <!-- add note -->
    <hr>
    <div id="new-note">
        <h3>add new note:</h3>
        <form action="" method="post">
            Title:
            <input type="text" name="title"><br>
            Priority:
            <input type="radio" name="priority" value="1" checked>1
            <input type="radio" name="priority" value="2">2
            <input type="radio" name="priority" value="3">3
            <input type="radio" name="priority" value="4">4
            <input type="radio" name="priority" value="5">5<br>
            Content:<br>
            <textarea name="content" id="" cols="50" rows="4"></textarea><br>
            <input type="submit" name="new-note" value="Add">
        </form>
    </div>
</div>

<?php include "footer.php"; ?>