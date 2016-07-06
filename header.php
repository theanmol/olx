<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <script type="text/javascript">
			function check(){
				username=document.getElementById('uname').value;
				lname=document.getElementById('lname').value;
				email=document.getElementById('email').value;
				
				password=document.getElementById('pwd').value;
				cpass=document.getElementById('cpwd').value;
				room=document.getElementById('room_no').value;
				hostel=document.getElementById('hostel').value;
				if(username=="" || lname=="" || password=="" || email=="" || cpass=="" || room=="" || hostel=="")

				{
					alert("all fields are required");
					return false;
				}
				 /* if(password!=cpass)
				{
					alert("password mismatch");
					return false;
				}*/
				else
					return true;
			}

			

</script>
   
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
	<div class="span6">Welcome!<strong> User</strong></div>
	
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="themes/images/logo1.png" alt="Bootsshop"/></a>
		
		<form class="form-inline navbar-search" method="post" action="search.php" >
		  <input name="string" id="srchFld2" class="srchTxt" type="text" />
		  <select name="select" class="srchTxt">
		    <option value ="all">all</option>
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
		  <button type="submit" id="submitButton2" class="btn btn-primary">Go</button>
	    </form>
    <ul id="topMenu" class="nav pull-right">
    
	 <li class="">
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" method="post" action="login.php">
			  <div class="control-group">								
				<input type="text" id="uname"  name="uname" placeholder="Email">
			  </div>
			  <div class="control-group">
				<input type="password" id="password" name="password" placeholder="Password">
			  </div>
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>
					
			<button type="submit" class="btn btn-success">Sign in</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </form>
		  </div>
	</div>
	</li>
    <li class="">
	 <a href="#signup" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">signup</span></a>
	<div id="signup" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Signup</h3>
		  </div>
		  <div class="modal-body">
			
			  <form  class="form-horizontal" role="form"  method="post"  action="signup.php"  >
 <div class="control-group">
    
      <input type="text" class="form-control"name="uname" id="uname" placeholder="Enter first name">
    </div>
  
  <div class="control-group">
    
    
      <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter last name">
  
  </div>
  <div class="control-group">
    
    
      <input type="email" class="form-control" name="email"id="email" placeholder="Enter email">
  
  </div>
  <div class="control-group">
    
      <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password">
    
  </div>
  <div class="control-group">
    
      <input type="tel" class="form-control" id="cpwd"  name="cpwd" placeholder="contact number">
    
  </div>
<div class="control-group">
    
      <input type="text" class="form-control"name="room_no" id="room_no" placeholder="Enter Room Number">
    
  </div>
  <div class="control-group">
    
      <input type="text" class="form-control"name="hostel" id="hostel" placeholder="Enter hostel">
    </div>
  <div class="control-group">
    
     <button type="reset" class="btn btn-primary" > reset </button> <button type="submit" class="btn btn-primary">Signup</button> <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>
    
  </div>
  
</form>
					
			
		  </div>
	</div>
	</li>
  </ul>
  </div>
</div>
</div>
</div>
</body>
</html>