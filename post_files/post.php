<?php
require('sessions.php');
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
  </script>
</head>
<body>

<center>
<h1 style=" color:black; font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;">Select Your Category for posting the AD</h1>

</center>
<script type="text/javascript">
function func1()
{

  
    window.location="http://127.0.0.1/www/submitAd.php" ;

}


function func2()
{

  window.location="http://127.0.0.1/www/submitAd_2.php";

}
function func3()
{

  window.location="http://127.0.0.1/www/submitAd_3.php";

}
function func4()
{

  window.location="http://127.0.0.1/www/submitAd_4.php";

}
</script>
<br>
<br>
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
  <br>
  <a href="submitAd.php">
<button value="submit"  class="button" style="vertical-align:middle"><span>books</span>
  </button>
  </a>
  <br><br><br>
  <a href="submitAd_2.php">
<button value="submit"  class="button" style="vertical-align:middle"><span>electronics</span>
</button>
</a>
<br><br><br>
<a href="submitAd_3.php">
<button value="submit"  class="button"  style="vertical-align:middle"><span>automobile</span>
  </button>
  </a>
    <br><br><br>
    <a href="submitAd_4.php">

  <button value="submit"  class="button"  style="vertical-align:middle"><span>others</span>
  </button>
  </a>
  <br><br><br>
</center>
</body>


</html>
