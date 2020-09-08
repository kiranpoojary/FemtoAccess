<?php
/**
* @author     Kiran
* @mailID     kiranpoojary483@gmail.com / kiran.kiran@nokia.com
* @datetime   04 Apr 2020 10:38:36
* @purpose    Cancel Booking
* @input      -------
* @output     -------
*/
session_start();
error_reporting(0);
include('connection.php');
if($_SESSION["logedUser"]==null)
{
	header( "refresh:0;url=index.php" );
}

$_SESSION["selectedD"]="0";


//get current time and add 2 coz disable currently running slot from updating.
date_default_timezone_set('Asia/Kolkata'); 
$HourNow=date("H");
$HourNow=$HourNow+2;

if ($HourNow>=22) {
	$expiredSlots="ABCDEFGHIJK";
}
elseif ($HourNow>=20) {
	$expiredSlots="ABCDEFGHIJ";
}
elseif ($HourNow>=18) {
	$expiredSlots="ABCDEFGHI";
}
elseif ($HourNow>=16) {
	$expiredSlots="ABCDEFGH";
}
elseif ($HourNow>=14) {
	$expiredSlots="ABCDEFG";
}
elseif ($HourNow>=12) {
	$expiredSlots="ABCDEF";
}
elseif ($HourNow>=10) {
	$expiredSlots="ABCDE";
}
elseif ($HourNow>=8) {
	$expiredSlots="ABCD";
}
elseif ($HourNow>=6) {
	$expiredSlots="ABC";
}
elseif ($HourNow>=4) {
	$expiredSlots="AB";
}
elseif ($HourNow>=2) {
	$expiredSlots="A";
}
else
{
	$expiredSlots="";

}

$TodayDate=date("Y-m-d");
$time = strtotime($_SESSION['bdate']);
$bookedDate = date('Y-m-d',$time);
$todaysSlot=false;
if($bookedDate==$TodayDate)
{
	$todaysSlot=true;
}

?>

