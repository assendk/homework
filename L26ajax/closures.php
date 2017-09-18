<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 12.9.2017 г.
 * Time: 11:18 ч.
 */

/**
 * @param $a number over or under 10 to check
 * @return string
 */
$myAnon = function ($a) {
    if ($a <10) {
        return "Po malko ot 10";
    }
    else {
        return "Po-goliamo ot 10";
    }

};

function myComplex($a, $action) {

}

echo $myAnon(-10);
