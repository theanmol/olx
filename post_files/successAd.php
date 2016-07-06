<html>
<head>
	<meta charset="utf-8">
<title>successad</title>
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

define('DB_NAME', 'retail2');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', '127.0.0.1');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if(!$link){
	die('could not connect :' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link);

if(!$db_selected){
	die('cant use :' . DB_NAME . ':' . mysql_error());
}
//echo 'connected successfully';

$value1 =$_POST['Title'];
//$value2 =$_POST['photo'];
$value3 =$_POST['Description'];
$value4 =$_POST['price'];
$value5 =$_POST['months_used'];
$value7 =$_POST['post_date'];
$value6 =$_POST['Status'];

$author=$_POST['author'];
$publisher=$_POST['publisher'];
$title=$_POST['title'];
$branch=$_POST['branch'];

$fileName = $_FILES['photo']['name'];
$tmpName  = $_FILES['photo']['tmp_name'];
$fp      = fopen($tmpName, 'rb');
$content1 = fread($fp, filesize($tmpName));
$content1 = addslashes($content1);
fclose($fp);



$sql= "INSERT INTO `ad`(`ad_title`,`image`,`description`, `price`, `time_used`, `status`, `s_id`,`catid`) VALUES ('$value1','$content1','$value3','$value4','$value5','$value6','1','1')";

//$sql = "insert into ad(ad_title,description,price,time_used,status) values ('$value1','$value3','$value4','$value5','$value6')";
mysql_query($sql);
$my="select * from ad where ad_title='$value1'";
$abc=mysql_query($my);
//echo $my;
while ($row = mysql_fetch_array($abc)){
  $input = $row['ad_id'];
 // echo $input;
}
  
  

$sql1= "INSERT INTO `books` VALUES ('$input','$author','$publisher','$title','$branch')";
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

  
    window.location="http://127.0.0.1/www/index.php" ;

}
</script>

</body>


</html>


