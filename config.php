<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="retail"; // Database name 

mysql_connect($host, $username, $password)or die("cannot connect to server"); 
mysql_select_db($db_name)or die("cannot select DB");



?>
