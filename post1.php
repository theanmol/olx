<?php
require('sessions.php');
require('config.php');
$catname=$_GET['cat'];
?>
<!doctype html>
<html>
<head>
    <head>
<meta charset="utf-8">
<title>Seller's Stop</title>
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

<form action="successAdmy.php" method="post" id="form" class="form-horizontal" enctype="multipart/form-data">

<h1 style=" color:black; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;">Submit a Free Classified Ad:</h1>

   <div class="col-md-10" style="border: 1px groove grey; padding:20px; border-radius:10px;">


    
  
 
  
  <?php

$query="select * from subcat where catid in(select catid from category where cat_name='$catname' )";
		
$sql=mysql_query($query); 
 $query="select catid from category where cat_name='$catname'";
			   $result=mysql_query($query);
			   $row=mysql_fetch_array($result);
			   $cat=$row['catid'];
?>

<label class="control-label col-md-2" style="text-align:left" >Sub Category *:</label>
<select name="SubCategory"  class="form-control input-group-sm">
<?php
while ($row = mysql_fetch_array($sql)){
  $input = $row['sub_name'];
  
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

   
   <br>  <div class="form-group col-md-10" style="display:none" > 
  
  <?php
 echo " <input type='disabled' class='form-control' name='catid' id='catid' value=".$cat.">";
   ?>
   </div>
   <label class="control-label col-md-2" style="text-align:left" >Ad Title*:</label>
  <div class="form-group col-md-10"> 
  <input type="text" class="form-control" name="Title" id="Title" required autofocus autocomplete="on" maxlength="100">
   </div>
   
<?php 
if($cat!=1){
   echo "<label class='control-label col-md-2'  style='text-align:left'>brand*:</label>
   <div class='form-group col-md-10'>
   <input type='text'  class='form-control' name='brand' placeholder='Enter brand' required maxlength='100'>
</div>";
}
else{
echo "<label class='control-label col-md-2'  style='text-align:left'>author*:</label>
   <div class='form-group col-md-10'>
   <input type='text'  class='form-control' name='author' placeholder='Enter author' required maxlength='100'>
</div>";

echo "<label class='control-label col-md-2'  style='text-align:left'>book title*:</label>
   <div class='form-group col-md-10'>
   <input type='text'  class='form-control' name='book' placeholder='Enter book title' required maxlength='100'>
</div>";

echo "<label class='control-label col-md-2'  style='text-align:left'>publisher*:</label>
   <div class='form-group col-md-10'>
   <input type='text'  class='form-control' name='publisher' placeholder='Enter publisher' required maxlength='100'>
</div>";


echo "<label class='control-label col-md-2'  style='text-align:left'>branch/subject*:</label>
   <div class='form-group col-md-10'>
   <input type='text'  class='form-control' name='branch' placeholder='Enter publisher'  maxlength='100'>
</div>";
}


 ?>
   
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
  
   </div>
     <label class="control-label col-md-2"  style="text-align:left">Months Used*:</label>
   <div class="form-group col-md-10">
   <input type="text"  class="form-control" name="months_used" placeholder="use time" required maxlength="100">
   
   </div>
   
    
   
  
 
   
   
   
   
   <div class="form-group" align="center" style="text-align:center" >
   <input type="submit" style="color:white; background-color:blue; height:36px; width:100px;" value="Submit">
   </div>
   </div>
   
   </form>
   </div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop2.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
</body>
</html>
