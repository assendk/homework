<?php
if(session_status() == PHP_SESSION_NONE) {
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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include "menu.php"; ?>
<h1>Admin</h1>

<form action="../controler/reset_tables.php" method="post">
    <input type="submit" name="clear_tables" id="" value="clear tables">
</form>

</body>
</html>
