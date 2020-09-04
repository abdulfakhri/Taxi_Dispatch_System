<?php 
if(isset($_POST['dispatchjob'])) {
    
    $jtype="dispatch";
    
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
    
    $kdate=date("d/m/Y");
    
   
$sql="INSERT INTO    
jobs(
jtype,
phone_line, 
jobDis,
src_addr,
cross_street,
at,
service,
dest_addr,
esrc_addr,
edest_addr,
date_time,
time_assigned,
customer_name,
customer_phone,
vehicle_type,
comment,
distance,
first_mile,
distance_charge,
fare,
driverId,
confirmedId,
kdate,
taxi_comp)
VALUES(
    '$jtype',
    '$phonelines',
    '$status',
    '$addressFrom',
    '$cross_street',
    '$at',
    '$service',
    '$addressTo',
    '$enAddressFrom',
    '$enAddressTo',
    '$timing',
    '$time_assigned',
    '$customer_name',
    '$customer_phone',
    '$vehicle_type',
    '$comment',
    '$distance',
    '$fmile_charge',
    '$distance_charge',
    '$fare',
    '$assign_car',
    '$cf',
    '$kdate',
    '$api_key'
    );";
    
     $sql .="INSERT INTO fares(car_class,pick_up,drop_off,distance_charg,first_mile,total_fare,distance,taxi_comp)
      VALUES('$vehicle_type','$addressFrom','$addressTo','$distance_charge','$distance_charge','$fare','$distance','$api_key');"; 
    
  
    
     $sql .="INSERT INTO customer(customer_name,customer_phone,customer_email,home_address,taxi_comp) 
    VALUES('$customer_name','$customer_phone','$customer_phone', '$customer_phone','$api_key');"; 
   
     $result=mysqli_multi_query($conn, $sql);
    //$result=mysqli_query($conn, $sql);
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    if ($result != null) {
        ?>
	   <script>

      location.replace("/dispatch/v/dashboard.php");
      </script>
	
	<?php
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    ?>
    
   
    <script>

    location.replace("/dispatch/v/cdjobs.php");
</script>

<?php
    }
    mysqli_close($conn);
}
if(isset($_POST['savejob'])) {
    $jtype="save";
    
    $phonelines = $_POST['phonelines'];
    
    $status="Not Assigned";
    
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
    
    $kdate=date("d/m/Y");
   
$sql="INSERT INTO    
jobs(
jtype,
phone_line, 
jobDis,
src_addr,
cross_street,
at,
service,
dest_addr,
esrc_addr,
edest_addr,
date_time,
time_assigned,
customer_name,
customer_phone,
vehicle_type,
comment,
distance,
first_mile,
distance_charge,
fare,
driverId,
confirmedId,
kdate,
taxi_comp)
VALUES(
    '$jtype',
    '$phonelines',
    '$status',
    '$addressFrom',
    '$cross_street',
    '$at',
    '$service',
    '$addressTo',
    '$enAddressFrom',
    '$enAddressTo',
    '$timing',
    '$time_assigned',
    '$customer_name',
    '$customer_phone',
    '$vehicle_type',
    '$comment',
    '$distance',
    '$fmile_charge',
    '$distance_charge',
    '$fare',
    '$assign_car',
    '$cf',
    '$kdate',
    '$api_key'
    );";
    
     $sql .="INSERT INTO fares(car_class,pick_up,drop_off,distance_charg,first_mile,total_fare,distance,taxi_comp)
      VALUES('$vehicle_type','$addressFrom','$addressTo','$distance_charge','$distance_charge','$fare','$distance','$api_key');"; 
    
  
    
     $sql .="INSERT INTO customer(customer_name,customer_phone,customer_email,home_address,taxi_comp) 
    VALUES('$customer_name','$customer_phone','$customer_phone', '$customer_phone','$api_key');"; 
   
     $result=mysqli_multi_query($conn, $sql);
    //$result=mysqli_query($conn, $sql);
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    if ($result != null) {
        ?>
	   <script>

      location.replace("/dispatch/v/dashboard.php");
      </script>
	
	<?php
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    ?>
    
   
    <script>

    location.replace("/dispatch/v/cdjobs.php");
</script>

<?php
    }
    mysqli_close($conn);
}
?>