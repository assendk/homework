<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 7.10.2017 г.
 * Time: 23:37 ч.
 */
$uid = "";
?>
<div id="menu">
    <ul>
        <li><a href="member.php">Main</a></li>
        <li><a href="info.php">Info</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li> | </li>
        <li>
            <form action="../controler/logout_ctrl.php" method="post">
                <input type="submit" name="logout" value="Logout">
            </form></li>
        <li>
            <?php
            if (!isset($_SESSION['username']) || $_SESSION['username'] == '') {
                echo "not loged in";
            } else {
                $uid = $_SESSION['username'];
                echo $uid;
            }
            ?>
        </li>
        <li>
            <?php if ($uid == "admin"){
            echo "<a href=\"admin.php\">::Admin</a>";
            }
            ?>
        </li>
    </ul>
</div>
