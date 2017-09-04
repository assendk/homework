<?php
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
print_r($a1);
$a2=array("a"=>"purple");
//$a2=array("a"=>"purple","b"=>"orange");
//array_splice($a1,0,2,$a2);
//array_splice($a1,0,2, "a"=>"mazalo");
print_r($a1);

$pos = array_search("green", $a1); // $key = 2;

echo "found on" . $pos;
var_dump($find);

array_splice($a1,$find,1, "green2me");

$my_array = array('sheldon', 'leonard', 'howard', 'penny');
$to_remove = array('howard');
$result = array_diff($my_array, $to_remove);