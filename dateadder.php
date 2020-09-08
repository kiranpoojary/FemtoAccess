<?php
/**
* @author     Kiran
* @mailID     kiranpoojary483@gmail.com / kiran.kiran@nokia.com
* @datetime   04 Apr 2020 10:38:36
* @purpose    -------
* @input      -------
* @output     -------
*/

session_start();
$bookdate=$_GET["dateSelected"];
$_SESSION["selectedD"]=$bookdate;
$_SESSION["reLoad"]=false;
header("refresh:1; url=bookfemto.php");

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body >
	<div style="padding-top: 100px">
<center>
	
<h2>LOADING SLOTS</h2>

<div class="loader"></div>
</center>
</div>
</body>
</html>
