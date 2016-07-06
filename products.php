<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Seller's Stop</title>
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
	<style type="text/css" id="enject">
    .thumbnail img{ height:200px;}
    </style>
  </head>
<body>
<?php
require('sessions.php');
?>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.html"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
        <?php				
				$query="SELECT * FROM category";
				$result=mysql_query($query);
				while($row=mysql_fetch_array($result))
				{	$a=$row["cat_name"];
					$b=$row["catid"];
					echo "<li class='subMenu'><a href='product_cat.php?catname=$a'>".$row["cat_name"]."</a>";
					echo "<ul style='display:none' >";
					$query2="select * from subcat where catid in (select catid from category where cat_name='$a')";
				$result2=mysql_query($query2);
				while($row2=mysql_fetch_array($result2))
				{
				$d=$row2["subid"];	
				$c=$row2["sub_name"];	
				echo "<li><a href='products.php?catname=$a&subname=$c&subid=$d'><i class='icon-chevron-right'></i>".$row2["sub_name"]. "</a></li>";
				}
				echo "</ul></li>";
				}				
			?>
			
		</ul>
		<br/>
		
		
	</div>
<!-- Sidebar end=============================================== -->
<?php
	require('config.php');
	$catname=$_GET['catname'];
	
	$subname=$_GET['subname'];
	if($catname=="books" || $subname=="")
	{
		
	}
	
?>
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <?php echo "<li><a href='product_cat.php?catname=$catname'>"?><?php echo "$catname" ?></a><span class="divider">/</span></li>
		<li class="active"><?php echo "$subname" ?></li>
    </ul>
	<h3> <?php echo "$subname" ?> <small class="pull-right"> <?php
	 $subid=$_GET['subid'];
	
	$query="select count(*) as cnt from (general natural join ad)  where subid='$subid' and status='available'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	echo $row["cnt"]; ?>
     products are available
    </small></h3>	
	<hr class="soft"/>
	
	<hr class="soft"/>
	
	  
<div id="myTab" class="pull-right">

 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
        <?php
		$query="SELECT * FROM (ad NATURAL JOIN general )WHERE subid =  '$subid' and status='available'";
		$result=mysql_query($query);
				while($row=mysql_fetch_array($result)){
					
					$ad_t=$row['ad_title'];
					$price=$row['price'];
					$time=$row['time_used'];
					$ad_id=$row['ad_id'];
			echo "<li class='span3'>";
			 echo"<div class='thumbnail'>";
			echo "<a href='product_details.php?ad=$ad_id&subid=$subid'>";
			echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" />';
			echo "</a>";
			echo "<div class='caption'>";
				 echo "<h5>".$ad_t."</h5>";
				  echo "<p>".$time. " months used </p>";
				   echo "<h4 style='text-align:center'><a class='btn' href='product_details.php?ad=$ad_id&subid=$subid'> <i class='icon-zoom-in'></i></a> ";
				  /* <a class='btn' href='#'>Add to <i class='icon-shopping-cart'></i></a> */
				  echo "<a class='btn btn-primary' href='#'>".$price."</a></h4>
				</div>
			  </div>
			</li>";
				}
            ?>
		  </ul>
	<hr class="soft"/>
	</div>
</div>

	
	
			<br class="clr"/>
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop2.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
</body>
</html>
