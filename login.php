<?php

	session_start();
	$email=$_POST['uname'];
	$pass=$_POST['password'];
	if ($email==""|| $pass=="")
	{
		echo " bevkpooof !!!!!";

		
	}
	else
	{
		require('config.php');
		echo $email;
		echo $password;
		$query="SELECT * FROM user WHERE (email='$email') and (password='$pass')";
		$result=mysql_query($query);
		
		echo "<br>";
		
		
		
			$row=mysql_fetch_array($result);
			echo $row["email"];
               if(!($row==0))
               {
               	$_SESSION["username"]=$row['f_name'];
				$_SESSION["userid"]=$row['uid'];
               	if(isset($_POST['rem']))
                {
                	setcookie("username",$email,time()+3600);
                }
                header("location:home.php");

               }
               else
               {
               	echo "Invalid username or password";
               }
 
           			
			
			}
		
		
	


?>