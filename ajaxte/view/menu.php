<?php
?>
<div id="menu" style="display: block">
    <div id="menu-list">
        <ul>
            <li><a href="main.php">My page</a></li>
            <li><a href="all-offers.php">All</a></li>
            <li><a href="login.php">LoginK</a></li>
            <li><a href="register.php">RegisterK</a></li>
            <li><a href="add-ticket.php">add ticket</a></li>
            <li>|</li>
            <!-- <li><a href="login2.php">Login 2</a></li>
            <li><a href="registration.php">Register</a></li> -->
            <li><a href="admin.php">Admin</a></li>
        </ul>
    </div>
    <div id="logouta">
        <form action="../controler/logout_controller.php" method="post">
            <input type="submit" value="Logout" name="logout_submit">
        </form>
    </div>
    <div class="ses-username" style="color: #fcff0b">
        <?php
        if (!isset($_SESSION['username']) || $_SESSION['username'] == '') {
            echo "not loged in";
        } else {
            $uid = $_SESSION['username'];
            echo $uid;
        }
        ?>
    </div>
</div>
