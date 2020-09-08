<?php
/**
* @author     Kiran
* @mailID     kiranpoojary483@gmail.com / kiran.kiran@nokia.com
* @datetime   04 Apr 2020 10:38:36
* @purpose    -------
* @input      -------
* @output     -------
*/

ob_start();
session_start();
date_default_timezone_set('Asia/Kolkata');
$TodayDate=date("Y-m-d");
$_SESSION["logedUser"]=null;

$TodayDate=date("Y-m-d");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/nokia_icon.png">
	<link href="css/customstyle/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="css/customstyle/bootstrap.min.js"></script>
	<script src="css/customstyle/jquery.min.js"></script>
	<link href="bootstrap/js/sweetalert.min.js" rel="stylesheet" type="text/css" />;
	<link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">


	<style type="text/css">
		.register{
			background: -webkit-linear-gradient(left, #3931af, #00c6ff);
			margin-top: 8%;
			padding: 3%;
		}
		.register-left{
			text-align: center;
			color: #fff;
			margin-top: 4%;
		}
		.register-left input{
			border: none;
			border-radius: 1.5rem;
			padding: 2%;
			width: 60%;
			background: #f8f9fa;
			font-weight: bold;
			color: #383d41;
			margin-top: 30%;
			margin-bottom: 3%;
			cursor: pointer;
		}
		.register-right{
			background: #f8f9fa;
			border-top-left-radius: 10% 50%;
			border-bottom-left-radius: 10% 50%;
		}
		.register-left img{
			margin-top: 15%;
			margin-bottom: 5%;
			width: 25%;
			-webkit-animation: mover 2s infinite  alternate;
			animation: mover 1s infinite  alternate;
		}
		@-webkit-keyframes mover {
			0% { transform: translateY(0); }
			100% { transform: translateY(-20px); }
		}
		@keyframes mover {
			0% { transform: translateY(0); }
			100% { transform: translateY(-20px); }
		}
		.register-left p{
			font-weight: lighter;
			padding: 12%;
			margin-top: -9%;
		}
		.register .register-form{
			padding: 10%;
			margin-top: 10%;
		}
		.btnRegister{

			margin-top: 5%;
			border: none;
			border-radius: 1.5rem;
			padding: 2%;
			background: #0062cc;
			color: #fff;
			font-weight: 600;
			width: 70%;
			cursor: pointer;
		}
		.register .nav-tabs{
			margin-top: 3%;
			border: none;
			background: #0062cc;    
			border-radius: 1.5rem;
			width: 28%;
			float: right;
		}
		.register .nav-tabs .nav-link{
			padding: 2%;
			height: 34px;
			font-weight: 600;
			color: #fff;
			border-top-right-radius: 1.5rem;
			border-bottom-right-radius: 1.5rem;
		}
		.register .nav-tabs .nav-link:hover{
			border: none;
		}
		.register .nav-tabs .nav-link.active{
			width: 100px;
			color: #0062cc;
			border: 2px solid #0062cc;
			border-top-left-radius: 1.5rem;
			border-bottom-left-radius: 1.5rem;
		}
		.register-heading{
			text-align: center;
			margin-top: 8%;
			margin-bottom: -15%;
			color: #495057;
		}
		body
		{
			margin: 0;
			padding: 0;
			background-color: #184BA2;
			background-size: cover;


		}

	</style>
	<script type="text/javascript">

		function toggle_visibility(div1,div2) {
			var e1 = document.getElementById(div1);  
			var e2 = document.getElementById(div2);
			var nav=document.getElementById('reg');

			if(e1.style.display == 'block')
			{
				return false;
			}
			else
			{
				e1.style.display = 'block';
				e2.style.display='none';
				return false;
			}
		}



	</script>   
</head>
<body>

	<div class="container register">
		<div class="row">
			<div class="col-md-3 register-left">
				<img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
				<h3 style="font-weight: 999;font-family:nokiakokia">NOKIA</h3>
				<p>IN-Bangalore<br>FEMTO-BOOKING</p>
				
			</div>
			<div class="col-md-9 register-right">
				
				<div class="tab-content" id="myTabContent">
					<form action="" method="post">
						<div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
							<div class="col-md-6">
									<div class="form-group">
										<label id="invalidLabel" style="color: #F8F9FA;font-weight: bold; display: block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invalid LoginID or Password.</label>
									</div>
								</div>
							<h3 class="register-heading">Recover Password</h3>
							<div class="row register-form">
								<div class="col-md-6">
<!--
									<div class="form-group">
										<input type="email" class="form-control" maxlength="50" name="uid" placeholder="Nokia ID*" autofocus autocomplete="off" required>
									</div>

									<div class="form-group">
										<input type="password" class="form-control" minlength="6" maxlength="20" name="psw" placeholder="Password *" required/>
									</div>
									<div class="form-group">
										

										<textarea rows="4" cols="50" class="form-control" maxlength="500" name="desc" placeholder="Bug Description *" required></textarea>
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group">
									</div>

									<div class="form-group">
										<input type="submit" class="btnRegister" name="sub"  value="Report Bug"/>

									</div>
								</div>
-->
								<h2>Available Soon</h2>
							</div>
						</div>
					</form>					
				</div>
			</div>

		</div>

	</body>
	</html>
	<?php

	try
	{
		include('connection.php');

		$visible=0;
		if (!mysqli_select_db($con,'femtoaccess')) 
		{
	//alert_user("Error while connecting to database");
			echo "<script type='text/javascript'>alert('Server failed to find the Database.');</script>";

		}
		else
		{
			if (isset($_POST["uid"]) && !empty($_POST["uid"]))
			{

				$visible=1;
				$uid=$_POST["uid"];
				$password=$_POST["psw"];
				$description=$_POST["desc"];


				$sql = "SELECT * FROM femtousers WHERE userID='$uid' AND password='$password' ";
				$result = $con->query($sql);
				if ($result->num_rows > 0)
				{

					$sql3="INSERT INTO bugreports(reportedBy,bugDescription,reportedDate,bugStatus) VALUES ('$uid','$description','$TodayDate','Reported')";
					
					if(mysqli_query($con,$sql3))
					{
						echo "<script type='text/javascript'>alert('bug report saved.');
						
						window.close();
						</script>";

					}//window.close();


				}

				else 
				{


					if($visible!=0)
					{

						$_SESSION["logedUser"]=null;

						?>
						<script type="text/javascript">
							document.getElementById("invalidLabel").style.color="red";
						</script>

						<?php

						$visible=0;

					}

				}



			}
			
			
		}
	}
catch(Exception $e) {

	echo 'Caught exception: ',  $e->getMessage(), "\n";
	//echo "<script type='text/javascript'>alert('Something went wrong.');</script>";
	

}
?>
