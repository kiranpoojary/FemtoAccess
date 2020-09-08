<?php   
   
    $keyword = strval($_POST['query']);
    $search_param = "{$keyword}%";
    include("../connection.php");
   
    $sql = "SELECT * FROM femtodetails WHERE FSN LIKE  '$search_param' OR femtoIP LIKE '$search_param'";
    $result=mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $countryResult[] = $row["FSN"]."/".$row["femtoIP"]."(".$row["varient"].")";
        }
        echo json_encode($countryResult);
    }
    $con->close();
?>

