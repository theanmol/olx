
<?php
require('config.php');
session_start();

$adid=$_POST['adid'];


if (isset($_POST['c_adt'])){
$a=$_POST['ad_t'];
$query="UPDATE ad set ad_title = '$a' where ad_id='$adid'";
mysql_query($query);
}

if (isset($_POST['c_ttl'])){
$a=$_POST['tite'];

$query="UPDATE books set title = '$a' where ad_id='$adid'";
mysql_query($query);
}

if (isset($_POST['c_ath'])){
$a=$_POST['author'];

$query="UPDATE books set author = '$a' where ad_id='$adid'";
mysql_query($query);
}

if (isset($_POST['c_pub'])){
$a=$_POST['publisher'];

$query="UPDATE books set publisher = '$a' where ad_id='$adid'";
mysql_query($query);
}


if (isset($_POST['c_brn'])){
$a=$_POST['branch'];

$query="UPDATE books set branch = '$a' where ad_id='$adid'";
mysql_query($query);
}


if (isset($_POST['c_brnd'])){
$a=$_POST['brand'];

$query="UPDATE general set brand = '$a' where ad_id='$adid'";
mysql_query($query);
}

if (isset($_POST['c_prc'])){
$a=$_POST['price'];

$query="UPDATE ad set price = '$a' where ad_id='$adid'";
mysql_query($query);
}

if (isset($_POST['c_tu'])){
$a=$_POST['time'];

$query="UPDATE ad set time_used = '$a' where ad_id='$adid'";
mysql_query($query);
}

if (isset($_POST['c_desc'])){
$a=$_POST['desc'];

$query="UPDATE ad set description = '$a' where ad_id='$adid'";
mysql_query($query);
}


$a=$_POST['stat'];

$query="UPDATE ad set status = '$a' where ad_id='$adid'";
mysql_query($query);

header("location:myads.php");
?>
