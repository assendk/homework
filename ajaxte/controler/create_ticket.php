<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "../model/sql_queries.php";

if(isset($_POST['ticketxt'])){
    $ti_text = htmlentities($_POST["ticketxt"]);
}
//var_dump($ti_text);

if(isset($_POST['price'])){
    $ti_price = htmlentities($_POST['price']);
    //die ('MySQL Not found // Could Not Connect.');
}
//var_dump($ti_price);

//if (isset($_POST["submit"])) {
//    $user_id = $_SESSION["user_id"];
//    $ti_text = htmlentities($_POST["ticketxt"]);
//    $ti_price = htmlentities($_POST["price"]);
//    insertTicketInfo("", $ti_text, $ti_price, $user_id);
//      header("Location:../view/main.php");
//}


if (isset($_POST["submit"])) {
    $user_id = $_SESSION["user_id"];
    $ti_text = htmlentities($_POST["ticketxt"]);
    var_dump($ti_text);
    $ti_price = htmlentities($_POST['price']);

    if ($ti_price < 0) {
        $ti_price = 0;
    }

    $upload_time = microtime();
    $file_tmp_name = $_FILES["image"]["tmp_name"];
    $extension = mime_content_type($file_tmp_name);
    echo $extension;
    $extension = explode("/", $extension)[1];
    $file_new_name = "../uploads/$user_id-$upload_time.$extension";
    $file_url = "/uploads/$user_id-$upload_time.$extension";
    try {
        if (is_uploaded_file($file_tmp_name)) {
            //insertImage($file_url, $user_id);
            insertTicketInfo($file_url, $ti_text, $ti_price, $user_id);
            move_uploaded_file($file_tmp_name, $file_new_name);
            //insertTicketInfo($ti_text, $owner_id);
            header("Location:../view/main.php");
        } else {
            header("Location:../view/error.php");
        }
    } catch (Exception $e) {
        echo "msg: " . $e->getMessage();
//header("Location:../view/error.html");
    }
}

