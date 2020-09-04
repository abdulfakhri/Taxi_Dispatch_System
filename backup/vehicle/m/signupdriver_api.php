<?php 
include ($dbc);
if(isset($_POST['createdriver'])) {
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
    $V1=$_POST['driver_name'];
    $V2=$_POST['driver_phone'];
    $V3=$_POST['driver_email'];
    $V4=$_POST['home_address'];
    //$V5=$_POST['car_id'];
    $V6=$_POST['driver_level'];
    $V7=$_POST['driving_license'];
    $V8=$_POST['operator_license'];
    $V9=$_POST['username'];
    $V10=$_POST['password'];
    $V11=$_POST['taxi_comp'];
 
    $CV1=$_POST['number'];
    $CV2=$_POST['call_sign'];
    $CV3=$_POST['passenger'];
    $CV4=$_POST['wheelchair'];
    $CV5=$_POST['bags'];
    $CV6=$_POST['type'];
    $CV7=$_POST['image'];
    $CV8=$_POST['color'];
    $CV9=$_POST['license_plate'];
 
    
$sql ="INSERT INTO    
taxi_drivers(
driver_name,
driver_phone,
driver_email,
home_address,
car_id,
driver_level,
driving_license,
operator_license,
username,
password,
taxi_comp
)
VALUES(
    '$V1',
    '$V2',
    '$V3',
    '$V4',
    '$CV9', 
    '$V6',
    '$V7',
    '$V8',
    '$V9',
    '$V10',
    '$V11'
    );";
    
$sql .="INSERT INTO    
vehicles(
number,
driver_license,
call_sign,
passenger,
wheelchair,
bags,
type,
color,
license_plate,
taxi_comp
)
VALUES(
    '$CV1',
    '$V7',
    '$CV2',
    '$CV3',
    '$CV4',
    '$CV5', 
    '$CV6',
    '$CV8',
    '$CV9',
    '$V11'
    )";
    
     $result= mysqli_multi_query($conn, $sql);
    if ($result != null) {
	 header("refresh: 4; /u/signin_d.php");
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("location: /u/signup.php"); 
    }
    mysqli_close($conn);
}
?>
