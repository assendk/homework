<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Using Ajax with PHP/MySQL</title>
    <link rel="stylesheet" href="../css/style.css"/>
    <script type="text/javascript" src="../js/script.js"></script>
</head>

<body>

<div class="container">
    <?php include "menu.php" ?>
    <h1 class="main_title">Main</h1>
    <div class="content">
        <div style="">
            <?php
            if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
                echo "not loged in";
            } else {
                $uid = $_SESSION['user_id'];
                //var_dump($uid);
                       require_once "../model/sql_queries.php";
                     var_dump(currentUser($uid));
                        //echo currentUser($uid);
            }
            ?>
        </div>

    </div><!-- content -->

</div><!-- container -->
</body>
</html>
