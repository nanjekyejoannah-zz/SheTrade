<?php 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
#$password="19Patrick04Allan19Wabwire88Jr"; // Mysql password 
$password=""; // Mysql password 
$db_name="animal_minute";//databasename
//$conn = mysql_connect("localhost", "root", "");
$conn = mysql_connect("$host", "$username", "$password")or die("Failed to Connect to Server"); 
mysql_select_db("$db_name")or die("Failed to Select Database");
?>