<?php
//session_start(); 
require('config.php');

?>
<html>

	<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>

<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> <?php
//session_start();
if(isset($_SESSION["username"]))
{
	
	echo $_SESSION["username"];
	}

?></strong></div>
	
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="themes/images/logo1.png" alt="Sellersstop"/></a>
		<form class="form-inline navbar-search" method="post" action="search.php" >
		<input name="string" id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt" name="select">
          <option value="all">all</option>
			<?php				
				$query="SELECT * FROM category";
				$result=mysql_query($query);
				while($row=mysql_fetch_array($result))
				{
					$a=$row["cat_name"];
					echo "<option value='$a'>".$row["cat_name"]."</option>";

				}				
			?>
			</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 
	 
	 
<li class="">
	 <a href="#post" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Post Ad</span></a>
	<div id="post" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="post" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Choose a Category</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" method="get" action="post1.php">
			  <select class="srchTxt" name="cat">
          
			<?php				
				$query="SELECT * FROM category";
				$result=mysql_query($query);
				while($row=mysql_fetch_array($result))
				{
					$a=$row["cat_name"];
					echo "<option value='$a'>".$row["cat_name"]."</option>";

				}				
			?>
			</select>
			  
					
			<button type="submit" class="btn btn-success">Continue</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </form>
		  </div>
	</div>
	</li>
	
    
    <li class=""><a href="myads.php">My Ads</a></li>
    <li class=""><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</div>
</div>
</div>



</html>
