<?php
$usersDB = "files/users.json";
$user_folder = "files/";

$siteName = "Custom text";
$note_date = date("Y-m-d, H:i");

/* function create_dummy_note($loged_user){
    $note_index = date("Y-m-d-i-H");
    $dummy_note = [];
    $dummy_note["$note_index"] = [];
    $dummy_note["$note_index"] = ["name" => "First note", "priority" => 5, "content" => "lorem ipsum"];
    $user_folder = "files/";
    file_put_contents($user_folder.$loged_user."-notes.json", json_encode($dummy_note), FILE_APPEND );
} */
?>