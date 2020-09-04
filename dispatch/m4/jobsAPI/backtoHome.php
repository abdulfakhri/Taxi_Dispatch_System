<?php
if(isset($_REQUEST['backtoJob'])){
    
    $phonelines = $_POST['phonelines'];
    
    $vehicle_type=$_POST['vehicle_type'];
    $phonelines = $_POST['phonelines'];
    $addressFrom = $_POST['src_addr'];
    $addressTo =$_POST['dest_addr'];
    $cross_street=$_POST['cross_street'];
    
    $fare=$_POST['fare'];
    $at=$_POST['at'];
    $service=$_POST['service'];
    $timing=$_POST['timing'];
    $time_assigned=$_POST['time_assigned'];
    $customer_name=$_POST['customer_name'];
    $customer_phone=$_POST['customer_phone'];
    $flight_no=$_POST['flight_no'];
    $assign_car=$_POST['assign_car'];
    $comment=$_POST['comment'];
    $distance_charge=$_POST['distance_charge'];
    $fmile_charge=$_POST['fmile_charge'];
    $api_key=$_SESSION['id'];

   

}
?> 