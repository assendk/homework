<?php
session_start();
session_destroy();
setcookie("err", "", time() - 3600);
header("Location: ../index.php");