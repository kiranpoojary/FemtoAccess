<?php
/**
* @author     Kiran
* @mailID 	  kiranpoojary483@gmail.com / kiran.kiran@nokia.com
* @datetime   021 Mar 2020 10:38:36
* @purpose    Login,Registration,Bug Report,Recover Password
* @input      -------
* @output     -------
*/

ob_start();
session_start();
date_default_timezone_set('Asia/Kolkata');
$_SESSION["logedUser"]=null;
?>
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
				<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="log" onclick="toggle_visibility('login','registration',);" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Login</a>

					</li>
					<li class="nav-item">
						<a class="nav-link active" id="reg" onclick="toggle_visibility('registration','login');" data-toggle="tab" href="#reg" role="tab" aria-controls="home" aria-selected="true">Register</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<form action="" method="post">
						<div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
							<h3 class="register-heading">Login To Femto Access</h3>
							<div class="row register-form">
								<div class="col-md-6">
									<div class="form-group">
										<input type="email" class="form-control" maxlength="50" name="uid" placeholder="Nokia ID*" autofocus autocomplete="off" required>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" minlength="6" maxlength="20" name="psw" placeholder="Password*" required/>
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group">
									</div>

									<div class="form-group">
										<a href="#" onclick="window.open('forgotPassword.php', 'win', 'width=450,height=400')">Forgot Password</a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="window.open('bugReport.php', 'win', 'width=450,height=400')">Report Bug</a>

										<input type="submit" class="btnRegister" name="sub"  value="Login"/>

									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label id="invalidLabel" style="color: #F8F9FA;font-weight: bold; display: block">Invalid LoginID or Password.</label>
									</div>
								</div>




							</div>
						</div>
					</form>



					<form action="" method="post">
						<div class="tab-pane fade show" style="display: none;" id="registration" role="tabpanel" aria-labelledby="profile-tab">
							<h3  class="register-heading">Register To Femto Access</h3>
							<div class="row register-form">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" maxlength="30" name="fname" placeholder="First Name *" autocomplete="off" autofocus required/>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" maxlength="30" name="lname" placeholder="Last Name *" autocomplete="off" required/>
									</div>
									<div class="form-group">
										<input type="email"  pattern="^[a-zA-Z0-9._]+@nokia\.com$" class="form-control" maxlength="50" name="email" placeholder="Email/example@nokia.com *" autocomplete="off" required/>
									</div>
									<div class="form-group">
										<input type="text" maxlength="10" pattern="^[6-9][0-9]{9}" minlength="10" name="mob" class="form-control" placeholder="Phone *" autocomplete="off" required/>
									</div>
									<div class="form-group">
										<label id="matchError" style="color: #F8F9FA;font-weight: bold; display: block">Password Mismatched.</label>
									</div>



								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="password" class="form-control" minlength="6" maxlength="20" name="Regpsw"  placeholder="Password (Never use NokiaID password) *" required/>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" minlength="6" maxlength="20" name="Confirmpsw" placeholder="Confirm Password *" required/>
									</div>
									<div class="form-group">



										<select class="form-control" name="secQ" required>
											<option value="">None (Select Security Question)</option>
											<option>What is your Birthdate(dd/mm/yyyy)?</option>
											<option>What is Your old Phone Number(10-digit)?</option>
											<option>What is your Pet Name?</option>
											<option>What is your Native ZIP Code?</option>

										</select>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" maxlength="30" name="secA" placeholder="Answer *" autocomplete="off" required/>
									</div>
									<input type="submit" class="btnRegister"  value="Register"/>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>

	</div>









</body>
</html>
<?php

try
{



// Store the cipher method 
	$ciphering = "AES-128-CTR"; 

// Use OpenSSl Encryption method 
	$iv_length = openssl_cipher_iv_length($ciphering); 
	$options = 0; 

// Non-NULL Initialization Vector for encryption 
	$encryption_iv = '1234567891011121'; 

// Store the encryption key 
	$encryption_key = "GeeksforGeeks"; 





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

			// Use openssl_encrypt() function to encrypt the data 
			$encryptedPassword = openssl_encrypt($password, $ciphering, 
				$encryption_key, $options, $encryption_iv);



			$sql = "SELECT * FROM femtousers WHERE userID='$uid' AND password='$encryptedPassword' ";
			$result = $con->query($sql);
			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$_SESSION["logedName"]=$row["FirstName"]." ".$row["LastName"];
				}		
				$_SESSION["logedUser"]=$uid;
				$sql2 = "UPDATE femtobookings SET status='Time Expired' WHERE bookingdate<'$TodayDate' AND status='Booking Confirmed'";
				$result2 = $con->query($sql2);
				$sqlDelete = "DELETE FROM femtobookings WHERE status='Booking Canceled' ";
				$result3 = $con->query($sqlDelete);
				$_SESSION["logedUser"]=$uid;
				header("Location:femtoSelection.php");


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
		else
		{
			if (isset($_POST["secA"]) && !empty($_POST["secA"]))
			{
				$fName=$_POST["fname"];
				$lName=$_POST["lname"];

				$emailID=$_POST["email"];
				$mobile=$_POST["mob"];

				$regpsw=$_POST["Regpsw"];
				$confpsw=$_POST["Confirmpsw"];

				$secq=$_POST["secQ"];
				$seca=$_POST["secA"];


				

				if($regpsw!=$confpsw)
				{
					?>
					<script type="text/javascript">
						document.getElementById("matchError").style.color="red";
						toggle_visibility('registration','login');
					</script>

					<?php
				}
				else
				{
					// Use openssl_encrypt() function to encrypt the data 
					$encryptedPassword = openssl_encrypt($regpsw, $ciphering, 
						$encryption_key, $options, $encryption_iv);

					
					$sql3="INSERT INTO femtousers VALUES ('$emailID','$encryptedPassword','$fName','$lName',$mobile,'$secq','$seca')";
					
					if(mysqli_query($con,$sql3))
					{
						echo "<script type='text/javascript'>alert('Registration Successful.');
						window.location = 'index.php';
						</script>";

					}
					else
					{
						?>
						<script type="text/javascript">
							alert(
								'Something Went Wrong!.\n\n' 
								+ "Possible Reasons are.\n"
								+ "1)The email already registered.\n" 
								+ '2)Your computer is offline\n\n'  
								+ '▬▬▬▬▬▬▬▬▬ஜ۩۞۩ஜ▬▬▬▬▬▬▬▬▬\n\n' 
								+ 'Try again.' 
								
								);
							toggle_visibility('registration','login');

						</script>
						<?php
					}
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
