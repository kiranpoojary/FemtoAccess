<style type="text/css">
  .MyModal {

     background: #FFF;
     padding: 20px;
     width:850px;
     max-width: 950px;
     margin: 0%;
 }
 .tooltip-inner {
     max-width: 950px;
     width: 750px;
 }	

 td{
     color: black;
     border-color: 1px black;
 }

 .thID{
     background-color: yellow;
     font-weight: bold;
     color: black;

 }
</style>
<?php
date_default_timezone_set('Asia/Kolkata');



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



if(isset($_POST["fsn"]))
{
	$TodayDate=date("Y-m-d");

	$datetime = new DateTime($TodayDate);
	$datetime->modify('+1 day');
	$tomorrow=$datetime->format('Y-m-d');

	$datetime = new DateTime($TodayDate);
	$datetime->modify('+2 day');
	$dayaftertomorrow=$datetime->format('Y-m-d');

	$datetime = new DateTime($TodayDate);
	$datetime->modify('+3 day');
	$twodaysaftertomorrow=$datetime->format('Y-m-d');

	$datetime = new DateTime($TodayDate);
	$datetime->modify('-1 day');
	$yesterday=$datetime->format('Y-m-d');

	$datetime = new DateTime($TodayDate);
	$datetime->modify('-2 day');
	$daybeforeyesterday=$datetime->format('Y-m-d');

	$datetime = new DateTime($TodayDate);
	$datetime->modify('-3 day');
	$twodaysbeforeyesterday=$datetime->format('Y-m-d');





	$fsn=$_POST["fsn"];
	include('connection.php');
	$output = '';
	$getIPQuery = "SELECT femtoIP FROM femtodetails WHERE FSN='$fsn'";
	$getIP = mysqli_query($con, $getIPQuery);
	while($rows = mysqli_fetch_array($getIP))
	{
		$ip=$rows["femtoIP"];
	}






	?>

	<div>

        <table class="table table-hover" style="background-color: white;" border="1" >
           <thead class="thead-dark">
              <tr class="thID">
                 <th scope="col">Slots/Dates</th>
                 <th scope="col"><?php echo $twodaysbeforeyesterday; ?></th>
                 <th scope="col"><?php echo $daybeforeyesterday; ?></th>
                 <th scope="col"><?php echo $yesterday; ?></th>
                 <th scope="col" bgcolor="lightgreen"><?php echo $TodayDate; ?></th>
                 <th scope="col"><?php echo $tomorrow; ?></th>
                 <th scope="col"><?php echo $dayaftertomorrow; ?></th>
                 <th scope="col"><?php echo $twodaysaftertomorrow; ?></th>
             </tr>
         </thead>

         <tr>
          <th scope="row" class="thID">00:00-02:00</th>
          <td><?php echo getBookedUser($fsn,$twodaysbeforeyesterday,"A"); ?></td>
          <td><?php echo getBookedUser($fsn,$daybeforeyesterday,"A"); ?></td>
          <td><?php echo getBookedUser($fsn,$yesterday,"A"); ?></td>
          <td bgcolor="lightgreen"><?php echo getBookedUser($fsn,$TodayDate,"A"); ?></td>
          <td><?php echo getBookedUser($fsn,$tomorrow,"A"); ?></td>
          <td><?php echo getBookedUser($fsn,$dayaftertomorrow,"A"); ?></td>
          <td><?php echo getBookedUser($fsn,$twodaysaftertomorrow,"A"); ?></td>
      </tr> 
      <tr>
          <th scope="row" class="thID">02:00-04-00</th>
          <td style="columns: black"><?php echo getBookedUser($fsn,$twodaysbeforeyesterday,"B"); ?></td>
          <td><?php echo getBookedUser($fsn,$daybeforeyesterday,"B"); ?></td>
          <td><?php echo getBookedUser($fsn,$yesterday,"B"); ?></td>
          <td bgcolor="lightgreen"><?php echo getBookedUser($fsn,$TodayDate,"B"); ?></td>
          <td><?php echo getBookedUser($fsn,$tomorrow,"B"); ?></td>
          <td><?php echo getBookedUser($fsn,$dayaftertomorrow,"B"); ?></td>
          <td><?php echo getBookedUser($fsn,$twodaysaftertomorrow,"B"); ?></td>
      </tr>
      <tr>
          <th scope="row" class="thID">04:00-:06:00</th>
          <td><?php echo getBookedUser($fsn,$twodaysbeforeyesterday,"C"); ?></td>
          <td><?php echo getBookedUser($fsn,$daybeforeyesterday,"C"); ?></td>
          <td><?php echo getBookedUser($fsn,$yesterday,"C"); ?></td>
          <td bgcolor="lightgreen"><?php echo getBookedUser($fsn,$TodayDate,"C"); ?></td>
          <td><?php echo getBookedUser($fsn,$tomorrow,"C"); ?></td>
          <td><?php echo getBookedUser($fsn,$dayaftertomorrow,"C"); ?></td>
          <td><?php echo getBookedUser($fsn,$twodaysaftertomorrow,"C"); ?></td>
      </tr>
      <tr>
          <th scope="row" class="thID">06:00-08:00</th>
          <td><?php echo getBookedUser($fsn,$twodaysbeforeyesterday,"D"); ?></td>
          <td><?php echo getBookedUser($fsn,$daybeforeyesterday,"D"); ?></td>
          <td><?php echo getBookedUser($fsn,$yesterday,"D");?></td>
          <td bgcolor="lightgreen"><?php echo getBookedUser($fsn,$TodayDate,"D"); ?></td>
          <td><?php echo getBookedUser($fsn,$tomorrow,"D"); ?></td>
          <td><?php echo getBookedUser($fsn,$dayaftertomorrow,"D"); ?></td>
          <td><?php echo getBookedUser($fsn,$twodaysaftertomorrow,"D"); ?></td>
      </tr> 
      <tr>
          <th scope="row" class="thID">08:00-10:00</th>
          <td><?php echo getBookedUser($fsn,$twodaysbeforeyesterday,"E"); ?></td>
          <td><?php echo getBookedUser($fsn,$daybeforeyesterday,"E"); ?></td>
          <td><?php echo getBookedUser($fsn,$yesterday,"E"); ?></td>
          <td bgcolor="lightgreen"><?php echo getBookedUser($fsn,$TodayDate,"E"); ?></td>
          <td><?php echo getBookedUser($fsn,$tomorrow,"E"); ?></td>
          <td><?php echo getBookedUser($fsn,$dayaftertomorrow,"E"); ?></td>
          <td><?php echo getBookedUser($fsn,$twodaysaftertomorrow,"E"); ?></td>
      </tr>
      <tr>
          <th scope="row" class="thID">10:00-12:00</th>
          <td><?php echo getBookedUser($fsn,$twodaysbeforeyesterday,"F"); ?></td>
          <td><?php echo getBookedUser($fsn,$daybeforeyesterday,"F"); ?></td>
          <td><?php echo getBookedUser($fsn,$yesterday,"F"); ?></td>
          <td bgcolor="lightgreen"><?php echo getBookedUser($fsn,$TodayDate,"F"); ?></td>
          <td><?php echo getBookedUser($fsn,$tomorrow,"F"); ?></tD>
             <td><?php echo getBookedUser($fsn,$dayaftertomorrow,"F"); ?></td>
             <td><?php echo getBookedUser($fsn,$twodaysaftertomorrow,"F"); ?></td>
         </tr>
         <tr>
             <th scope="row" class="thID">12:00-14:00</th>
             <td><?php echo getBookedUser($fsn,$twodaysbeforeyesterday,"G"); ?></td>
             <td><?php echo getBookedUser($fsn,$daybeforeyesterday,"G"); ?></td>
             <td><?php echo getBookedUser($fsn,$yesterday,"G"); ?></td>
             <td bgcolor="lightgreen"><?php echo getBookedUser($fsn,$TodayDate,"G"); ?></td>
             <td><?php echo getBookedUser($fsn,$tomorrow,"G"); ?></td>
             <td><?php echo getBookedUser($fsn,$dayaftertomorrow,"G"); ?></td>
             <td><?php echo getBookedUser($fsn,$twodaysaftertomorrow,"G"); ?></td>
         </tr> 
         <tr>
             <th scope="row" class="thID">14:00-16:00</th>
             <td><?php echo getBookedUser($fsn,$twodaysbeforeyesterday,"H"); ?></td>
             <td><?php echo getBookedUser($fsn,$daybeforeyesterday,"H"); ?></td>
             <td><?php echo getBookedUser($fsn,$yesterday,"H"); ?></td>
             <td bgcolor="lightgreen"><?php echo getBookedUser($fsn,$TodayDate,"H"); ?></td>
             <td><?php echo getBookedUser($fsn,$tomorrow,"H"); ?></td>
             <td><?php echo getBookedUser($fsn,$dayaftertomorrow,"H"); ?></td>
             <td><?php echo getBookedUser($fsn,$twodaysaftertomorrow,"H"); ?></td>
         </tr>
         <tr>
             <th scope="row" class="thID">16:00-18:00</th>
             <td><?php echo getBookedUser($fsn,$twodaysbeforeyesterday,"I"); ?></td>
             <td><?php echo getBookedUser($fsn,$daybeforeyesterday,"I"); ?></td>
             <td><?php echo getBookedUser($fsn,$yesterday,"I"); ?></td>
             <td bgcolor="lightgreen"><?php echo getBookedUser($fsn,$TodayDate,"I"); ?></td>
             <td><?php echo getBookedUser($fsn,$tomorrow,"I"); ?></td>
             <td><?php echo getBookedUser($fsn,$dayaftertomorrow,"I"); ?></td>
             <td><?php echo getBookedUser($fsn,$twodaysaftertomorrow,"I"); ?></td>
         </tr>
         <tr>
             <th scope="row" class="thID">18:00-20:00</th>
             <td><?php echo getBookedUser($fsn,$twodaysbeforeyesterday,"J"); ?></td>
             <td><?php echo getBookedUser($fsn,$daybeforeyesterday,"J"); ?></td>
             <td><?php echo getBookedUser($fsn,$yesterday,"J"); ?></td>
             <td bgcolor="lightgreen"><?php echo getBookedUser($fsn,$TodayDate,"J"); ?></td>
             <td><?php echo getBookedUser($fsn,$tomorrow,"J"); ?></td>
             <td><?php echo getBookedUser($fsn,$dayaftertomorrow,"J"); ?></td>
             <td><?php echo getBookedUser($fsn,$twodaysaftertomorrow,"J"); ?></td>
         </tr> 
         <tr>
             <th scope="row" class="thID">20:00-22:00</th>
             <td><?php echo getBookedUser($fsn,$twodaysbeforeyesterday,"K"); ?></td>
             <td><?php echo getBookedUser($fsn,$daybeforeyesterday,"K"); ?></td>
             <td><?php echo getBookedUser($fsn,$yesterday,"K"); ?></td>
             <td bgcolor="lightgreen"><?php echo getBookedUser($fsn,$TodayDate,"K"); ?></td>
             <td><?php echo getBookedUser($fsn,$tomorrow,"K"); ?></td>
             <td><?php echo getBookedUser($fsn,$dayaftertomorrow,"K"); ?></td>
             <td><?php echo getBookedUser($fsn,$twodaysaftertomorrow,"K"); ?></td>
         </tr>
         <tr>
             <th scope="row" class="thID">22:00-00:00</th>
             <td><?php echo getBookedUser($fsn,$twodaysbeforeyesterday,"L"); ?></td>
             <td><?php echo getBookedUser($fsn,$daybeforeyesterday,"L"); ?></td>
             <td><?php echo getBookedUser($fsn,$yesterday,"L"); ?></td>
             <td bgcolor="lightgreen"><?php echo getBookedUser($fsn,$TodayDate,"L"); ?></td>
             <td><?php echo getBookedUser($fsn,$tomorrow,"L"); ?></td>
             <td><?php echo getBookedUser($fsn,$dayaftertomorrow,"L"); ?></td>
             <td><?php echo getBookedUser($fsn,$twodaysaftertomorrow,"L"); ?></td>
         </tr>
     </table>  			
 </div>

 <?php
  echo '<script type="text/javascript">',
           'error_report("Something Went Wrong","please try again", "error");',
           '</script>';
}
else
{
    echo '<script type="text/javascript">',
           'error_report("Something Went Wrong","please try again", "error");',
           '</script>';
}
?>
