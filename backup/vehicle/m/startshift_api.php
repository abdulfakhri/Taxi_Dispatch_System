<?php 
include ($dbc);
if(isset($_POST['createjob'])) {

    $V1=$_POST['shift-time'];
    $shiftstarted=date("Y-m-d h:i");
    $V2=$_POST['job2'];
    $V3=$_POST['job3'];
    $V4=$_SESSION['car_id'];
    $api_key;
    $ow= $_SESSION['taxi_comp'];
    
$sql="INSERT INTO    
driver_status(
driver_id,
shift_started,
shift_end,
total_time,
car,
taxi_comp)
VALUES(
    '$api_key',
    '$shiftstarted',
    '$V1',
    '$V1',
    '$V4',
    '$ow')";
     $result=mysqli_query($conn, $sql);
    if ($result) {
		header("Location: /v/home.php?s=Shift Started");
		
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "Failed, Try Again"; 
    }
    mysqli_close($conn);
    
    
}
?>
