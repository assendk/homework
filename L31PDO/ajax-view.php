<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 30.9.2017 г.
 * Time: 01:01 ч.
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>

        function insertUserData() {

            var request;

            try {

                request = new XMLHttpRequest();

            }

            catch (tryMicrosoft) {

                try {

                    request = new ActiveXObject("Msxml2.XMLHTTP");
                }

                catch (otherMicrosoft) {
                    try {
                        request = new ActiveXObject("Microsoft.XMLHTTP");
                    }

                    catch (failed) {
                        request = null;
                    }
                }
            }


            var url = "insert.php";
            var person_name = document.getElementById("name_entered").value;
            var person_city = document.getElementById("city_entered").value;
            var person_country = document.getElementById("country_entered").value;
            var vars = "name=" + person_name + "&city=" + person_city + "&country=" + person_country;
            request.open("POST", url, true);

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var return_data = request.responseText;
                    document.getElementById("showtable").innerHTML = return_data;
                }
            }

            request.send(vars);
        }
    </script>
</head>
<body>

Enter Your Name
<input type= "text" id="name_entered" name="name_entered"/><br><br>

Enter Your City
<input  type= "text" id="city_entered" name="city_entered"/><br><br>


Enter Your Country
<input  type= "text" id="country_entered" name="country_entered" onblur="insertUserData()"/><br><br>


<div id="showtable"></div>
<br><br>
</body>
</html>
