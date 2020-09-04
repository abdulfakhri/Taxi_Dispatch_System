<?php 
include ($dbc);
//fetching data in descending order (lastest entry first)
if(isset($_POST['finished'])) {
    
    $jobNo=$_GET['job_id'];
    $status="Finished";
    
    $car=$_SESSION['id'];
    $tc=$_SESSION['taxi_comp'];
    //$sql="UPDATE jobs SET job_status='$status' WHERE assign_car='$car' AND taxi_comp='$tc'";
    $sql="UPDATE jobs SET job_status='$status' WHERE job_id='$jobNo' AND taxi_comp='$tc'";
     $result=mysqli_query($conn, $sql);
    if ($result != null) {
	 header('Location: /vehicle/v/home.php');
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "Faild, Try Again Now";
    }
    mysqli_close($conn);
}
//////////////////////////////////////canceled
if(isset($_POST['canceled'])) {
    
    $jobNo=$_GET['job_id'];
    $status="Cancelled";
    
    $car=$_SESSION['id'];
    $taxi_comp=$_SESSION['taxi_comp'];
    $sql="UPDATE jobs SET job_status='$status' WHERE assign_car='$car' AND taxi_comp='$tc'";
     $result=mysqli_query($conn, $sql);
    if ($result != null) {
	 header('Location: /vehicle/v/home.php');
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "Faild, Try Again Now";
    }
    mysqli_close($conn);
}
if(isset($_POST['createurgentjob'])) {

    $src_addr=$_POST['src_addr'];
    $dest_addr=$_POST['dest_addr'];
    $passenger_no=$_POST['passenger_no'];
    $bags_no=$_POST['bags_no'];
    $wheelchair_no=$_POST['wheelchair_no'];
    $car_no=$_SESSION['id'];
    $duration=$_POST['duration'];
    $status="away";
    $assign_car=$_SESSION['id'];
    $taxi_comp=$_SESSION['taxi_comp'];
$sql="INSERT INTO    
drivers_busy(
src_addr,
dest_addr,
passenger_no,
bags_no,
wheelchair_no,
car_no,
duration,
status,
assign_car,
taxi_comp
)
VALUES(
    '$src_addr',
    '$dest_addr',
    '$passenger_no',
    '$bags_no',
    '$wheelchair_no',
    '$car_no',
    '$duration',
    '$status',
    '$assign_car',
    '$taxi_comp'
    )";
     $result=mysqli_query($conn, $sql);
    if ($result != null) {
	 header('Location: /vehicle/v/home.php');
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "Faild, Try Again Now";
    }
    mysqli_close($conn);
}

?>
