<?php
if(isset($_REQUEST['caljob'])){
    
    $phonelines = $_POST['phonelines'];
    
    $vehicle_type=$_POST['vehicle_type'];
    
    $phonelines = $_POST['phonelines'];
    
    $addressFrom = $_POST['src_addr'];
    
    $addressTo =$_POST['dest_addr'];
    
    $cross_street=$_POST['cross_street'];
    
    $fare=$_POST['fare'];
    
    $at=$_POST['at'];
    
    $service=$_POST['service'];
    
    $timing=$_POST['date_time'];
    
    $time_assigned=$_POST['time_assigned'];
    
    $customer_name=$_POST['customer_name'];
    
    $customer_phone=$_POST['customer_phone'];
    
    $flight_no=$_POST['flight_no'];
    
    $assign_car=$_POST['assign_car'];
    
    $comment=$_POST['comment'];
    
    $distance_charge=$_POST['distance_charge'];
    
    $fare_override=$_POST['fare_override'];
    
    $fmile_charge=$_POST['fmile_charge'];
    
    $api_key=$_SESSION['id'];
    
    $veh_number=$_POST['veh_number'];

   
    $d1=str_replace(" ","+",$addressTo);
    
    $p1=str_replace(" ","+",$addressFrom);

$url="https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$p1&destinations=$d1&key=AIzaSyA9Pyf9DzK853LRdgobgwCdMDbi5B-QUMY";


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
    list($distance,$u)=explode(' ',$dist,2);
    
    $distance;
  
  
  $tf=$veh_number*($fmile_charge+($distance_charge)*($distance-1));
  
  $Itf = intval($tf); 
  
  //$Itf = filter_var($tf, FILTER_SANITIZE_NUMBER_INT);


}
?>