<?php
$array = ["note01" => array("2017-09","proben text"), "note02" => "proben2 text2", "orange" => "test3"];
/*
unset( $array[array_search( "note02", $array )] );
var_dump($array);
$del_val = "note02";
if ($key = array_search($del_val, $array) !== false) {
    unset($array[$key]);
}
var_dump($array);
*/
$note_val = "";
if(isset($_POST["submit"])) {
    $note_val = $_POST["submit"];
}
$value_remove = [];
$value_remove = ["$note_val" => ""];
var_dump($value_remove);
echo "<br>";

$result = array_diff_key($array, $value_remove);
//var_dump($result);

$array = $result;
print_r($array);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">ch
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    echo "<form method=\"post\">";
    foreach ($array as $key => $item) {
        echo "<ul class=\"list\">";
        echo "<li>" .$key  . "<br>" . "<input type=\"submit\" name=\"submit\" value=\"$key\">" . "</li>";
        echo "</ul>";

    }
    echo "</form>";
?>
</body>
</html>

