<!doctype html>

  
  <?php
session_start();
$_SESSION['catid']=4; // You can set the value however you like.
?>


<html>
<head>
<meta charset="utf-8">
<title>AdSubmit</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.js"></script>
  
  <script>
  function func1(){
    var variable=document.getElementById("shi");
    variable.style.backgroundColor="white";
    variable.style.color="blue";
    }
  function func2(){
    var variable=document.getElementById("shi");
    variable.style.backgroundColor="blue";
    variable.style.color="white";
    }
  </script>
  
  </head>
  
<body>

<div class="container col-md-8 col-md-offset-2" style="margin-bottom:50px;">
<!--<h1 ><a href="dashboard.php">KHAREEDLO</a></h1>-->

<form action="successAd_2.php" method="post" id="form" class="form-horizontal" enctype="multipart/form-data">

<h1 style=" color:black; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;">Submit a Free Classified Ad:</h1>

   <div class="col-md-10" style="border: 1px groove grey; padding:20px; border-radius:10px;">


    <!-- <label class="control-label col-md-2"  style="text-align:left">Sub-Category*:</label>
   <div class="form-group col-md-10">
   <select class="form-control input-group-sm" name="subcategory">
      <option value="mobile">mobile
      </option>
      <option value="automobile"> automobile
      </option>
      <option value="Others">Others
      </option>
      </select>
  </div>  -->

  
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


$sql=mysql_query("SELECT * FROM subcat where catid='4'"); 
?>

<label class="control-label col-md-2" style="text-align:left" >Sub Category *:</label>
<select name="SubCategory"  class="form-control input-group-sm">
<?php
while ($row = mysql_fetch_array($sql)){
  $input = $row['sub_name'];
  //$id = $row['id'];
?>
<option  id="id" value="<?php echo $input; ?>"  >
  <?php 
echo $input; 
?>
</option>; 
<?php
}
?>
 </select>

   
   <br>
   <label class="control-label col-md-2" style="text-align:left" >Add Title*:</label>
  <div class="form-group col-md-10"> 
  <input type="text" class="form-control" name="Title" id="Title" required autofocus autocomplete="on" maxlength="100">
   </div>
   
   
   <label class="control-label col-md-2"  style="text-align:left">Ad Description*:</label>
   <div class="form-group col-md-10">
   <textarea rows="3" cols="50" class="form-control" name="Description" id="Description" required autofocus autocomplete="on"  maxlength="200">
   </textarea>
   </div>
   
   
  
  
  
  <label class="control-label col-md-2"  style="text-align:left">Price*:</label>
   <div class="form-group col-md-10">
   <input type="text" class="form-control" name="price" placeholder="Enter Estimated &#8377;" required>
   </div>
  
   <div class="row col-md-offset-0" >
  <label class="control-label col-md-2"  style="text-align:left">Upload Photo*:</label>
   <div class=" col-md-4">
   
   <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
   <input type="file" name="photo" />    
   </div>
   
   <br>
   <!--<div class=" col-md-4" >
   
   <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
   <input type="file" name="photo2" />    
   
   </div> -->
   </div>
     <label class="control-label col-md-2"  style="text-align:left">Months Used*:</label>
   <div class="form-group col-md-10">
   <input type="text"  class="form-control" name="months_used" placeholder="use time" required maxlength="100">
   
   </div>
   
    <label class="control-label col-md-2"  style="text-align:left">Post Date*:</label>
   <div class="form-group col-md-10">
   <input type="date"  class="form-control" name="post_date" placeholder="Enter date" required maxlength="8">
   
   </div>
   
   <label class="control-label col-md-2"  style="text-align:left">Status*:</label>
   <div class="form-group col-md-10">
    <select class="form-control input-group-sm" name="Status">
      <option value="available">available
      </option>
      <option value="sold">sold
      </option>
    </select>
   </div>
  <!--  <label class="control-label col-md-2"  style="text-align:left">Flag*:</label>
   <div class="form-group col-md-10">
   <select class="form-control input-group-sm" name="Status">
      <option value="Approved">Approved
      </option>
      <option value="Not-Approved">Not-approved
      </option>
    </select>
   
   </div> -->
   <label class="control-label col-md-2"  style="text-align:left">brand*:</label>
   <div class="form-group col-md-10">
   <input type="text"  class="form-control" name="brand" placeholder="Enter brand" required maxlength="20">

   
   
   
   <div class="form-group" align="center" style="text-align:center" >
   <input type="submit" style="color:white; background-color:blue; height:36px; width:100px;" value="Submit">
   </div>
   </div>
   
   </form>
   </div> 
</body>
</html>
