<?php
/**
* @author     Kiran
* @mailID     kiranpoojary483@gmail.com / kiran.kiran@nokia.com
* @datetime   04 Apr 2020 10:38:36
* @purpose    -------
* @input      -------
* @output     -------
*/

session_start();
if($_SESSION["logedUser"]==null)
{
 header( "refresh:0;url=index.php" );
}

$_SESSION["selectedD"]="0";
$_SESSION["reLoad"]=false;

date_default_timezone_set('Asia/Kolkata'); 

$HourNow=date("H");
if($HourNow>=0&&$HourNow<2)
{
    $currentSlot="A";
    
}
elseif ($HourNow>=2&&$HourNow<4) {
   $currentSlot="B";
}
elseif ($HourNow>=4&&$HourNow<6) {
   $currentSlot="C";
}
elseif ($HourNow>=6&&$HourNow<8) {
   $currentSlot="D";
}
elseif ($HourNow>=8&&$HourNow<=10) {
   $currentSlot="E";
}
elseif ($HourNow>=10&&$HourNow<12) {
   $currentSlot="F";
}
elseif ($HourNow>=12&&$HourNow<14) {
   $currentSlot="G";
}
elseif ($HourNow>=14&&$HourNow<16) {
   $currentSlot="H";
}
elseif ($HourNow>=16&&$HourNow<18) {
   $currentSlot="I";
}
elseif ($HourNow>=18&&$HourNow<20) {
   $currentSlot="J";
}
elseif ($HourNow>=20&&$HourNow<22) {
   $currentSlot="K";
}
elseif ($HourNow>=22&&$HourNow<=23) {
   $currentSlot="L";
}


$TodayDate=date("Y-m-d");


?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Femto Details-Nokia</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

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
        
    </head>

    <body>
        <form method="post">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img class="main-logo" src="images/nokialogo.png" height="30px" alt="" /></a>
                </div>
                <ul class="nav navbar-nav">
                  <li class="active"><a href="femtoSelection.php">Home</a></li>
                  <li><a href="mybookings.php">My Bookings</a></li>
                  <li><a href="index.php">Logout</a></li>
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
                                <h1>Select<span class="table-project-n"> Femto</span> To Update</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">

                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="sl">Sl</th>
                                        <th data-field="ip" data-editable="false">Femto IP</th>
                                        <th data-field="type" data-editable="false">Femto Type</th>
                                        <th data-field="mac" data-editable="false">MAC</th>
                                        <th data-field="fsn" data-editable="false">FSN</th>
                                        <th data-field="vendor" data-editable="false">Vendor</th>
                                        <th data-field="varient" data-editable="false">Varient</th>
                                        <th data-field="">Action</th>
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

                                    $sql = "SELECT * FROM femtodetails ORDER BY FSN";
                                    $result = $con->query($sql);

                                    if ($result->num_rows > 0)
                                    {
                                        $sl=1;

                                        while($row = $result->fetch_assoc())
                                        {

                                            echo "<tr>";
                                            echo "<td>".$sl."</td>";
                                            echo "<td>".$row["femtoIP"]."</td>";
                                            echo "<td>".$row["femtoType"]."</td>";
                                            echo "<td>".$row["MAC"]."</td>";
                                            echo "<td>".$row["FSN"]."</td>";
                                            echo "<td>".$row["vendor"]."</td>";
                                            echo "<td>".$row["varient"]."</td>";
                                            echo "<td><a class='btn btn-lg' href='femtoUpdater.php?femtoIP=".$row['femtoIP']." &femtoFSN=".$row['FSN']."&style='margin-right:16px'> Update</a></td>";
                                            echo "</tr>";
                                            $sl++;
                                        }

                                    }
                                    else
                                    {
                                        echo "0 results";
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


