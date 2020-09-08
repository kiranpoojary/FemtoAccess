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



//function which returns fullName of user who booked specific slots
function getBookedUser($fsn,$date,$slot)
{
    $host='localhost';
    $username='root';
    $pass='';
    $db='femtoaccess';
    $con=mysqli_connect($host,$username,$pass,$db);
    if(!$con)
    {
        echo "<script type='text/javascript'>alert('No Database Connection,Try again');
        window.location = 'femtoSelection.php';
        </script>";
    }



    $getNameQuery="SELECT FirstName,LastName FROM femtousers WHERE userID IN(SELECT userID FROM femtobookings WHERE bookingdate='$date' AND femtoFSN='$fsn' AND slot LIKE '%$slot%')";
    $fullName="Not Booked";
    $nameResult = mysqli_query($con, $getNameQuery);
    while($name = mysqli_fetch_array($nameResult))
    {
        $fullName=$name["FirstName"]." ".$name["LastName"];

    }

    return $fullName;

}

function getSlotTime($slot)
{
    switch ($slot) {
        case 'A':
        return "00:00-02:00";
        break;

        case 'B':
        return "02:00-04:0";
        break;

        case 'C':
        return "04:00-06:00";
        break;

        case 'D':
        return "06:00-08:00";
        break;

        case 'E':
        return "08:00-10:00";
        break;

        case 'F':
        return "10:00-12:00";
        break;

        case 'G':
        return "12:00-14:00";
        break;

        case 'H':
        return "14:00-16:00";
        break;

        case 'I':
        return "16:00-18:00";
        break;

        case 'J':
        return "18:00-20:00";
        break;

        case 'K':
        return "20:00-22:00";
        break;

        case 'L':
        return "22:00-:00";
        break;
        
        default:
        return "Q";
        break;
    }



}

