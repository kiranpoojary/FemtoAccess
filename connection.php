<?php 
/**
* @author     Kiran
* @mailID     kiranpoojary483@gmail.com / kiran.kiran@nokia.com
* @datetime   04 Apr 2020 10:38:36
* @purpose    Database Connectivity File
* @input      -------
* @output     -------
*/
error_reporting(0);

function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

	
	$host='localhost';
	$username='root';
	$pass='';
	$db='femtoaccess';

	$con=mysqli_connect($host,$username,$pass,$db);

	if(!$con)
		{
			function_alert("Database Server Currently Unavailable");
			

		}

 ?>
