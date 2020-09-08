<?php
/**
* @author     Kiran
* @mailID     kiranpoojary483@gmail.com / kiran.kiran@nokia.com
* @datetime   04 Apr 2020 10:38:36
* @purpose    -------
* @input      -------
* @output     -------
*/
error_reporting(0);
session_start();
if($_SESSION["logedUser"]==null)
{
 header( "refresh:0;url=index.php" );
}


date_default_timezone_set('Asia/Kolkata'); 

$HourNow=date("H");

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



?>



<!doctype html>
<html class="no-js" lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Booking-Femto</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
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
      <link rel="stylesheet" href="style.css">
      ============================================ -->
      
      <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- responsive CSS
      ============================================ -->
      <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
      ============================================ -->
      <script src="js/vendor/modernizr-2.8.3.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/bootstrap.min2.js"></script>

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
            window.location = "femtoSelection.php";

          }
          else
          {
            //window.location = "bookfemto.php";
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

    function fun(){

      var slots = document.getElementById('slotSelected').options[document.getElementById('slotSelected').selectedIndex].value;
      var fip= document.getElementById("fip").value;
      var fsl= document.getElementById("fsl").value;
      var uid= document.getElementById("userID").value;
      var bookdate= document.getElementById("bdate").value;
      var pur= document.getElementById("purpose").value;
      


      if (slots ==null) {
        alert('please select valid time slot/s');  
      } 
      else
      {
                //alert('please select valid time slot/s'+slots);
                var slots=<?php echo "getSlots()";?>

                var url = "confirmBooking.php?userID=" + uid +"&serialNo=" + fsl+ "&purpose=" + pur+ "&date=" + bookdate+ "&slot=" + slots;

                window.location = url;
              } 
            } 

            $(document).ready(function(){
             $('#slotSelected').multiselect({
              nonSelectedText: 'Select Slot/s',
              enableFiltering: true,
              enableCaseInsensitiveFiltering: true,
              buttonWidth:'340px'

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

            function handler(e){

              var selecteddate=e.target.value;
              
              window.location.href = "dateadder.php?dateSelected="+selecteddate
              
              

            }

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
                  <li class="active"><a href="#">Confirm Bookings</a></li>
                  <li><a href="bookingHistory.php?femtoFSN="<?php echo $_SESSION["serialNo"]; ?>>Booking History</a></li>
                  <li><a href="upcommingBookings.php">Upcomming Bookings</a></li>
                  
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['logedName']; ?></a></li>
                  <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
              </div>
            </nav>
            <div class="form-group">
              <div class="container">
                <div class="row">
                  <div class="booking-form card">
                    <div class="form-header">
                      <h1 class="form-group">Book Your Femto</h1>
                    </div>
                    <form method="post">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <span class="form-label">Femto IP *</span>
                            <input class="form-control" type="text" id=fip name="fip" value="<?php echo $_SESSION["femtoIP"];  ?>" readonly>
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

                      <?php

                      if($_SESSION["selectedD"]=="0" or $TodayDate==$_SESSION["selectedD"])
                      {
                        $dateVal=date("Y-m-d");
                        $today="Yes";
                        

                      }
                      else
                      {
                        $dateVal=$_SESSION["selectedD"];
                        $today="No";
                        
                      }


                      ?>

                      <div class="form-group">
                        <span class="form-label">Purpose</span>
                        <input class="form-control" id="purpose" autocomplete="off"  name="pur" type="text" placeholder="Enter Description">
                      </div>
                      <br> 
                      <div class="row">
                        <div class="col-sm-5">
                          <div class="form-group">
                            <span class="form-label">Pick A Date *</span>

                            <input class="form-control" name="bdate" 
                            id="bdate" type="date" value="<?php echo $dateVal;  ?>" onchange="handler(event);" min="<?php echo date("Y-m-d"); ?>" required>

                          </div>
                        </div>
                        <?php
                        

                        include('connection.php');
                        if (!$con or !mysqli_select_db($con,'femtoaccess')) 
                        {
                        }
                        else
                        {
                          $fsn=$_SESSION["serialNo"];

                          $sql = "SELECT * FROM femtobookings where femtoFSN='$fsn' AND bookingdate='$dateVal' AND status='Booking Confirmed'";
                          $result = $con->query($sql);

                          if ($result->num_rows > 0)
                          {
                            while($row = $result->fetch_assoc())
                            {
                              $allslots.=$row["slot"];
                            }

                            if( $today=="Yes")
                            {
                              $allslots=$allslots.$expiredSlots;
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
                        echo "<div id='sl' class='col-sm-7'>";
                        echo "<div class='row>";
                        echo "<div class='col-sm-4'>";
                        echo "<div class='form-group'>";
                        echo "<span class='form-label'>Pick A Slot *</span>";
                        echo "<select id='slotSelected' name='slotSelected[]' multiple class='form-control'
                        min='<?php echo date('Y-m-d'); ?>'>";
                        if($today=="No")
                        {
                          if($a<=0)
                            echo "<option value='A'>00:00-02:00</option>";
                          if($b<=0)
                            echo "<option value='B'>02:00-04:00</option>";
                          if($c<=0)
                            echo "<option value='C'>04:00-06:00</option>";
                          if($d<=0)
                            echo "<option value='D'>06:00-08:00</option>";
                          if($e<=0)
                            echo "<option value='E'>08:00-10:00</option>";
                          if($f<=0)
                            echo "<option value='F'>10:00-12:00</option>";
                          if($g<=0)
                            echo "<option value='G'>12:00-14:00</option>";
                          if($h<=0)
                            echo "<option value='H'>14:00-16:00</option>";
                          if($i<=0)
                            echo "<option value='I'>16:00-18:00</option>";
                          if($j<=0)
                            echo "<option value='J'>18:00-20:00</option>";
                          if($k<=0)
                            echo "<option value='K'>20:00-22:00</option>";
                          if($l<=0)
                            echo "<option value='L'>22:00-00:00</option>";
                          if($a!=0&&$b!=0&&$c!=0&&$d!=0&&$e!=0&&$f!=0&&$g!=0&&$h!=0&&$i!=0&&$j!=0&&$k!=0&&$l!=0)
                            echo "<option value='X' disabled>No Slots Available</option>";

                        }
                        else
                          if($today=="Yes")
                          {
                            if($a<=0 && substr_count($expiredSlots,"A")==0 )
                              echo "<option value='A'>00:00-02:00</option>";
                            if($b<=0 && substr_count($expiredSlots,"B")==0)
                              echo "<option value='B'>02:00-04:00</option>";
                            if($c<=0 && substr_count($expiredSlots,"C")==0)
                              echo "<option value='C'>04:00-06:00</option>";
                            if($d<=0 && substr_count($expiredSlots,"D")==0)
                              echo "<option value='D'>06:00-08:00</option>";
                            if($e<=0 && substr_count($expiredSlots,"E")==0)
                              echo "<option value='E'>08:00-10:00</option>";
                            if($f<=0 && substr_count($expiredSlots,"F")==0)
                              echo "<option value='F'>10:00-12:00</option>";
                            if($g<=0 && substr_count($expiredSlots,"G")==0)
                              echo "<option value='G'>12:00-14:00</option>";
                            if($h<=0 && substr_count($expiredSlots,"H")==0)
                              echo "<option value='H'>14:00-16:00</option>";
                            if($i<=0 && substr_count($expiredSlots,"I")==0)
                              echo "<option value='I'>16:00-18:00</option>";
                            if($j<=0 && substr_count($expiredSlots,"J")==0)
                              echo "<option value='J'>18:00-20:00</option>";
                            if($k<=0 && substr_count($expiredSlots,"K")==0)
                              echo "<option value='K'>20:00-22:00</option>";
                            if($l<=0 && substr_count($expiredSlots,"L")==0)
                              echo "<option value='L'>22:00-00:00</option>";
                            echo $a.$b.$c.$d.$e.$f.$g.$h.$i.$j.$k.$l;
                            if($a!=0&&$b!=0&&$c!=0&&$d!=0&&$e!=0&&$f!=0&&$g!=0&&$h!=0&&$i!=0&&$j!=0&&$k!=0&&$l!=0)
                              echo "<option value='X' disabled>No Slots Available Today</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="form-btn">
                 <center>  <input type="submit" class="submit-btn form-group" style="width: 400px" onclick="fun();" name="submit" value="Confirm Booking" /> </center>
               </div>
             </form>
             <br />
           </div>


         </body>
         </html>



         <?php 

         try {

           $uid=$_SESSION["logedUser"];
           $fsl=$_SESSION["serialNo"];
           $purpose=$_POST["pur"];
           $bookdate=$_POST["bdate"];

           if($purpose==null)
           {
            $purpose="Nil";
          }

          if(isset($_POST["slotSelected"] ))
          {
           $slotSelected = '';
           foreach($_POST["slotSelected"] as $row)
           {
            $slotSelected .= $row . ',';
          }
          $slotSelected = substr($slotSelected, 0, -1); 

          $query="INSERT INTO femtobookings(userID,femtoFSN,bookingdate,slot,purpose,status) VALUES ('$uid','$fsl','$bookdate',
          '$slotSelected','$purpose','Booking Confirmed')";

          if(mysqli_query($con, $query))
          {
           $_SESSION["mailType"]="Booked";
           $_SESSION["fsn"]=$fsl;
           $_SESSION["slots"]=$slotSelected;
           $_SESSION["bookedDate"]=$bookdate;
           echo '<script type="text/javascript">',
           'success_report();',
           '</script>';
         }
         else
         {
           echo '<script type="text/javascript">',
           'error_report("Something Went Wrong","please try again", "error");',
           '</script>';
         }

       }
       else
        if($_SESSION["reLoad"])
        {
         echo '<script type="text/javascript">',
         'error_report("Empty Field","Please Select The Slot/s", "warning");',
         '</script>';

       }
       $_SESSION["reLoad"]=true;

     } catch (Exception $e) {

      echo 'Caught exception: ',  $e->getMessage(), "\n";

    }

    ?>




