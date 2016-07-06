<?php
require('config.php');
$ad=$_GET['ad'];
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
            
echo"<form id='form1'><label>title</label>";

echo "<input type='disabled' value='".$ad_t."'>";

echo "<label>
price
</label>";

echo "<input type='disabled' value='".$price."'>";
echo "<label>time used:  </label>";

echo "<input type='text' id='rel' disabled='disabled' value='".$time."'>";
echo "<input name='c_rel' type='checkbox' id='c_rel'
value='y' onClick='form1.rel.disabled =!this.checked;' />";
echo"<label>
Description
</label>";

echo "<input type='disabled' value='".$des."'>";
echo "</form>";
?>