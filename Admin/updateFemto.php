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
if($_SESSION["logedUser"]==null or $_SESSION["adminUser"]==false)
{
    header( "refresh:0;url=../index.php" );
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
                <li class="active"><a href="#">Update Femto</a></li>
                <?php
                if($_SESSION["adminType"]=="MasterAdmin")
                {
                    ?>
                    <li><a href="adminUsers.php">Admins</a></li>
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
                        <h2>Select Femto</h2>
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="demo-label">Enter Femto FSN or IP</label><br/> <input type="text" name="femtoFSNIP" id="femtoFSNIP" placeholder="eg: ASK170100080 OR 172.63.102.23" autocomplete="off" class="form-control" required="" />
                            </div>
                            <div class="col-sm-4">
                                <label class="demo-label"></label><label class="demo-label"></label>
                                <div class="form-group">

                                    <input type="submit" class="btn btn-primary" name="submitFSN"
                                    class="button" value="UPDATE" />  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(array_key_exists('submitFSN', $_POST)) { 
        submitFSN(); 
    } 

    function submitFSN() { 

        $holeString=$_POST["femtoFSNIP"];
        $string_array = explode("/",$holeString);
        $inputFSN=$string_array[0];
        $_SESSION['inputFSN']=$inputFSN;
        include("../connection.php");
        $getDetailsQuery ="SELECT * FROM femtodetails WHERE FSN = '$inputFSN'";
        $femtoDetails = mysqli_query($con, $getDetailsQuery);
        if ($femtoDetails->num_rows > 0) {
            while($row = $femtoDetails->fetch_assoc()) {
                ?>
                <form method="post">
                    <div class="container" id="details">
                        <div class="row my-4"  >
                            <div class="col">
                                <div class="jumbotron" style="background-color: #DDD">
                                    <h2>Update Femto</h2>
                                    <div class="container-fluid" >
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">Femto IP</span>
                                                    <input class="form-control" placeholder="eg: 172.63.102.18" type="text" name="fip" value="<?php echo($row["femtoIP"]) ?>" autocomplete="off" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">Femto Type</span>
                                                    <input class="form-control" placeholder="eg: MS-SOHO" type="text" value="<?php echo($row["femtoType"]) ?>" autocomplete="off" name="ftype">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">MAC</span>
                                                    <input class="form-control" placeholder="eg: 08:6A:0A:5B:17:07" value="<?php echo($row["MAC"]) ?>" type="text" name="fmac"  >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">FSN*</span>
                                                    <input class="form-control" placeholder="eg: ASK170100080" type="text" value="<?php echo($row["FSN"]) ?>"  name="fsn" readonly required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">Vendor</span>
                                                    <input class="form-control" placeholder="eg: ASKEY" type="text"name="fvendor" value="<?php echo($row["vendor"]) ?>" autocomplete="off" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">Varient</span>
                                                    <input class="form-control" placeholder="eg: B2B7" type="text" value="<?php echo($row["varient"]) ?>" name="fvarient" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">ID</span>
                                                    <input class="form-control" placeholder="eg: 1700003" type="text"name="fid" value="<?php echo($row["id"]) ?>" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">HNB Unique ID</span>
                                                    <input class="form-control" placeholder="eg: F830940D00200019" type="text" value="<?php echo($row["HNBUniqueId"]) ?>" name="fhnb" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">Test-Line</span>
                                                    <input class="form-control" placeholder="eg: TL-15/27" type="text" value="<?php echo($row["TestLine"]) ?>" name="ftl" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">Board Owner</span>
                                                    
                                                    <select class="form-control" name="fboardw">
                                                        <?php
                                                        if($row["boardOwner"]=="OAM")
                                                        {
                                                           echo "<option value='OAM' selected>OAM</option>";
                                                       }else
                                                       {
                                                           echo "<option value='OAM'>OAM</option>";

                                                       }



                                                       if($row["boardOwner"]=="Factory")
                                                       {
                                                        echo "<option value='Factory' selected>Factory</option>";
                                                    }
                                                    else{
                                                        echo "<option value='Factory'>Factory</option>";
                                                    }




                                                    if($row["boardOwner"]=="Platform")
                                                    {
                                                        echo "<option value='Platform' selected>Platform</option>";
                                                    }
                                                    else{
                                                        echo "<option value='Platform'>Platform</option>";
                                                    }






                                                    if($row["boardOwner"]=="SDE")
                                                    {
                                                        echo "<option value='SDE' selected>SDE</option>";
                                                    }
                                                    else{
                                                        echo "<option value='SDE'>SDE</option>";
                                                    }






                                                    if($row["boardOwner"]=="Other")
                                                    {
                                                        echo "<option value='Other' selected>Other</option>";
                                                    }
                                                    else{
                                                        echo "<option value='Other'>Other</option>";
                                                    }


                                                    ?>
                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                </br>
                                <div class="row">
                                 <div class="col-sm-4 ">
                                    <div class="form-group">
                                        <input  type="submit" class="btn btn-primary btn-lg col-sm-6" value="Update Femto" name="update">
                                    </div>
                                </div>
                                <div class="col-sm-4 ">
                                    <div class="form-group">
                                        <input  type="submit" class="btn btn-primary btn-lg col-sm-6" value="Delete Femto" name="delete">
                                    </div>
                                </div>
                                <div class="col-sm-4 ">
                                    <div class="form-group">
                                        <input  type="button" class="btn btn-primary btn-lg col-sm-6" value="Cancel" onclick="showHideDiv();" name="clear">
                                    </div>
                                </div>

                            </div>&nbsp;
                            <div class="row"><div class="col-sm-4 "><label style="color: red">One Click Operation check twice before clicking.   </label></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <?php
}
}
else
{
    echo '<script type="text/javascript">',
    'error_report("No Femto Found","Input should contain Femto FSN", "warning");',
    '</script>';
}
}

?> 

</body>
</html>

<?php
if(isset($_POST["fsn"]))
{

    $noVal="NA";
        //assign user inputs to variables
    $ip=($_POST["fip"]==null|| $_POST["fip"]==" ")?$noVal:$_POST["fip"];
    $type=($_POST["ftype"]==null|| $_POST["ftype"]==" ")?$noVal:$_POST["ftype"];
    $mac=($_POST["fmac"]==null|| $_POST["fmac"]==" ")?$noVal:$_POST["fmac"];
    $fsn=($_POST["fsn"]==null|| $_POST["fsn"]==" ")?$noVal:$_POST["fsn"];
    $vendor=($_POST["fvendor"]==null|| $_POST["fvendor"]==" ")?$noVal:$_POST["fvendor"];
    $varient=($_POST["fvarient"]==null|| $_POST["fvarient"]==" ")?$noVal:$_POST["fvarient"];
    $id=($_POST["fid"]==null|| $_POST["fid"]==" ")?$noVal:$_POST["fid"];
    $hnb=($_POST["fhnb"]==null|| $_POST["fhnb"]==" ")?$noVal:$_POST["fhnb"];
    $tl=($_POST["ftl"]==null|| $_POST["ftl"]==" ")?$noVal:$_POST["ftl"];
    $bw=($_POST["fboardw"]==null|| $_POST["fboardw"]==" ")?$noVal:$_POST["fboardw"];

    include("../connection.php");
    if(isset($_POST["update"]))
    {
       $ub=$_SESSION['logedName'];
       $ud=date("Y-m-d H:i:s");
       $updateQuery="UPDATE femtodetails SET
       id='$id',femtoIP='$ip',femtoType='$type',MAC='$mac',FSN='$fsn',vendor='$vendor',varient='$varient',HNBUniqueId='$hnb',TestLine='$tl',boardOwner='$bw',lastUpdatedBy='$ub',updatedDate='$ud' WHERE FSN='$_SESSION[inputFSN]'";


       if(mysqli_query($con, $updateQuery))
       {
        echo '<script type="text/javascript">',
        'error_report("successfuly Updated","Data successfuly updated in database", "success");',
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
 if(isset($_POST["delete"]))
 {
    $deleteQuery="DELETE from femtodetails WHERE FSN='$_SESSION[inputFSN]'";
    if(mysqli_query($con, $deleteQuery))
    {
        echo '<script type="text/javascript">',
        'error_report("Deleted","Femto entry deleted in Database", "success");',
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
{
    echo '<script type="text/javascript">',
    'showHideDiv();',
    '</script>';
}

}

?>









