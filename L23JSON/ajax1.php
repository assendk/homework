<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 10.9.2017 г.
 * Time: 23:59 ч.
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajax 1st steps</title>

    <script>
        function loadDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("demo").innerHTML =
                        this.responseText;
                }
            };
            xhttp.open("GET", "ajax_info.txt", true);
            xhttp.send();
        }
        function showWeather() {
            var xhttp;
            xhttp=new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.status == 200) {

                    //document.getElementById("temperature").innerHTML = this.responseText;
                    var myResult = JSON.parse(this.responseText);
                    document.getElementById("temperature").innerHTML = myResult.name + " " + myResult.main.temp;
                    document.getElementById("wmain").innerHTML = myResult.weather.main;
                    document.getElementById("temperature").innerHTML = myResult.wind.speed;

                }
            };
            var myVal = document.getElementById("citito").value;
            xhttp.open("GET", "http://api.openweathermap.org/data/2.5/weather?q="+myVal+",bg&APPID=6ef8f01f184e686bc49a14ff67ffacfa", true);
            xhttp.send();


            
        }
    </script>
</head>
<body>
<input type="text" id="citito" name="citito" required>
<input type="submit" name="submit" value="search" onclick="showWeather()">
<div id="temperature">
<div id="wmain"></div>
</div>
</body>
</html>