function getSlotName($slotNum,$bookedSlot)
{
 switch ($slotNum) {
     case 1:
     if(substr_count($bookedSlot, "A"))
         return "A";
     else
        return "Q";
    break;

    case 2:
    if(substr_count($bookedSlot, "B"))
     return "B";
 else
    return "Q";
break;

case 3:
if(substr_count($bookedSlot, "C"))
 return "C";
else
    return "Q";
break;

case 4:
if(substr_count($bookedSlot, "D"))
 return "D";
else
    return "Q";
break;

case 5:
if(substr_count($bookedSlot, "E"))
 return "E";
else
    return "Q";
break;
case 6:
if(substr_count($bookedSlot, "F"))
 return "F";
else
    return "Q";
break;

case 7:
if(substr_count($bookedSlot, "G"))
 return "G";
else
    return "Q";
break;

case 8:
if(substr_count($bookedSlot, "H"))
 return "H";
else
    return "Q";
break;

case 9:
if(substr_count($bookedSlot, "I"))
 return "I";
else
    return "Q";
break;

case 10:
if(substr_count($bookedSlot, "J"))
 return "J";
else
    return "Q";
break;

case 11:
if(substr_count($bookedSlot, "K"))
 return "K";
else
    return "Q";
break;


case 12:
if(substr_count($bookedSlot, "L"))
 return "L";
else
    return "Q";
break;

default:
return "Q";
}
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

    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>
    <style type="text/css">
        table, th, td {
          border: 1px solid black;
      }
  </style>


  <script type="text/javascript">
    function error_report($tt,$txt,$ty)
    {
        swal({
            title: $tt,
            text: $txt,
            type: $ty,
        },);
    }


    function showHideDiv() {
        var srcElement = document.getElementById("details");
        if (srcElement != null) {
            if (srcElement.style.display == "block") {
                srcElement.style.display = 'none';
            }
            else {
                srcElement.style.display = 'block';
            }
            return false;
        }
    }


    $(document).ready(function () {
        $('#femtoFSNIP').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "getFemtoInfo.php",
                    data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                        result($.map(data, function (item) {
                            return item;
                        }));
                    }
                });
            }
        });
    });

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
                    <li class="active"><a href="cancelBookings.php">Cancel Bookings</a></li>
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
                        <h2>Select Femto To Cancel Todays Bookings</h2>
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="demo-label">Enter Femto FSN or IP</label><br/> <input type="text" name="femtoFSNIP" id="femtoFSNIP" placeholder="eg: ASK170100080 OR 172.63.102.23" autocomplete="off" class="form-control" required="" />
                            </div>
                            <div class="col-sm-4">
                                <label class="demo-label"></label><label class="demo-label"></label>
                                <div class="form-group">

                                    <input type="submit" class="btn btn-primary" name="submitFSN"
                                    class="button" value="View Bookings" />  

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
    if(array_key_exists('submitFSN', $_POST)) { 
        submitFSN(); 
    } 

    function submitFSN() { 
        $holeString=$_POST["femtoFSNIP"];
        $string_array = explode("/",$holeString);
        $inputFSN=$string_array[0];
        $_SESSION['inputFSN']=$inputFSN;
        $IP=$string_array[1];
        include("../connection.php");
        $TodayDate=date("Y-m-d");

        ?>
        <form method="post">
            <div class="container" id="details">
                <div class="row my-4">
                    <div class="col">
                        <div class="jumbotron" style="background-color: #DDD">
                            <h2>Todays Bookings of Femto :<?php echo $IP."-".$inputFSN ?> </h2>

                            <div class="col-sm-1 ">
                                <div class="form-group">
                                    <input  type="button" class="btn btn-danger col-sm-7" value="X" onclick="showHideDiv();" name="clear">
                                </div>
                            </div>

                            <div class="container-fluid" >
                                <table class="table table-bordered table-hover" style="border: 1px solid black">
                                  <thead>
                                    <tr>
                                      <th scope="col" style="border: 1px solid black">Slots</th>
                                      <th scope="col" style="border: 1px solid black">Booked By</th>
                                      <th scope="col" style="border: 1px solid black">Cancel Slot</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $getBookingQuery ="SELECT slot,bookingID FROM femtobookings WHERE femtoFSN='$inputFSN' AND bookingdate='$TodayDate'";
                                $bookingDetails = mysqli_query($con, $getBookingQuery);

                                

                                if ($bookingDetails->num_rows > 0) {
                                    while($row =$bookingDetails->fetch_assoc()) {
                                        $slotNumber=1;

                                        while($slotNumber<=12)
                                        {

                                            $slotName=getSlotName($slotNumber,$row["slot"]);
                                            $slotTime=getSlotTime($slotName);
                                            
                                            if($slotName!="Q")
                                            {
                                                $bookedUser=getBookedUser($inputFSN,$TodayDate,$slotName);

                                                ?>
                                                <tr>
                                                    <th scope="row" style="border: 1px solid black"><?php echo $slotTime ?></th>
                                                    <td style="border: 1px solid black"><?php echo $bookedUser ?></td>
                                                    <td style="border: 1px solid black"><button class="btn btn-primary" name="slotOnly">Cancel This Slot</button></td>

                                                </tr> 
                                                <?php

                                            }
                                            $slotNumber+=1;
                                        }
                                        echo " <tr>

                                        <th scope='row' style='border: 1px solid black'></th>
                                        <td colspan='2' style='border: 1px solid black'><button class='btn btn-danger' name='cancel' value='".$row[bookingID]."'>Cancel Entire Booking Of ".$bookedUser."</button></td></tr>";
                                        echo " <tr style='background-color:#C0C0C0'>

                                        <td colspan='3' style='border: 2px solid red'></td></tr>";

                                    }



                                }
                                else
                                {
                                   ?>
                                   <tr>
                                      <td colspan="3" style="border: 1px solid black;color: red">No Bookings found for the entered femto today</td>


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
</form>



</body>
</html>

<?php

if(isset($_POST["cancel"]))
{
    $bookID= $_POST["cancel"];

    include("../connection.php");
    
    $deleteQuery="DELETE FROM femtobookings WHERE bookingID=$bookID";

    if(mysqli_query($con, $deleteQuery))
    {
        echo '<script type="text/javascript">',
        'error_report("Booking Canceled","Slots are available for booking", "success");',
        '</script>';
    }
    else
    {
        echo '<script type="text/javascript">',
        'error_report("Something Went Wrong","please try again", "error");',
        '</script>';
    }

}else
if(isset($_POST["slotOnly"]))
{
   echo '<script type="text/javascript">',
   'error_report("Available Soon.."," ", "warning");',
   '</script>';
}
else
    if(isset($_POST["Reset"]))
    {
        echo '<script type="text/javascript">',
        'showHideDiv();',
        '</script>';
    }



    ?>

