<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 29.9.2017 г.
 * Time: 16:00 ч.
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
        //JSON is a String
        var jsonString= "{
            "employees": [
                { "&rstName":"John" , "lastName":"Doe" },
                { "&rstName":"Anna" , "lastName":"Smith" },
                { "&rstName":"Peter" , "lastName":"Jones" }
            ]
        }";
        var objects = JSON.parse(sjonString);
    </script>
</head>
<body>

</body>
</html>
