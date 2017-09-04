<?php
session_start();
require_once "config.php";
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 3.9.2017 г.
 * Time: 20:07 ч.
 */
$users_list = file_get_contents($userDB, true);