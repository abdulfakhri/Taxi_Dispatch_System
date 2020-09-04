<?php 
include ($dbc);
//fetching data in descending order (lastest entry first)
if(isset($_POST['finished'])) {

    $status="Finished";
    
    $car=$_SESSION['id'];
    $taxi_comp=$_SESSION['taxi_comp'];
$sql="UPDATE drivers_away SET
away_status='$status'
WHERE
car='$car'
And status='away'
";
     $result=mysqli_query($conn, $sql);
    if ($result != null) {
	 header('Location: /vehicle/v/home.php');
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "Faild, Try Again Now";
    }
    mysqli_close($conn);
}
if(isset($_POST['driverAway'])) {

    $status="Away";
    $duration=$_POST['duration'];
    $assign_car=$_SESSION['id'];
    $taxi_comp=$_SESSION['taxi_comp'];
$sql="INSERT INTO    
drivers_away(
driver_id,
away_status,
away_duration,
car,
taxi_comp
)
VALUES(
    '$assign_car',
    '$status',
    '$duration',
    '$assign_car',
    '$taxi_comp'
    )";
     $result=mysqli_query($conn, $sql);
    if ($result != null) {
	 header('Location: /vehicle/v/home.php?s=Started&st=Finish');
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "Faild, Try Again Now";
    }
    mysqli_close($conn);
}
?>
