<?php
if(empty($_GET['sort_element']) || empty($_GET['sort_type'])){
    header("location: main.php?sort_element=ti_price&sort_type=asc");
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['username'])) {
    $_COOKIE["usernamec"] = $_SESSION["username"];
}
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"] ==""){
    header("location: all-offers.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Using Ajax with PHP/MySQL</title>
    <link rel="stylesheet" href="../css/style.css"/>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/tickets.js"></script>
</head>

<body>

<div class="container">
    <?php include "menu.php" ?>
    <div class="content">
        <h2>
            <?php
            if (!isset($_SESSION['username']) || $_SESSION['username'] == '') {
                echo "not loged in";
            } else {
                $uid = $_SESSION['username'];
                //var_dump($uid);
                //echo $uid;
                //require_once "../model/sql_queries.php";
                //var_dump(currentUser($uid));

            }
            if (!isset($_COOKIE["usernamec"])) {
                echo "";
            } else {
                echo "Welcome " . $_COOKIE["usernamec"] . ", this are Your offers";
            }
            ?>
        </h2>
        <fieldset id="fs_members_list" class="field_container">
            <legend> Your offers </legend>
            <div id="list_container">
                <?php
                include "../model/config.php";
                $pdo = connect();

                include('../controler/list_tickets_controller.php');
                ?>
            </div><!-- list_container -->
        </fieldset>

    </div><!-- content -->

</div><!-- container -->
</body>
</html>
