<html>
<head>
	<title>Seller's Stop</title>
</head>
<div id="one-two">

<?php
require('config.php');
session_start();
if(isset($_SESSION["username"]))
{
	//echo "<font size='5' color='black'>";
	//echo "Welcome"." ".$_SESSION["username"];
	//echo "</font>";
	include('header2.php');
}
else
{
	//header("index.php");
	//echo "SORRY!!!!";
	include('header.php');
}
?>
</div>
</html>
