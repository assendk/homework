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
    <title>Add tickets</title>
    <link rel="stylesheet" href="../css/style.css" />
    <script type="text/javascript" src="../js/tickets.js"></script>
    <script type="text/javascript" src="../js/script.jss"></script>
</head>
<body>
<div class="container">
    <?php include "menu.php" ?>
    <fieldset class="field_container">
        <legend> Add new ticket </legend>
        <form action="../controler/create_ticket.php" method="post" enctype="multipart/form-data">
            <input type="text" name="ticketxt"><br>
            <!--<input type="text" id="url" class="frm_input" placeholder="url"><br>
             <textarea rows="4" cols="50" name="comment" form="usrform" placeholder="Enter text here..."></textarea><br> -->
            Price: <input type="number" id="price" name="price" class="frm_input" min="0" placeholder="Price" required>$<br>
            <input type="file" name="image"><br>
            <input type="submit" name="submit" value="Add ticket">
        </form>
    </fieldset>
</div>
</body>
</html>
