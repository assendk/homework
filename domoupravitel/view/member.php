<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="container" class="container">
<?php include "menu.php"; ?>
<h1>Member area</h1>
<?php
if (isset($_SESSION['username'])) {
    echo $_SESSION['username'];
}
else {echo "not loged in";}
?>
    <div id="demo">
        <h2>Let AJAX change this text</h2>
        <button type="button" onclick="showAlla()">Change Content</button>
    </div>
<div>
    <?php
    include "../controler/info_show_members.php"
    ?>
</div>
    <div id="field_container">

    </div>
</div>
</body>
</html>
