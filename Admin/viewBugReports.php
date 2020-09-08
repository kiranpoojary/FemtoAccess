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
if($_SESSION["logedUser"]==null or $_SESSION["adminUser"]==false or $_SESSION["adminType"]!="MasterAdmin")
{
	header( "refresh:0;url=../index.php" );
}
include("../connection.php");
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

	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="typeahead.js"></script>


	<script type="text/javascript">
		function error_report($tt,$txt,$ty)
		{
			swal({
				title: $tt,
				text: $txt,
				type: $ty
			},
			function() {
				if($ty=="success")
				{
					window.location = "viewBugReports.php";

				}
				else
				{
					return false;

				}


			});

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
				<li><a href="index.php">Add Femto</a></li>
				<li><a href="updateFemto.php">Update Femto</a></li>
				<?php
				if($_SESSION["adminType"]=="MasterAdmin")
				{
					?>
					<li><a href="adminUsers.php">Admins</a></li>
					 <li><a href="cancelBookings.php">Cancel Bookings</a></li>
					<li class="active"><a href="#">Bug Reports</a></li>
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
						<h2>Bug List</h2>
						<div class="container-fluid">
							<div class="container">
								<div class="row">
									<table class="table table-hover table-responsive" style="border:1px red">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Reported By</th>
												<th>Bug Description</th>
												<th>Reported Date</th>
												<th>Status</th>
												<th>Remove</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$getBugReports ="SELECT * FROM bugreports ORDER BY sl";  

											$allBugs=mysqli_query($con,$getBugReports);
											if ($allBugs->num_rows > 0) {
												$sl=0;
												while($row = $allBugs->fetch_assoc()) {
													$sl+=1;
													?>
													<tr id="d1">
														<td><?php echo $sl; ?></td>
														<td id="fn"><?php echo $row["reportedBy"]; ?></td>
														<td id="ln"><?php echo $row["bugDescription"]; ?></td>
														<td id="uid"><?php echo $row["reportedDate"]; ?></td>
														<td id="addby"><?php echo $row["bugStatus"]; ?></td>
														<td><button type="submit" value="<?php echo $row[sl]; ?>" class="delete btn btn-danger btn-sm" name="removed"><span class="glyphicon glyphicon-trash"></span></button></td>
													</tr>

													<?php
												}
											}
											else
											{
												?>
												<tr style="color: red;font-weight: bold;">
													<td colspan="6">No Bugs Reported(Bug List is empty)</td>
												</tr>
												<?php
											}

											?>

										</tbody>
									</table>
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

if(isset($_POST["removed"]))
{
	$removeID=$_POST["removed"];
	$deleteBugQuery = "DELETE FROM bugreports WHERE sl='$removeID'"; 

	if (mysqli_query($con, $deleteBugQuery)) {
		echo '<script type="text/javascript">',
		'error_report("Removed","", "success");',
		'</script>';
	}
	else
	{
		echo '<script type="text/javascript">',
		'error_report("Operation Failed.!","Try Again.", "error");',
		'</script>';
	}
}
?>









