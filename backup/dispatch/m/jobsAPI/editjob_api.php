<?php
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 
include "$rootDir/connection.php"; 
/////////////////////////////////////////////////////////////////////////////////////////////////////////
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
    
    $timing=$_POST['date_time'];
  
    $time_assigned=$_POST['time_assigned'];
    
    $customer_name=$_POST['customer_name'];
    
    $customer_phone=$_POST['customer_phone'];
    
    $dr=$_POST['assign_car'];
    
    list($assign_car,$report,$driver_license,$operator_license)=explode("&",$dr,4);
    
    $assign_car;
    
    $driver_report=$report;
    
    $driver_license;
    
    $operator_license;
    
    
    if($dr=="Not Assigned"){
        
        $status="Not Assigned";
        
    }else if($assign_car!=null) {
    
    $status="Assigned";
    
    }
    
    $comment=$_POST['comment'];
    
    $distance_charge=$_POST['distance_charge'];
    
    $fmile_charge=$_POST['fmile_charge'];
    
    $distance=$_POST['distance'];
    
    $api_key=$_SESSION['id'];
    
   
    
$sql="
UPDATE jobs SET 
phone_line='$phonelines',
driver_report='$driver_report',
driver_license='$driver_license',
operator_license='$operator_license',
job_status='$status',
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
fare='$fare',
confirmedId='$cf',
driverId='$assign_car'
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
//////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['savejobE'])){
    
    $jobId = $_POST['job_id'];
    
    $phonelines = $_POST['phonelines'];
    
    $addressFrom = $_POST['src_addr'];
    
    $enAddressFrom = urlencode( $addressFrom);
    
    $cross_street=$_POST['cross_street'];
    
    $at=$_POST['at'];
    
    $service=$_POST['service'];
    
    $vehicle_type=$_POST['vehicle_type'];
   
    $addressTo =$_POST['dest_addr'];
    
    $enAddressTo= urlencode($addressTo);
    
    $fare=$_POST['fare'];
    
    $timing=$_POST['date_time'];
  
    $time_assigned=$_POST['time_assigned'];
    
    $customer_name=$_POST['customer_name'];
    
    $customer_phone=$_POST['customer_phone'];
    
    $assign_car=$_POST['assign_car'];
    
    if($assign_car==="Not Assigned"){
        
        $status="Not Assigned";
        
    }else {
    
    $status="Not Assigned";
    
    }
    $comment=$_POST['comment'];
    
    $distance_charge=$_POST['distance_charge'];
    
    $fmile_charge=$_POST['fmile_charge'];
    
    $distance=$_POST['distance'];
    
    $api_key=$_SESSION['id'];
    
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
fare='$fare',
driverId='$assign_car'
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
////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['canceljobE'])){
    
    $jobId = $_POST['job_id'];
    
    $status="canceled";
   
    $api_key=$_SESSION['id'];
    
$sql="
UPDATE jobs SET 
job_status='$status'
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