<!doctype html>
<html class="no-js" lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Booking-Femto</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="/bootstrap/4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="js/bootstrap.min.js">
	<script src="js/sweetalert/sweetalert.min.js"></script>
	<link rel="stylesheet" href="css/sweetalert/sweetalert.css">


	<!-- favicon
		============================================ -->
		<link rel="shortcut icon" type="image/x-icon" href="images/nokia_icon.png">
	<!-- Google Fonts
		============================================ -->
		<link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
	<!-- Bootstrap CSS
		============================================ -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap CSS
		============================================ -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- owl.carousel CSS
		============================================ -->
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/owl.theme.css">
		<link rel="stylesheet" href="css/owl.transitions.css">
	<!-- animate CSS
		============================================ -->
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/custom.css">
	<!-- normalize CSS
		============================================ -->
		<link rel="stylesheet" href="css/normalize.css">
	<!-- meanmenu icon CSS
		============================================ -->
		<link rel="stylesheet" href="css/meanmenu.min.css">
	<!-- main CSS
		============================================ -->
		<link rel="stylesheet" href="css/main.css">
	<!-- morrisjs CSS
		============================================ -->
		<link rel="stylesheet" href="css/morrisjs/morris.css">
	<!-- mCustomScrollbar CSS
		============================================ -->
		<link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
		<link rel="stylesheet" href="css/bootstrap-multiselect.css" />
	<!-- metisMenu CSS
		============================================ -->
		<link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
		<link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
	<!-- calendar CSS
		============================================ -->
		<link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
		<link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
	<!-- x-editor CSS
		============================================ -->
		<link rel="stylesheet" href="css/editor/select2.css">
		<link rel="stylesheet" href="css/editor/datetimepicker.css">
		<link rel="stylesheet" href="css/editor/bootstrap-editable.css">
		<link rel="stylesheet" href="css/editor/x-editor-style.css">
	<!-- normalize CSS
		============================================ -->
		<link rel="stylesheet" href="css/data-table/bootstrap-table.css">
		<link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
	<!-- style CSS
		============================================ -->
		<link rel="stylesheet" href="style.css">
	<!-- responsive CSS
		============================================ -->
		<link rel="stylesheet" href="css/responsive.css">
	<!-- modernizr JS
		============================================ -->
		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/bootstrap.min2.js"></script>
		<link type="text/css" rel="stylesheet" href="css/style.css" />

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap3-typeahead.min.js"></script>  

		<script src="js/bootstrap.min2.js"></script>
		<script src="js/bootstrap-multiselect.js"></script>



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
						window.location = "mybookings.php";

					}
					else
					{

						return false;

					}


				});

			}




			function success_report()
			{

				window.location = "mail.php";

			}



		</script>



		<style type="text/css">
			.MultiCheckBox {
				border:1px solid #e2e2e2;
				padding: 5px;
				border-radius:4px;
				cursor:pointer;
			}

			.MultiCheckBox .k-icon{ 
				font-size: 15px;
				float: right;
				font-weight: bolder;
				margin-top: -7px;
				height: 10px;
				width: 14px;
				color:#787878;
			} 

			.MultiCheckBoxDetail {
				display:none;
				position:absolute;
				border:1px solid #e2e2e2;
				overflow-y:hidden;
			}

			.MultiCheckBoxDetailBody {
				overflow-y:scroll;
			}

			.MultiCheckBoxDetail .cont  {
				clear:both;
				overflow: hidden;
				padding: 2px;
			}

			.MultiCheckBoxDetail .cont:hover  {
				background-color:#cfcfcf;
			}

			.MultiCheckBoxDetailBody > div > div {
				float:left;
			}

			.MultiCheckBoxDetail>div>div:nth-child(1) {

			}

			.MultiCheckBoxDetailHeader {
				overflow:hidden;
				position:relative;
				height: 28px;
				background-color:#3d3d3d;
			}

			.MultiCheckBoxDetailHeader>input {
				position: absolute;
				top: 4px;
				left: 3px;
			}

			.MultiCheckBoxDetailHeader>div {
				position: absolute;
				top: 5px;
				left: 24px;
				color:#fff;
			}

			body
			{
				margin: 0;
				padding: 0;
				background-color: #184BA2;
				background-size: cover;


			}

			.card{
				background-color: black;
				padding-top: 0%;
			}
		</style>

		<script type="text/javascript">

			$(document).ready(function(){
				$('#slotSelected').multiselect({
					nonSelectedText: 'Select Slot/s',
					enableFiltering: true,
					enableCaseInsensitiveFiltering: true,
					buttonWidth:'280px'

				});

				$('#slotSelected_form').on('submit', function(event){
					event.preventDefault();
					var form_data = $(this).serialize();
					$.ajax({
						url:"bookfemto.php",
						method:"POST",
						data:form_data,
						success:function(data)
						{
							$('#slotSelected option:selected').each(function(){
								$(this).prop('selected', false);
							});
							$('#slotSelected').multiselect('refresh');

						} 
					});
				});
			});






		</script>
	</head>
	<body>

		<div class="section">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="femtoSelection.php"><img class="main-logo" src="images/nokialogo.png" height="30px" alt="" /></a>
					</div>
					<ul class="nav navbar-nav">
						<li ><a href="femtoSelection.php">Femto List</a></li>
						<li ><a href="mybookings.php">My Bookings</a></li>
						<li class="active"><a href="#">Update Bookings</a></li>
						
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['logedName']; ?></a></li>
						<li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
					</ul>
				</div>
			</nav>

			<div class="form-group">
				<div class="container ">
					<div class="row">
						<div class="booking-form card">
							<div class="form-header">
								<h1 class="form-group">Update Booking</h1>
							</div>
							<form method="post">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">BOOKING ID *</span>
											<input class="form-control" type="text" id=fip name="fip" value="<?php echo $_SESSION["BId"];  ?>" readonly>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-gr">
											<span class="form-label">FSN *</span>
											<input class="form-control" type="text" id="fsl" name="fsl" value="<?php echo $_SESSION["serialNo"];  ?>" readonly>
										</div>
									</div>
								</div>
								<div class="form-group">
									<span class="form-label">User ID *</span>
									<input class="form-control" type="email" id="userID"  value="<?php echo $_SESSION["logedUser"];  ?>" readonly >
								</div>


								<div class="form-group">
									<span class="form-label">Purpose</span>
									<input class="form-control" id="purpose"  name="pur" type="text" value="<?php echo $_SESSION["pur"];  ?>"  placeholder="Enter Description">
								</div>
								<br> 
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Booked Date*</span>

											<input class="form-control" name="bdate" 
											id="bdate" type="text" value="<?php echo $_SESSION['bdate'];  ?>" readonly>

										</div>
									</div>
									<?php



									if (!$con or !mysqli_select_db($con,'femtoaccess')) 
									{
									}
									else
									{
										$bookid=$_SESSION["BId"];

										$sql = "SELECT slot FROM femtobookings where bookingID='$bookid' ";
										$result = $con->query($sql);

										if ($result->num_rows > 0)
										{

											while($row = $result->fetch_assoc())
											{
												$allslots.=$row["slot"];
											}



											$a=substr_count($allslots,"A");
											$b=substr_count($allslots,"B");
											$c=substr_count($allslots,"C");
											$d=substr_count($allslots,"D");
											$e=substr_count($allslots,"E");
											$f=substr_count($allslots,"F");
											$g=substr_count($allslots,"G");
											$h=substr_count($allslots,"H");
											$i=substr_count($allslots,"I");
											$j=substr_count($allslots,"J");
											$k=substr_count($allslots,"K");
											$l=substr_count($allslots,"L");

										}
									}
									
									echo "<div id='sl' class='col-sm-6'>";
									echo "<div class='row>";
									echo "<div class='col-sm-4'>";
									echo "<div class='form-group'>";
									echo "<span class='form-label'>Pick A Slot *</span>";
									echo "<select id='slotSelected' name='slotSelected[]' multiple class='form-control'>";

									$expiredBooked="";

									if($a>0)
									{
										if(substr_count($expiredSlots,"A")>0 && $todaysSlot)
										{
											echo "<option  value='A' selected disabled>00:00-02:00</option>";
											$expiredBooked = "A" . ',';
										}
										else
										{
											echo "<option  value='A' selected>00:00-02:00</option>";
										}
									}

									if($b>0)
									{
										if(substr_count($expiredSlots,"B")>0 && $todaysSlot)
										{
											echo "<option  value='B' selected disabled>02:00-04:00</option>";
											$expiredBooked .= "B" . ',';
										}
										else
										{
											echo "<option  value='B' selected>02:00-04:00</option>";
										}
									}

									if($c>0 )
									{
										if(substr_count($expiredSlots,"C")>0 && $todaysSlot)
										{
											echo "<option  value='C' selected disabled>04:00-06:00</option>";
											$expiredBooked .= "C" . ',';
										}
										else
										{
											echo "<option  value='C' selected>04:00-06:00</option>";
										}
									}

									if($d>0)
									{
										if(substr_count($expiredSlots,"D")>0 && $todaysSlot)
										{
											echo "<option  value='D' selected disabled>06:00-08:00</option>";
											$expiredBooked .= "D" . ',';
										}
										else
										{
											echo "<option  value='D' selected>06:00-08:00</option>";

										}
									}

									if($e>0)
									{
										if(substr_count($expiredSlots,"E")>0 && $todaysSlot)
										{
											echo "<option  value='E' selected disabled>08:00-10:00</option>";
											$expiredBooked .= "E" . ',';
										}
										else
										{
											echo "<option  value='E' selected>08:00-10:00</option>";
										}
									}

									if($f>0)
									{
										if(substr_count($expiredSlots,"F")>0 && $todaysSlot)
										{
											echo "<option  value='F' selected disabled>10:00-12:00</option>";
											$expiredBooked .= "F" . ',';
										}
										else
										{
											echo "<option  value='F' selected>10:00-12:00</option>";
										}
									}

									if($g>0)
									{
										if(substr_count($expiredSlots,"G")>0 && $todaysSlot)
										{
											echo "<option  value='G' selected disabled>12:00-14:00</option>";
											$expiredBooked .= "G" . ',';
										}
										else
										{
											echo "<option  value='G' selected>12:00-14:00</option>";
										}
									}

									if($h>0)
									{
										if(substr_count($expiredSlots,"H")>0 && $todaysSlot)
										{
											echo "<option  value='H' selected disabled>14:00-16:00</option>";
											$expiredBooked .= "H" . ',';
										}
										else
										{
											echo "<option  value='H' selected>14:00-16:00</option>";
										}
									}

									if($i>0)
									{
										if(substr_count($expiredSlots,"I")>0 && $todaysSlot)
										{
											echo "<option  value='I' selected disabled>16:00-18:00</option>";
											$expiredBooked .= "I" . ',';
										}
										else
										{
											echo "<option  value='I' selected>16:00-18:00</option>";
										}
									}

									if($j>0)
									{
										if(substr_count($expiredSlots,"J")>0 && $todaysSlot)
										{
											echo "<option  value='J' selected disabled>18:00-20:00</option>";
											$expiredBooked .= "J" . ',';
										}
										else
										{
											echo "<option  value='J' selected>18:00-20:00</option>";
										}
									}

									if($k>0)
									{
										if(substr_count($expiredSlots,"K")>0 && $todaysSlot)
										{
											echo "<option  value='K' selected disabled>20:00-22:00</option>";
											$expiredBooked .= "K" . ',';
										}
										else
										{
											echo "<option  value='K' selected>20:00-22:00</option>";
										}
									}

									if($l>0)
									{
										if(substr_count($expiredSlots,"L")>0 && $todaysSlot)
										{
											echo "<option  value='L' selected disabled>22:00-00:00</option>";
											$expiredBooked .= "L" . ',';
										}
										else
										{
											echo "<option  value='L' selected>22:00-00:00</option>";
										}
									}


									
									if($a!=0||$b!=0||$c!=0||$d!=0||$e!=0||$f!=0||$g!=0||$h!=0||$i!=0||$j!=0||$k!=0||$l!=0)
										echo "<option value='Q' >Cancel Bookinng</option>";
									?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="form-btn">
					<center>  <input type="submit" class="submit-btn form-group" style="width: 400px" name="submit" value="Update Booking" /> </center>
				</div>

			</form>

			<br /><br /><br /><br />
		</div>

	</body>

	</html>


	<?php 
	
	try {

		$expiredBooked = substr($expiredBooked, 0, -1); 
		$uid=$_SESSION["logedUser"];
		$fsl=$_SESSION["serialNo"];
		$purpose=$_POST["pur"];



		if($purpose==null)
		{
			$purpose="Nil";
		}

		
		if(isset($_POST["slotSelected"]) || ($expiredBooked!="" && $_SESSION['reLoad']))  //if some slots are selected
		{
			$slotSelected = '';
			foreach($_POST["slotSelected"] as $row)
			{
				$slotSelected .= $row . ',';

			}
			$slotSelected = substr($slotSelected, 0, -1);

			$newStatus=$_SESSION["sts"];
			if(substr_count($slotSelected,"Q"))
			{
				$newStatus="Booking Canceled";
				$slotSelected=null;

			}





			if($todaysSlot)
			{
				if($expiredBooked!="")
				{
					if($newStatus=="Booking Canceled")
					{
						$newStatus="Booking Confirmed";
						$slotSelected=$expiredBooked;
					}
					else
					{
						$slotSelected=$expiredBooked.",".$slotSelected;
						$newStatus="Booking Confirmed";
					}

				}			
			}


			$query2="UPDATE femtobookings SET slot='$slotSelected',purpose='$purpose',status='$newStatus' WHERE bookingID=$_SESSION[BId]";

			
			if(mysqli_query($con, $query2))
			{

				if($newStatus=="Booking Canceled")
				{
					$_SESSION["mailType"]="Canceled";

					echo '<script type="text/javascript">',
					'success_report();',
					'</script>';
				}
				else
				{
					$_SESSION["mailType"]="Updated";
					$_SESSION["slots"]=$slotSelected;

					echo '<script type="text/javascript">',
					'success_report();',
					'</script>';
				}
				
			}
			
			else
			{


				echo '<script type="text/javascript">',
				'error_report("Something Went Wrong","please try again", "error");',
				'</script>';


			}



		}


		else   //if no slots are selectd
		{


			
			//alert user to select slot.
			//1)if($_SESSION["reLoad"])-->Don't show alert on firt page load(first value set to false in previous page then its true immidiately in below code)  
			//2)$todaysSlot==false-->(true)if not todays slot then either select atleast one slot orcancel 
			//3)$todaysSlot && $expiredBooked=="" -->if todays booking and there is no expired slot then either select atleast one slot orcancel
			if(($_SESSION["reLoad"] && $todaysSlot==false) || ($_SESSION["reLoad"] && $todaysSlot && $expiredBooked==""))
			{	
				echo '<script type="text/javascript">',
				'error_report("Empty Field","Please Select Slot/s", "warning");',
				'</script>';

			}

			$_SESSION["reLoad"]=true;
		}
		
		
		
		

	} catch (Exception $e) {

		echo 'Caught exception: ',  $e->getMessage(), "\n";

	}



	?>




