<?php 
include ($dbc);
if(isset($_POST['createdvehicle'])) {
    /*
   $dv1="driver_name";
   $dv2="driver_phone";
   $dv3="driver_email";
   $dv4="home_address";
   $dv5="car_id";
   $dv6="driver_level";
   $dv7="driving_license";
   $dv8="operator_license";
   $dv9="username";
   $dv10="password";
   */
    $V1=$_POST['number'];
    $V2=$_POST['call_sign'];
    $V3=$_POST['passenger'];
    $V4=$_POST['wheelchair'];
    $V5=$_POST['bags'];
    $V6=$_POST['type'];
    $V7=$_POST['image'];
    $V8=$_POST['color'];
    $V9=$_POST['license_plate'];
    $V=$_SESSION['id'];
$sql="INSERT INTO    
vehicles(
number,
call_sign,
passenger,
wheelchair,
bags,
type,
color,
license_plate,
disp_id
)
VALUES(
    '$V1',
    '$V2',
    '$V3',
    '$V4',
    '$V5', 
    '$V6',
    '$V8',
    '$V9',
    '$V'
    )";
    
     $result=mysqli_query($conn, $sql);
    if ($result != null) {
	 header("refresh: 4; /w/v/home.php");
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("location: /w/v/drivers.php"); 
    }
    mysqli_close($conn);
}
?>
