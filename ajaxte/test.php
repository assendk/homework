<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 2.10.2017 г.
 * Time: 01:07 ч.
 */
$pass = "pasword123";
$enc_pass = sha1($pass);
echo $enc_pass;