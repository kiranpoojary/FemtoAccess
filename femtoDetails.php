
<?php
session_start();
if($_SESSION["logedUser"]==null)
{
	header( "refresh:0;url=index.php" );
}
date_default_timezone_set('Asia/Kolkata'); 

$fsn=$_GET["femtoFSN"];
$ip=$_GET["femtoIP"];
include("connection.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Femto Details-Nokia</title>
	<!-- favicon
		============================================ -->
		<link rel="shortcut icon" type="image/x-icon" href="images/nokia_icon.png">
		<link rel="stylesheet" type="text/css" href="css/femtoDetailsCSS.css">
	<!-- Bootstrap CSS
		============================================ -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Script -->
		<script src="js/jquery.min.js"></script>
		<script src='bootstrap/js/bootstrap337.min.js' type='text/javascript'></script>






		<script type="text/javascript">
			$(document).ready(function(){

				$('.bookingInfo').click(function(){

					var fsn = $(this).data('id');

   // AJAX request
   $.ajax({
   	url: 'bookingInfo.php',
   	type: 'post',
   	data: {fsn: fsn},
   	success: function(response){ 
      // Add response in Modal body
      $('.modal-body').html(response);

      // Display Modal
      $('#empModal').modal('show'); 
  }
});
});
			});

		</script>
		<style>
			@media screen and (min-width: 768px) {
				.modal-dialog {
					width: 850px; /* New width for default modal */
				}
				.modal-sm {
					width: 350px; /* New width for small modal */
				}
			}
			@media screen and (min-width: 992px) {
				.modal-lg {
					width: 950px; /* New width for large modal */
				}
			}



			body
			{
				margin: 0;
				padding: 0;
				background-color: #184BA2;
				background-size: cover;

			}

		</style>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="femtoSelection.php"><img class="main-logo" src="images/nokialogo.png" height="30px" alt="" /></a>
				</div>
				<ul class="nav navbar-nav">
					<li class=""><a href="femtoSelection.php">Femto List</a></li>
					<li class="active"><a href="#">Femto Details</a></li>


					<li><a href="#" data-id="<?php echo($fsn); ?>" class='bookingInfo'>Quick Booking Info</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['logedName']; ?></a></li>
					<li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
			</div>
		</nav>




		<div class="container" >
			<!-- Modal -->
			<div class="modal fade" id="empModal" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<center><h3 class="modal-title">Quick Booking Info</h3>
								<p><?php echo $ip." - ".$fsn ?></p>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<input type="date" name="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<br/>
			</div>


			<div class="row">
				<div class="col-sm-6" style="padding-left: 10%">
					<div class="flip-box">
						<div class="flip-box-inner">
							<div class="flip-box-front">
								<h2><u>Femto Details</u></h2>
								<?php

								if (!$con or !mysqli_select_db($con,'femtoaccess')) 
								{
									echo "<script type='text/javascript'>alert('No Database Connection,Try again');
									</script>";
								}
								else
								{
									
									$getFemtoDetailsQuery = "SELECT * FROM femtodetails WHERE FSN='$_GET[femtoFSN]'";
									$femtoDetails = $con->query($getFemtoDetailsQuery);

									if($row = $femtoDetails->fetch_assoc()) {
										?>
										<div class="form-group row" style="padding-left: 20%;padding-top: 5%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Femto IP</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['femtoIP']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Femto FSN</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['FSN']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">MAC</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['MAC']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Femto Type</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['femtoType']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Varient</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['varient']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Vendor</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['vendor']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Board Owner</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['boardOwner']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">HNB Unique ID</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['HNBUniqueId']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Femto ID</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['id']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Test-Line</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['TestLine']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Added By</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['addedBy']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Added Date</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['addedDate']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Last Updated By</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['lastUpdatedBy']; ?></label>
											</div>
										</div>

										<div class="form-group row" style="padding-left: 20%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Last Update Date</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['updatedDate']; ?></label>
											</div>
										</div>

									</div>


									<div class="flip-box-back">
										<h2><u>Todays Booking</u></h2>
										<div class="form-group row" style="padding-left: 20%;padding-top: 5%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">00:00-00:02</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Last Name</label>
											</div>
										</div>
									</div>
									<?php
								}
								else
								{
									?>
									<h1>Something Went Wrong,No Details Found
										<?php
									}
								}

								?>

								
							</div>
						</div>
					</div>









					<div class="col-sm-6">
						<div class="form-group">
							<div class="flip-box">
								<div class="flip-box-inner">
									<div class="flip-box-front">
										<h2><u>Femto Status</u></h2>
										<div class="form-group row" style="padding-left: 20%;padding-top: 5%">
											<div class="col-md-4" style="text-align: left">
												<label for="data">Cell Status</label>
											</div>
											<div class="col-md-6" style="text-align: left">
												<label for="data">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Connection</label>
											</div>
										</div>
									</div>
									<div class="flip-box-back">
										<h2><u>Bookings By Date</u></h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>





			</body>  
			</html>  

