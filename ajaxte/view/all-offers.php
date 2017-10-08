<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['username'])) {
    $_COOKIE["usernamec"] = $_SESSION["username"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>ALL</title>
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/tickets.js"></script>
    <script>
        function showUser(str) {
            if (str=="") {
                document.getElementById("txtHint").innerHTML="";
                return;
            }
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("txtHint").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","getuser.php?q="+str,true);
            xmlhttp.send();
        }
    </script>
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
                echo "Main: Welcome " . $_COOKIE["usernamec"];
            }
            ?>
        </h2>
        <form>
            <select name="users" onchange="showUser(this.value)">
                <option value="ASC">Select a person:</option>
                <option value="DESC">Peter Griffin</option>
            </select>
        </form>
        <fieldset id="fs_members_list" class="field_container">
            <legend> Your offers </legend>
            <div id="list_container">
                <?php
                include "../model/config.php";
                $pdo = connect();

                include('../controler/show_all_tickets.php');
                ?>
            </div><!-- list_container -->
        </fieldset>

    </div><!-- content -->

</div><!-- container -->
</body>
</html>
