<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Seller's Stop</title>
</head>

<body>
<?php
require('config.php');
require('sessions.php');


?>
<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.html"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
        <?php				
				$query="SELECT * FROM category";
				$result=mysql_query($query);
				while($row=mysql_fetch_array($result))
				{	$a=$row["cat_name"];
					
					echo "<li class='subMenu'><a>".$row["cat_name"]."</a>";
					echo "<ul style='display:none' >";
					$query2="select sub_name from subcat where catid in (select catid from category where cat_name='$a')";
				$result2=mysql_query($query2);
				while($row2=mysql_fetch_array($result2))
				{
					
				echo "<li><a href='products.html'><i class='icon-chevron-right'></i>".$row2["sub_name"]. "</a></li>";
				}
				echo "</ul></li>";
				}				
			?>
			
		</ul>
		<br/>
		
		
	</div>
</body>
</html>