<?php
//session_start();
require('sessions.php');
require('config.php');

?>

<html>
<head>
	<meta charset="utf-8">
<title>Seller's Stop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.js"></script>
  
  <script>
  </script>
</head>
<body>






<?php



$value1 =$_POST['Title'];
$value2 =$_POST['catid'];
$value3 =$_POST['Description'];
$value4 =$_POST['price'];
$value5 =$_POST['months_used'];



$sellerID=$_SESSION["userid"];




//$author=$_POST['author'];
//$publisher=$_POST['publisher'];
//$title=$_POST['title'];
//$branch=$_POST['branch'];

$fileName = $_FILES['photo']['name'];
$tmpName  = $_FILES['photo']['tmp_name'];
$fp      = fopen($tmpName, 'rb');
$content1 = fread($fp, filesize($tmpName));
$content1 = addslashes($content1);
fclose($fp);

//echo "$value1";
//echo "$value2";echo "$value3";echo "$value4";echo "$value5";echo "$sellerID";

$timestamp=date('Y-m-d');

 $sql="INSERT INTO ad(ad_title,image,description,price,time_used,s_id,catid,post_date) values ('$value1','$content1','$value3','$value4','$value5','$sellerID','$value2','$timestamp')";
 mysql_query($sql) or die(mysql_error());
$my="select * from ad where ad_title='$value1'";
$abc=mysql_query($my);
//echo $my;
while ($row = mysql_fetch_array($abc)){
  $input1 = $row['ad_id'];
 // echo $input;
}
 
$x=$_POST['SubCategory'];
//echo $x;
if($value2!=1){
$brand=$_POST['brand'];
$my="select * from subcat where sub_name='$x'";
$abc=mysql_query($my);
while ($row = mysql_fetch_array($abc)){
  $input2 = $row['subid'];
 // echo $input;
}
$sql1= "INSERT INTO `general` VALUES ('$brand','$input1','$input2')";
}
else
{
  $author=$_POST['author'];
  $title=$_POST['book'];
  $publisher=$_POST['publisher'];
  $branch=$_POST['branch'];
  $sql1= "INSERT INTO `books` VALUES ('$input1','$author','$title','$publisher','$branch')";
}
//echo $my;

 // echo $input;




mysql_query($sql1);

//echo $sql1;
?>


<style type="text/css">

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
<center>
<h1 style=" color:black; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;">Your AD has been posted successfully</h1>
<br>

<button value="submit"  class="button"  onClick="func3();" style="vertical-align:middle"><span>Home</span>
  </button>
</center>



  <script type="text/javascript">
function func3()
{

  
    window.location="index.php" ;

}
</script>

</body>


</html>
