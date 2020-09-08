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

        $(document).ready(function(){
         $('#framework').multiselect({
          nonSelectedText: 'Select Slot/s',
          enableFiltering: true,
          enableCaseInsensitiveFiltering: true,
          buttonWidth:'150px'

        });

         $('#framework_form').on('submit', function(event){
          event.preventDefault();
          var form_data = $(this).serialize();
          $.ajax({
           url:"bookfemto.php",
           method:"POST",
           data:form_data,
           success:function(data)
           {
            $('#framework option:selected').each(function(){
             $(this).prop('selected', false);
           });
            $('#framework').multiselect('refresh');

          } 
        });
        });
       });

     </script>

   </head>
   <body style="background-color: white">
    <form method="post">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="femtoSelection.php"><img class="main-logo" src="images/nokialogo.png" height="30px" alt="" /></a>
          </div>
          <ul class="nav navbar-nav">
            <li ><a href="femtoSelection.php">Femto List</a></li>
            <li ><a href="bookingHistory.php">Booking History</a></li>
            <li class="active"><a href="upcommingBookings.php">Upcomming Bookings</a></li>
          
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['logedName']; ?></a></li>
            <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          </ul>
        </div>
      </nav>
      <div class="left-sidebar-pro">
      </div>
      <div class="data-table-area mg-tb-15">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="sparkline13-list">
                <div class="sparkline13-hd">
                  <div class="main-sparkline13-hd">
                    <h1>Upcomming Bookings Of Femto FSN:<?php echo " ".$_SESSION["serialNo"]; ?>

                  </h1>
                </div>
              </div>
              <div class="sparkline13-graph">
                <div class="datatable-dashv1-list custom-datatable-overright">

                  <table id="table" data-toggle="table" data-pagination="true" data-search="true" 
                  data-cookie-id-table="saveId"   data-toolbar="#toolbar">
                  <thead> 
                    <tr>
                      <th data-field="sl">Sl</th>
                      <th data-field="id" data-editable="false">Booking ID</th>
                      <th data-field="fsn" data-editable="false">Femto FSN</th>
                      <th data-field="dt" data-editable="false">Booking Date</th>
                      <th data-field="slots" data-editable="false">Booked Slots</th>
                      <th data-field="pur" data-editable="false">Purpose</th>
                      <th data-field="uid" data-editable="false">User ID</th>

                    </tr>
                  </thead>
                  <tbody>

                   <?php
                   include('connection.php');
                   if (!$con or !mysqli_select_db($con,'femtoaccess')) 
                   {

                   }
                   else
                   {
                    $sql = "SELECT * FROM femtobookings where femtoFSN='$_SESSION[serialNo]' AND bookingdate>='". $TodayDate ."' ORDER BY bookingdate";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0)
                    {
                      $sl=1;

                      while($row = $result->fetch_assoc())
                      {

                        $allslots=$row["slot"];
                        echo "<tr>";                            
                        echo "<td>".$sl."</td>";
                        echo "<td>".$row["bookingID"]."</td>";
                        echo "<td>".$row["femtoFSN"]."</td>";
                        echo "<td>".$row["bookingdate"]."</td>";
                        echo "<td>";
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
                        if($allslots!="")
                        {
                          echo "<div id='sl' class='col-sm-7'>";
                          echo "<div class='row>";
                          echo "<div class='col-sm-4'>";
                          echo "<div class='form-group'>";
                          echo "<select id='framework' name='framework[]' multiple class='form-control'
                          min='<?php echo date('Y-m-d'); ?>'>";
                          if($a<0)
                            echo "<option value='A'>00:00-02:00</option>";
                          if($b>0)
                            echo "<option value='B'>02:00-04:00</option>";
                          if($c>0)
                            echo "<option value='C'>04:00-06:00</option>";
                          if($d>0)
                            echo "<option value='D'>06:00-08:00</option>";
                          if($e>0)
                            echo "<option value='E'>08:00-10:00</option>";
                          if($f>0)
                            echo "<option value='F'>10:00-12:00</option>";
                          if($g>0)
                            echo "<option value='G'>12:00-14:00</option>";
                          if($h>0)
                            echo "<option value='H'>14:00-16:00</option>";
                          if($i>0)
                            echo "<option value='I'>16:00-18:00</option>";
                          if($j>0)
                            echo "<option value='J'>18:00-20:00</option>";
                          if($k>0)
                            echo "<option value='K'>20:00-22:00</option>";
                          if($l>0)
                            echo "<option value='L'>22:00-00:00</option>";

                          echo "</select>";
                          echo "</div>";
                          echo "</div>";
                          echo "</div>";
                          echo "</div>";
                          echo "</td>";


                        }
                        else
                        {




                        }
                        echo "<td>".$row["purpose"]."</td>";
                        echo "<td>".$row["userID"]."</td>";



                        echo "</tr>";
                        $sl++;


                      }

                    }
                    else
                    {
                      echo "<b><font style='color:red'>No Upcomming Bookings<font><b>";
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
<!-- Static Table End -->

</div>

    <!-- jquery
      ============================================ -->
      <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
      ============================================ -->
      <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
      ============================================ -->
      <script src="js/wow.min.js"></script>
    <!-- price-slider JS
      ============================================ -->
      <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
      ============================================ -->
      <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
      ============================================ -->
      <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
      ============================================ -->
      <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
      ============================================ -->
      <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
      ============================================ -->
      <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
      ============================================ -->
      <script src="js/metisMenu/metisMenu.min.js"></script>
      <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
      ============================================ -->
      <script src="js/data-table/bootstrap-table.js"></script>
      <script src="js/data-table/tableExport.js"></script>
      <script src="js/data-table/data-table-active.js"></script>
      <script src="js/data-table/bootstrap-table-editable.js"></script>
      <script src="js/data-table/bootstrap-editable.js"></script>
      <script src="js/data-table/bootstrap-table-resizable.js"></script>
      <script src="js/data-table/colResizable-1.5.source.js"></script>
      <script src="js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
      ============================================ -->
      <script src="js/editable/jquery.mockjax.js"></script>
      <script src="js/editable/mock-active.js"></script>
      <script src="js/editable/select2.js"></script>
      <script src="js/editable/moment.min.js"></script>
      <script src="js/editable/bootstrap-datetimepicker.js"></script>
      <script src="js/editable/bootstrap-editable.js"></script>
      <script src="js/editable/xediable-active.js"></script>
    <!-- Chart JS
      ============================================ -->
      <script src="js/chart/jquery.peity.min.js"></script>
      <script src="js/peity/peity-active.js"></script>
    <!-- tab JS
      ============================================ -->
      <script src="js/tab.js"></script>
    <!-- plugins JS
      ============================================ -->
      <script src="js/plugins.js"></script>
    <!-- main JS
      ============================================ -->
      <script src="js/main.js"></script>
    </form>
  </body>

  </html>


