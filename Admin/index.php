<?php
/**
* @author     Kiran
* @mailID     kiranpoojary483@gmail.com / kiran.kiran@nokia.com
* @datetime   17 May 2020 10:38:36
* @purpose    -------
* @input      -------
* @output     -------
*/

session_start();
date_default_timezone_set('Asia/Kolkata'); 
if($_SESSION["logedUser"]==null or $_SESSION["adminUser"]==false)
{
	header( "refresh:0;url=../index.php" );
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>All Femto-Nokia</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="../images/nokia_icon.png">
	

	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../js/bootstrap.min.js">
	<script src="../js/sweetalert/sweetalert.min.js"></script>
	<link rel="stylesheet" href="../css/sweetalert/sweetalert.css">

	<script type="text/javascript">
		function error_report($tt,$txt,$ty)
		{
			swal({
				title: $tt,
				text: $txt,
				type: $ty,
			},);
		}



	</script>




</head>
<body style="background-color: #E7EAED">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="" href="#"><img class="main-logo" src="../images/nokialogo.png" height="50px" alt=""  style="padding-left: 0%" /></a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Add Femto</a></li>
				<li><a href="updateFemto.php">Update Femto</a></li>
				<?php
				if($_SESSION["adminType"]=="MasterAdmin")
				{
					?>
					<li><a href="adminUsers.php">Admins</a></li>
					 <li><a href="cancelBookings.php">Cancel Bookings</a></li>
					<li><a href="viewBugReports.php">Bug Reports</a></li>
					<?php
				}
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">

				<li><a href="../femtoSelection.php"><span class="fa fa-user-plus"></span>&nbsp;&nbsp;User Access</a></li>

				<li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['logedName']; ?></a></li>
				<li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			</ul>

		</div>
	</nav>

	<form method="post">
		<div class="container" >
			<div class="row my-4"  >
				<div class="col">
					<div class="jumbotron" style="background-color: #DDD">
						<h2>Add New Femto</h2>
						<div class="container-fluid" >
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">Femto IP</span>
										<input class="form-control" placeholder="eg: 172.63.102.18" type="text" name="fip" autocomplete="off" >
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">Femto Type</span>
										<input class="form-control" placeholder="eg: MS-SOHO" type="text" autocomplete="off" name="ftype">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">MAC</span>
										<input class="form-control" placeholder="eg: 08:6A:0A:5B:17:07" type="text" name="fmac"  >
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">FSN*</span>
										<input class="form-control" placeholder="eg: ASK170100080" type="text"  name="fsn" autocomplete="off" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">Vendor</span>
										<input class="form-control" placeholder="eg: ASKEY" type="text"name="fvendor" autocomplete="off" >
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">Varient</span>
										<input class="form-control" placeholder="eg: B2B7" type="text" name="fvarient" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">ID</span>
										<input class="form-control" placeholder="eg: 1700003" type="text"name="fid" autocomplete="off">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">HNB Unique ID</span>
										<input class="form-control" placeholder="eg: F830940D00200019" type="text" name="fhnb" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">Test-Line</span>
										<input class="form-control" placeholder="eg: TL-15/27" type="text" name="ftl" autocomplete="off">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">Board Owner</span>
										<input class="form-control" placeholder="eg: " type="text" autocomplete="off" name="fboardw">
									</div>
								</div>
								<div class="col-sm-4 ">
									<div class="form-group">
										<input  type="submit" class="btn btn-primary btn-lg col-sm-6" value="Save">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>
</html>

<?php
if(isset($_POST["fsn"]))
{
	$noVal="NA";
    	//assign user inputs to variables
	$ip=($_POST["fip"]==null|| $_POST["fip"]==" ")?$noVal:$_POST["fip"];
	$type=($_POST["ftype"]==null|| $_POST["ftype"]==" ")?$noVal:$_POST["ftype"];
	$mac=($_POST["fmac"]==null|| $_POST["fmac"]==" ")?$noVal:$_POST["fmac"];
	$fsn=($_POST["fsn"]==null|| $_POST["fsn"]==" ")?$noVal:$_POST["fsn"];
	$vendor=($_POST["fvendor"]==null|| $_POST["fvendor"]==" ")?$noVal:$_POST["fvendor"];
	$varient=($_POST["fvarient"]==null|| $_POST["fvarient"]==" ")?$noVal:$_POST["fvarient"];
	$id=($_POST["fid"]==null|| $_POST["fid"]==" ")?$noVal:$_POST["fid"];
	$hnb=($_POST["fhnb"]==null|| $_POST["fhnb"]==" ")?$noVal:$_POST["fhnb"];
	$tl=($_POST["ftl"]==null|| $_POST["ftl"]==" ")?$noVal:$_POST["ftl"];
	$bw=($_POST["fboardw"]==null|| $_POST["fboardw"]==" ")?$noVal:$_POST["fboardw"];


	include("../connection.php");

	$checkExistQuery="SELECT FSN FROM femtodetails WHERE FSN='$fsn'";
	$checkResult = $con->query($checkExistQuery);
	if ($checkResult->num_rows>0)
	{
		echo '<script type="text/javascript">',
		'error_report("Duplicate Femto FSN","The record already in database", "warning");',
		'</script>';
		
		
	}else
	{
		

		$ab=$_SESSION['logedName'];
		$ad=date("Y-m-d H:i:s");
		$ub='No Updates';
		$ud='0000-00-00 00:00:00';
		$insertQuery="INSERT INTO femtodetails(
		id,femtoIP,femtoType,MAC,FSN,vendor,varient,HNBUniqueId,TestLine,boardOwner,addedBy,addedDate,lastUpdatedBy,updatedDate) VALUES ('$id','$ip','$type','$mac','$fsn','$vendor','$varient','$hnb','$tl','$bw','$ab','$ad','$ub','$ud')";


		if(mysqli_query($con, $insertQuery))
		{
			echo '<script type="text/javascript">',
			'error_report("Saved","Data successfuly stored in database", "success");',
			'</script>';
		}
		else
		{
			echo '<script type="text/javascript">',
			'error_report("Something Went Wrong","please try again", "error");',
			'</script>';
		}
		
	}

}

?>









