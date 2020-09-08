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
					window.location = "adminUsers.php";

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
					<li class="active"><a href="#">Admins</a></li>
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
			<div class="row my-4">
				<div class="col">
					<div class="jumbotron" style="background-color: #DDD">
						<h2>Add New Admin User</h2>
						<div class="row">
							<div class="col-sm-4">
								<label class="demo-label">Enter Nokia ID of new admin</label><br/> <input type="email"  pattern="^[a-zA-Z0-9._]+@nokia\.com$" class="form-control" maxlength="50" name="email" placeholder="example@nokia.com *" autocomplete="off" required/>
							</div>
							<div class="col-sm-4">
								<label class="demo-label"></label><label class="demo-label"></label>
								<div class="form-group">

									<input type="submit" class="btn btn-primary" name="AsAdmin"
									class="button" value="Add as Admin" /> 
									<input type="submit" class="btn btn-primary" name="AsMaster"
									class="button" value="Add as Master Admin" />
								</div><span style="color: red">Only Master Admin can manage other Admins.</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>



	<form method="post">
		<div class="container" >
			<div class="row my-4"  >
				<div class="col">
					<div class="jumbotron" style="background-color: #DDD">
						<h2>Current Admin Users</h2>
						<div class="container-fluid" >
							<div class="container">
								<div class="row">
									<table class="table table-hover table-responsive">
										<thead>
											<tr>
												<th>Sl</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>AdminID</th>
												<th>Added By</th>
												<th>Admin Type</th>
												<th>Revoke Privilege</th>
											</tr>
										</thead>
										<tbody>
											<tr id="d1">
												<td>1</td>
												<td id="fn">NA</td>
												<td id="ln">NA</td>
												<td id="uid"><?php echo $_SESSION[logedUser]; ?></td>
												<td id="ader"><?php echo $_SESSION[adminAdder]; ?></td>
												<td id="adTy"><?php echo $_SESSION[adminType]; ?></td>
												<td><span class="fa fa-user"></span><b>You</b></td>
											</tr>
											


											<?php
											$getAdminsQuery ="SELECT * FROM adminusers WHERE userID!='$_SESSION[logedUser]'"; 
											
											$allAdmins =mysqli_query($con, $getAdminsQuery);
											if ($allAdmins->num_rows > 0) {
												$sl=1;
												while($row = $allAdmins->fetch_assoc()) {
													$sl+=1;
													?>



													<tr id="d1">
														<td><?php echo $sl; ?></td>
														<td id="fn">NA</td>
														<td id="ln">NA</td>
														<td id="uid"><?php echo $row["userID"]; ?></td>
														<td id="addby"><?php echo $row["addedBy"]; ?></td>
														<td id="adTy"><?php echo $row["adminType"]; ?></td>
														<td><button type="submit" value="<?php echo $row["userID"]; ?>" class="delete btn btn-danger btn-sm" name="revoke"><span class="glyphicon glyphicon-trash"></span></button></td>
													</tr>

													<?php
												}
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
if(isset($_POST["email"]))
{
	$uType=null;
	$uid=$_POST["email"];
	if(isset($_POST["AsAdmin"]))
	{
		$uType="Admin";

	}
	else
		if(isset($_POST["AsMaster"]))
		{
			$uType="MasterAdmin";
		}
		
		$insertAdminQuery="INSERT INTO adminusers(userID,addedBy,adminType) VALUES('$uid','$_SESSION[logedUser]','$uType')";
		if(mysqli_query($con, $insertAdminQuery))
		{
			if($uType=="Admin")
			{
				echo '<script type="text/javascript">',
				'error_report("Succesful","New Admin Added", "success");',
				'</script>';
			}else
			{
				echo '<script type="text/javascript">',
				'error_report("Succesful","New Master Admin Added", "success");',
				'</script>';
			}
			
		}
		else
		{
			echo '<script type="text/javascript">',
			'error_report("Operation Failed.!","check whether user is already an admin", "error");',
			'</script>';
		}




	}else

	if(isset($_POST["revoke"]))
	{
		$revokeID=$_POST["revoke"];
		if($revokeID!="masteradmin@nokia.com")
		{
			$deleteAdminsQuery = "DELETE FROM adminusers WHERE userID='$revokeID'"; 

			if (mysqli_query($con, $deleteAdminsQuery)) {
				echo '<script type="text/javascript">',
				'error_report("Revoked","Privilage revoked from Admin", "success");',
				'</script>';
			}
			else
			{
				echo '<script type="text/javascript">',
				'error_report("Operation Failed.!","Try Again.", "error");',
				'</script>';
			}
		}else
		{
			echo '<script type="text/javascript">',
				'error_report("Operation Failed.!","This admin can\'t be removed.", "warning");',
				'</script>';
		}
	}
	?>




