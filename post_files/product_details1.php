<?php
require('sessions.php');
require('config.php');
$ad=$_GET['ad'];
	
	//$subname=$_GET['subname'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
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
   
    </style>
  </head>
<body>

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
<div class="span9">
    	
	<div class="row">	  
			<div id="gallery" class="span3">
				<?php 
				$query="SELECT catid FROM ad  WHERE ad_id ='$ad'";
			   $result=mysql_query($query);
			   $row=mysql_fetch_array($result);
			   $cat=$row['catid'];
			   if($cat==1){
				   $query="SELECT * FROM (ad natural join books) WHERE ad_id ='$ad'";
				   $result=mysql_query($query);
				$row=mysql_fetch_array($result);
				$tite=$row['title'];
				$author=$row['author'];
				$publisher=$row['publisher'];
			   }
			   else
		{$query="SELECT * FROM (ad natural join general) WHERE ad_id ='$ad'";
		$result=mysql_query($query);
				$row=mysql_fetch_array($result);
				$brand=$row['brand'];
		}
					
					$ad_t=$row['ad_title'];
					$price=$row['price'];
					$time=$row['time_used'];
					$ad_id=$row['ad_id'];
					$des=$row['description'];

            echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" />'; 
            ?>
			</div>
			<div class="span6">
               <?php

			   
				
					echo "<h3>".$ad_t."</h3>";
					 echo "<hr class='soft'/>";
					if($cat==1){
						 echo " <p>Title : ".$tite."</p>";
						  echo " <p>Author : ".$author."</p>"; 
						  echo " <p>Publisher : ".$publisher."</p>";
					}
					else
					 echo " <p>Brand : ".$brand."</p>";
					
					
			
				 
				
				  echo "<p>".$time. " months used </p>";
				   echo " <p>Price : ".$price."</p>";
				  
				
				            ?>
				
				
				
				
				
				<hr class="soft"/>
				
				
                <h4>Product Description</h4>
				<?php echo "<p>".$des. "</p>"
				?>
				
				<br class="clr"/>
			
			<hr class="soft"/>
			</div>
			
			<div class="span9">
            
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
              <?php
			  $query="select * from user,ad where user.uid=ad.s_id and ad_id='$ad'";
			  $result=mysql_query($query);
				$row=mysql_fetch_array($result);
				$fname=$row['f_name'];
					$lname=$row['l_name'];
					$room=$row['room_no'];
					$hostel=$row['hostel'];
					$email=$row['email'];
					$contact=$row['contact'];
					
			  ?>
			  <h4>Seller Information</h4>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Seller Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Seller name: </td><td class="techSpecTD2"><?php echo ""."$fname"." "."$lname" ;?></td></tr>
                <tr class="techSpecRow"><td class="techSpecTD1">email: </td><td class="techSpecTD2"><?php echo "$email" ;?></td></tr>
				
				<tr class="techSpecRow"><td class="techSpecTD1">contact number:</td><td class="techSpecTD2"> <?php echo "$contact"?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Room number:</td><td class="techSpecTD2"> 
                <?php echo "$room"?>
                </td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Hostel:</td><td class="techSpecTD2"><?php echo "$hostel"?></td></tr>
				</tbody>
				</table>
				
				

				
              </div>
</div>
          </div>

	</div>
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
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
</body>
</html>