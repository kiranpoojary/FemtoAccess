<?php
/**
* @author     Kiran
* @mailID     kiranpoojary483@gmail.com / kiran.kiran@nokia.com
* @datetime   04 Apr 2020 10:38:36
* @purpose    -------
* @input      -------
* @output     -------
*/

//error_reporting(0);
session_start();
if($_SESSION["logedUser"]==null)
{
   header( "refresh:0;url=index.php" );
}

$_SESSION["BId"]=$_GET['bookingID'];
$_SESSION["serialNo"]=$_GET['femtoFSN'];
$_SESSION["pur"]=$_GET["purpose"];
$_SESSION["bdate"]=$_GET["bookdate"];
$_SESSION["sts"]=$_GET["bookingSts"];
header("refresh:0; url=cancelbooking.php");

?>	