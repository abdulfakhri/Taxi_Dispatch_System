 <?php  
 include('/home/aidifxin/cloud/dispatch/c/api.php');
 
 include('/home/aidifxin/cloud/dispatch/c/c.php');

 include('/home/aidifxin/cloud/dispatch/c/connection.php');
   
 ?> 
<?php 

include ($dbc);
if(isset($_POST['createjob'])) {
    $status="Not Finished";
    $src_addr=$_POST['src_addr'];
    $dest_addr=$_POST['dest_addr'];
    $cross_street=$_POST['cross_street'];
    $at=$_POST['at'];
    $service=$_POST['service'];
    $stop1=$_POST['dest_addr2'];
    $stop2=$_POST['dest_addr3'];
    //$route=$_POST['route'];
    //$route=$api_key;
    //$timing=$_POST['timing'];
    $time_assigned=$_POST['time_assigned'];
    $customer_name=$_POST['customer_name'];
   // $customer_id=$_POST['customer_id'];
    $customer_email=$_POST['customer_email'];
    $customer_phone=$_POST['customer_phone'];
    $payment_amount=$_POST['payment_amount'];
  //  $payment_method=$_POST['payment_method'];
    $passenger_no=$_POST['passenger_no'];
    $bags_no=$_POST['bags_no'];
   // $wheelchair_no=$_POST['wheelchair_no'];
   // $vehicle_type=$_POST['vehicle_type'];
   // $assign_car=$_POST['assign_car'];
   // $assign_car_company=$_POST['assign_car_company'];
   // $tariff=$_POST['tariff'];
   // $duration=$_POST['duration'];
    //$priority=$_POST['priority'];
    $flight_no=$_POST['flight_no'];
    $room_no=$_POST['room_no'];
    $comment=$_POST['comment'];
    $distance=$_POST['distance'];
    $fare=$_POST['fare'];
    $api_key=$_SESSION['id'];
    //$api_key='9';
 // $cross_street=$_POST['cross_street'];
   // $at=$_POST['at'];
    //$service=$_POST['service'];
$sql="INSERT INTO    
jobs(
job_status,
src_addr,
cross_street,
at,
service,
dest_addr,
time_assigned,
customer_name,
customer_phone,
customer_email,
payment_amount,
vehicle_type,
assign_car,
flight_no,
room_no,
comment,
distance,
fare,
taxi_comp)
VALUES(
    '$status',
    '$src_addr',
    '$cross_street',
    '$at',
    '$service',
    '$dest_addr',
    '$time_assigned',
    '$customer_name',
    '$customer_phone',
    '$customer_email',
    '$payment_amount',
    '$vehicle_type',
    '$assign_car',
    '$flight_no',
    '$room_no',
    '$comment',
     '$distance',
     '$fare',
    '$api_key'
    );";
    
    $sql .="INSERT INTO customer(customer_name,customer_phone,customer_email,home_address,taxi_comp) 
    VALUES('$customer_name','$customer_phone','$customer_email', '$customer_phone',$api_key')
    ";
    
     $result=mysqli_multi_query($conn, $sql);
    //$result=mysqli_query($conn, $sql);
    if ($result != null) {
	 header("refresh: 4; /dispatch/v/home.php");
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("location: /dispatch/v/createjob.php"); 
    }
    mysqli_close($conn);
    
    
}

?>
