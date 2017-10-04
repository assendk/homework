<?php

$name_entered= $_POST['name'];
$city_entered= $_POST['city'];
$country_entered= $_POST['country'];

//$user = "user";
//$password = "password";
//$host = "host";
//$dbase = "database";
//$table = "table";
$user = "root";
$password = "";
$host = "127.0.0.1";
$dbase = "adk";
$table = "ajax_example";


$connection= mysql_connect ($host, $user, $password);
if (!$connection)
{
    die ('Could not connect:' . mysql_error());
}
mysql_select_db($dbase, $connection);



if ((!empty($name_entered)) && (!empty($city_entered)) && (!empty($country_entered)))
{
    mysql_query("INSERT INTO $table (name, city, country)
VALUES ('$name_entered', '$city_entered', '$country_entered')");
}

//code to display the MySQL Table
$result= mysql_query( "SELECT name, city, country FROM $table ORDER BY ID" )
or die("SELECT Error: ".mysql_error());

print "<table border=1>\n";
while ($row = mysql_fetch_array($result)){
    $name_field= $row['name'];
    $city_field= $row['city'];
    $country_field= $row['country'];
    print "<tr>\n";
    print "\t<td>\n";
    echo "$name_field";
    print "</td>\n";
    print "\t<td>\n";
    echo "$city_field";
    print "</td>\n";
    print "\t<td>\n";
    echo "$country_field";
    print "</td>\n";
    print "</tr>\n";
}
print "</table>\n";

?>