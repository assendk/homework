<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 30.9.2017 г.
 * Time: 00:55 ч.
 */

$user = array();
$user["Pesho"] = [];
$user["Pesho"]["username"] = "maniaka";
$user["Pesho"]["password"] = "pas123";

$user["Gosho"] = [];
$user["Gosho"]["username"] = "majna";
$user["Gosho"]["password"] = "par123";



echo json_encode($user, JSON_UNESCAPED_SLASHES);
