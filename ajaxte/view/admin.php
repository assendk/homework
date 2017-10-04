<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Using Ajax with PHP/MySQL</title>
    <link rel="stylesheet" href="../css/style.css" />
    <script type="text/javascript" src="../js/script.js"></script>
</head>

<body>
<div class="container">
    <?php include "menu.php" ?>
    <h1 class="main_title">Admin</h1>
    <div class="content">
        <fieldset class="field_container">
            <legend> Add new member </legend>
            <form>
                <input type="text" id="username" class="frm_input" placeholder="User name">
                <input type="text" id="full_name" class="frm_input" placeholder="Full name">
                <input type="text" id="passwd" class="frm_input" placeholder="Password">
                <input type="text" id="email" class="frm_input" placeholder="Email">
                <input type="text" id="age" class="frm_input" placeholder="Age">
                <input type="button" class="frm_button" value="Add" onclick="add_member()">
            </form>
        </fieldset>
        <fieldset id="fs_members_list" class="field_container">
            <legend> Members list </legend>
            <div id="list_container">
                <?php
                // including the config file
                include "../model/config.php";
                $pdo = connect();
                // list_members : this file displays the list of members in a table view
                include('../controler/list_members.php');
                ?>
            </div><!-- list_container -->
        </fieldset>
        <div id="additional_commands">
            <form action=""></form>
            <button id="purge" class="delete_m" onclick="purgeDelete()">Purge deleted</button>
        </div>
    </div><!-- content -->


</div><!-- container -->
</body>
</html>
