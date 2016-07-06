
<?php
$a = $_POST['uname'];
$l = $_POST['lname'];
$c = $_POST['pwd'];
$e = $_POST['email'];
$r=$_POST['room_no'];
$h=$_POST['hostel'];
$g=$_POST['cpwd'];
if ($a=="" || $c==""  || $e=="" || $r=="" || $h=="" || $g=="" || $l=="")
echo "All Fields Are Mandatory";
else
{
require('config.php');                                     
$query="INSERT INTO user(f_name,l_name,email,password,room_no,hostel,contact) VALUES('$a','$l','$e','$c','$r','$h','$g')";

$result=mysql_query($query);

header('location:aftersign.php');
}
if(!$result)
{
echo " query error" ;
echo " $query ";
}
?>