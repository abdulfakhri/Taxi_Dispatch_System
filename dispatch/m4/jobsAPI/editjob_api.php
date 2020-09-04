<?php include ('../c/api.php');?>

<?php

include_once('../c/connection.php');

if(isset($_POST['dispatchjobE'])){
    
    

    $jobId = $_POST['job_id'];
    
    
    $phonelines = $_POST['phonelines'];
    
    
    $addressFrom = $_POST['src_addr'];
    
    $enAddressFrom = urlencode( $addressFrom);
    
    $cross_street=$_POST['cross_street'];
    
    $at=$_POST['at'];
    
    $service=$_POST['service'];
    
    $cf="not confirmed";

    $vehicle_type=$_POST['vehicle_type'];
   
    $addressTo =$_POST['dest_addr'];
    
    $enAddressTo= urlencode($addressTo);
    
    $fare=$_POST['fare'];
    
    $timing=$_POST['timing'];
  
    $time_assigned=$_POST['time_assigned'];
    
    $customer_name=$_POST['customer_name'];
    
    $customer_phone=$_POST['customer_phone'];
    
    $assign_car=$_POST['assign_car'];
    
    if($assign_car==="Not Assigned"){
        
        $status="Not Assigned";
        
    }else {
    
    $status="Assigned";
    
    }
    
    $comment=$_POST['comment'];
    
    $distance_charge=$_POST['distance_charge'];
    
    $fmile_charge=$_POST['fmile_charge'];
    
    $distance=$_POST['distance'];
    
    $api_key=$_SESSION['id'];
    

$mysqli = new mysqli("localhost","aidifxin_abfa","!@#123qweasdzxc","aidifxin_dispatch");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

    
// Perform a query, check for error
$sql="
UPDATE jobs SET 
phone_line='$phonelines',
jobDis='$status',
src_addr='$addressFrom',
cross_street='$cross_street',
at='$at',
service='$service',
dest_addr='$addressTo',
esrc_addr='$enAddressFrom',
edest_addr='$enAddressTo',
date_time='$timing',
time_assigned='$time_assigned',
customer_name='$customer_name',
customer_phone='$customer_phone',
vehicle_type='$vehicle_type',
comment='$comment',
distance='$distance',
first_mile='$fmile_charge',
distance_charge='$distance_charge',
fare='$fare',
driverId='$assign_car',
confirmedId='$cf'
WHERE job_id='$jobId' AND taxi_comp='$api_key'";

$re=mysqli_query($conn,$sql);
//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
if($re!=null){
    ?>
   <script>

      location.replace("/dispatch/v/dashboard.php");
      </script>
     <?php
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   
    
   
    echo "Faild, Try Again";


    }
    mysqli_close($conn);
}
if(isset($_POST['savejobE'])){
    
    

    $jobId = $_POST['job_id'];
    
    
    $phonelines = $_POST['phonelines'];
    
    $status="Assigned";
    
    $addressFrom = $_POST['src_addr'];
    
    $enAddressFrom = urlencode( $addressFrom);
    
    $cross_street=$_POST['cross_street'];
    
    $at=$_POST['at'];
    
    $service=$_POST['service'];
    
    $cf="not confirmed";

    $vehicle_type=$_POST['vehicle_type'];
   
    $addressTo =$_POST['dest_addr'];
    
    $enAddressTo= urlencode($addressTo);
    
    $fare=$_POST['fare'];
    
    $timing=$_POST['timing'];
  
    $time_assigned=$_POST['time_assigned'];
    
    $customer_name=$_POST['customer_name'];
    
    $customer_phone=$_POST['customer_phone'];
    
    if($assign_car==="Not Assigned"){
        
        $status="Not Assigned";
        
    }else {
    
    $status="Assigned";
    
    }
    
    $comment=$_POST['comment'];
    
    $distance_charge=$_POST['distance_charge'];
    
    $fmile_charge=$_POST['fmile_charge'];
    
    $distance=$_POST['distance'];
    
    $api_key=$_SESSION['id'];
    

$mysqli = new mysqli("localhost","aidifxin_abfa","!@#123qweasdzxc","aidifxin_dispatch");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

    
// Perform a query, check for error
$sql="
UPDATE jobs SET 
phone_line='$phonelines',
jobDis='$status',
src_addr='$addressFrom',
cross_street='$cross_street',
at='$at',
service='$service',
dest_addr='$addressTo',
esrc_addr='$enAddressFrom',
edest_addr='$enAddressTo',
date_time='$timing',
time_assigned='$time_assigned',
customer_name='$customer_name',
customer_phone='$customer_phone',
vehicle_type='$vehicle_type',
comment='$comment',
distance='$distance',
first_mile='$fmile_charge',
distance_charge='$distance_charge',
fare='$fare',
driverId='$assign_car',
confirmedId='$cf'
WHERE job_id='$jobId' AND taxi_comp='$api_key'";

$re=mysqli_query($conn,$sql);
//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
if($re!=null){
    ?>
   <script>

      location.replace("/dispatch/v/dashboard.php");
      </script>
     <?php
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   
    
   
    echo "Faild, Try Again";


    }
    mysqli_close($conn);
}
?>
