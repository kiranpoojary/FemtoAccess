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

$_SESSION["femtoIP"]=$_GET['femtoIP'];
$_SESSION["serialNo"]=$_GET['femtoFSN'];
header("refresh:0; url=bookfemto.php");

?>	