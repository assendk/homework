<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 10.9.2017 г.
 * Time: 17:41 ч.
 */
$city = "";
//json_decode("http://api.openweathermap.org/data/2.5/weather?q=Sofia,bg&APPID=6ef8f01f184e686bc49a14ff67ffacfa");
if (isset($_POST["submit"])) {
    $city = $_POST["cityname"];
}
$data = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=$city,bg&APPID=6ef8f01f184e686bc49a14ff67ffacfa");
$data = json_decode($data, true);

function k_to_c($temp) {
    if ( !is_numeric($temp) ) { return false; }
    return round(($temp - 273.15));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Form</h1>
<?php //var_dump($data);
?>
<form action="" method="post">
    <input type="text" name="cityname">
    <input type="submit" name="submit">
</form>
<div>
    <?php
    $w_icon = $data["weather"][0]["icon"];
    echo "<h1>City: " . $data["name"] . "<img src=\"http://openweathermap.org/img/w/$w_icon.png\" alt=\"\"> </h1>";
    echo "<h3>weather: " . $data["weather"][0]["description"] . "</h3>";
    $city_temp = k_to_c($data["main"]["temp"]);

    //echo "<img src=\"http://openweathermap.org/img/w/$w_icon.png\" alt=\"\">";
    echo "<p>temperature: $city_temp<sup>o</sup>C</p>";
    //var_dump($data["main"]["temp"]);
    //var_dump($data["weather"][0]["main"]);
    ?>

</div>
</body>
</html>
