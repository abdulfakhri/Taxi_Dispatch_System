<?php include ('../c/api.php');?>
<?php include('/dispatch/m/jobsAPI/cjob_api.php');?>
<?php include ('../c/nav/createjob-style.php');?>
<?php include ('../c/createjobSource.php');?>
<?php include ('createjb.php');?>
<?php include ('mapApi.php');?>
<?php include ('../c/c.php');?>
<?php include('/dispatch/c/connection.php');?> 
<?php include ('../c/nav/createjob-style.php');?>
<?php include ('../c/nav/style.php');?>
<?php include ('../c/nav/n1-api.php');?>
<?PHP include($nav);?>
<?php include('/dispatch/m/jobsAPI/AddAutoCompleteAPI.php');?>
<?php include('/dispatch/m/jobsAPI/cjob_api.php');?>
<?php include ('../c/nav/createjob-style.php');?>
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
    
    $timing=$_POST['timing'];
    
    $time_assigned=$_POST['time_assigned'];
    
    $customer_name=$_POST['customer_name'];
    
    $customer_phone=$_POST['customer_phone'];
    
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
    $duration = $response_a['rows'][0]['elements'][0]['duration']['text'];
    list($distance,$u)=explode(' ',$dist,2);
    
    $distance;
    
    $tf=$veh_number*($fmile_charge+($distance_charge)*($distance-1));
  
    $Itf = intval($tf); 
    $totalFare=$Itf;


   
    }    
    
if(isset($_REQUEST['recaljob'])){
    
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
    $duration = $response_a['rows'][0]['elements'][0]['duration']['text'];
    list($distance,$u)=explode(' ',$dist,2);
    
    $distance;
    
    $tf=$veh_number*($fmile_charge+($distance_charge)*($distance-1));
  
    $Itf = intval($tf); 
    $totalFare=$Itf;

    }
    ?>

<!-----------------------------Fetch Lines--------------------------------------------------------------------->  

<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","/dispatch/m/jobsAPI/loadlinesdata.php?q="+str,true);
  xmlhttp.send();
}
</script>
<style>


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  padding-top: 10px; /* Location of the box */
  padding-left: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  left: 20%;
  top: 20%;
  right:20%;
  bottom:20%;
  width: 50%; /* Full width */
  height: 50%; /* Full height */
  background-color: #001; /* Fallback color */
  border:1px solid #fff;
  border-radius: 5px;
 
}

/* Modal Content */
.modal-content {
  background-color: ;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: ;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: ;
  text-decoration: none;
  cursor: pointer;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
 <div id="customerModal" class="modal">
  <button id="close">x</button>
  
  
    
</div>

<body>
<?php 
$databaseHost = 'localhost';
$databaseName = 'jorrog3_dispatch';
$databaseUsername = 'jorrog3_dispatch';
$databasePassword = '!@#123qweasdzxc';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

if(isset($_POST['dispatchjob'])) {
    
    $jtype="dispatch";
    
    $phonelines = $_POST['phonelines'];
    
    $no_veh = $_POST['veh_number'];
    
    $duration= $_POST['duration'];
    
    $fare_override= $_POST['fare_override'];
     
    $pickup = $_POST['src_addr'];
    
    //$enAddressFrom = urlencode($pickup);
    
    $cross_street=$_POST['cross_street'];
    
    $at=$_POST['at'];
    
    $service=$_POST['service'];
    
    
    
    $cf="not confirmed";

    $vehicle_type=$_POST['vehicle_type'];
   
    $dest =$_POST['dest_addr'];
    
    //$enAddressTo= urlencode($dest);
    
    $enAddressFrom=str_replace(" ","+",$pickup);
    
    $enAddressTo=str_replace(" ","+",$dest);

    
    $fare=$_POST['fare'];
    
    $timing=$_POST['timing'];
  
    $time_assigned=$_POST['time_assigned'];
    
    $customer_name=$_POST['customer_name'];
    
    $customer_phone=$_POST['customer_phone'];
    
    $dr=$_POST['assign_car'];
    
    list($assign_car,$report,$driver_license,$operator_license)=explode("&",$dr,4);
    
    if($dr==="Not Assigned"){
        
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
    
    $driver_report=$report;
    
    $driver_license;
    
    $operator_license;
    
   // $res2["driving_license"]."&".$res2["operator_license"]
   
$sql="INSERT INTO    
jobs(
driver_report,
driver_license,
operator_license,
jtype,
phone_line, 
jobDis,
job_status,
no_veh,
fare_override,
duration,
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
    '$driver_report',
    '$driver_license',
    '$operator_license',
    '$jtype',
    '$phonelines',
    '$status',
    '$status',
    '$no_veh',
    '$fare_override',
    '$duration',
    '$pickup',
    '$cross_street',
    '$at',
    '$service',
    '$dest',
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
       echo "Not Inserted";
   
    }
    mysqli_close($conn);
}
if(isset($_POST['savejob'])) {
    
    $jtype="save";
    
    $phonelines = $_POST['phonelines'];
    
    $no_veh = $_POST['veh_number'];
    
    $duration= $_POST['duration'];
    
    $fare_override= $_POST['fare_override'];
     
    $pickup = $_POST['src_addr'];
    
    //$enAddressFrom = urlencode($pickup);
    
    $cross_street=$_POST['cross_street'];
    
    $at=$_POST['at'];
    
    $service=$_POST['service'];
    
    $cf="not confirmed";

    $vehicle_type=$_POST['vehicle_type'];
   
    $dest =$_POST['dest_addr'];
    
    //$enAddressTo= urlencode($dest);
    
    $enAddressFrom=str_replace(" ","+",$pickup);
    
    $enAddressTo=str_replace(" ","+",$dest);

    
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
job_status,
no_veh,
fare_override,
duration,
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
    '$status',
    '$no_veh',
    '$fare_override',
    '$duration',
    '$pickup',
    '$cross_street',
    '$at',
    '$service',
    '$dest',
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
       echo "Not Inserted";
   
    }
    mysqli_close($conn);
}

if(isset($_POST['duplicate'])) {
     $jtype="save";
    
     $phonelines = $_POST['phonelines'];
    
    $no_veh = $_POST['veh_number'];
    
    $duration= $_POST['duration'];
    
    $fare_override= $_POST['fare_override'];
     
    $pickup = $_POST['src_addr'];
    
    //$enAddressFrom = urlencode($pickup);
    
    $cross_street=$_POST['cross_street'];
    
    $at=$_POST['at'];
    
    $service=$_POST['service'];
    
    $cf="not confirmed";

    $vehicle_type=$_POST['vehicle_type'];
   
    $dest =$_POST['dest_addr'];
    
    //$enAddressTo= urlencode($dest);
    
    $enAddressFrom=str_replace(" ","+",$pickup);
    
    $enAddressTo=str_replace(" ","+",$dest);

    
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
job_status,
no_veh,
fare_override,
duration,
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
    '$status',
    '$no_veh',
    '$fare_override',
    '$duration',
    '$pickup',
    '$cross_street',
    '$at',
    '$service',
    '$dest',
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
    
    
    $sql .="INSERT INTO    
jobs(
jtype,
phone_line, 
jobDis,
job_status,
no_veh,
fare_override,
duration,
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
    '$status',
    '$no_veh',
    '$fare_override',
    '$duration',
    '$pickup',
    '$cross_street',
    '$at',
    '$service',
    '$dest',
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
     //$result1=mysqli_query($conn, $sql1);
   // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    if ($result!= null) {
    ?>
    
    <script>

      location.replace("/dispatch/v/dashboard.php");
      
     </script>
        
    <?php    
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       echo "Not Inserted";
   
    }
    mysqli_close($conn);
}

?>
<!-----------------------------Fetch Lines--------------------------------------------------------------------->  
<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);

include "$rootDir/dispatch/m/jobsAPI/loadLinesScript.php";
include "$rootDir/dispatch/m/jobsAPI/AddAutoCompleteAPI.php";
//include "$rootDir/dispatch/m/jobsAPI/calculateFareAPI.php";

?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9Pyf9DzK853LRdgobgwCdMDbi5B-QUMY&libraries=places"></script>
<script>

            var autocomplete;
            var autocomplete1;
          
            
            function initialize() {
                
              autocomplete = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
                  { types: ['geocode'] });
                  
              google.maps.event.addListener(autocomplete, 'place_changed', function() {
              });
              
              autocomplete = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete1')),
                  { types: ['geocode'] });
                  
              google.maps.event.addListener(autocomplete1, 'place_changed', function() {
              });
              
            }

</script>
<!-------------------------------------------------------------------------------------------------------------->    
<!--<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <div class="overlay-content">-->
   <body onload="initialize()" 
     <p align="right"><a href="/dispatch/v/dashboard.php">X</a></p>
      <div class="container-createjob">
           
     
      <div class="col-lg-4" style="background-color:;  border-radius:5px;width:30%;height:80%; border:1px solid #ccc">

        <form action="" method="POST" style="border:px solid #ccc"> 
        <br></br>
        <label class="">Select Line#:</label><br>
         <select class="selectT-Mini" name="phonelines" onchange="showUser(this.value)">
        <option value="<?php echo $phonelines;?>"><?php echo $phonelines;?></option>
        
        <option value="1">L1</option>
        <option value="2">L2</option>
        <option value="3">L3</option>
        <option value="4">L4</option>
       
        <option value="0">L0</option>
       </select> <br>
        
       <table>
              <tr>
              <td>
              <label for="state">Passenger Phone</label>
               
              </td>
              <td width="200">
              <label for="zip">Passenger Name</label>
              </td>
              
              </tr>
              <br>
             
             <tr>   
             <td>
                <input type="text-c" class="" placeholder="Phone" id="customer_phone" value="<?php echo $customer_phone;?>"    name="customer_phone">
                </td>
               <td width="200"> 
                <input type="text-c" class="" placeholder="Name" name="customer_name" value="<?php echo $customer_name;?>"  id="customer_name">
                </td>
                
             </tr>
             </table>

        
       <br>
      <!--<p align="right" id="modal_button">History</p>-->|	
    
        <label class="">PickUp:</label>  
       <input id="from_places" name="src_addr" type="text" class=""  value="<?php echo $addressFrom;?>"  placeholder="Enter Pickup Address" required>
        
         <table>
              <tr>
              <td width="200">
              <label for="zip">Cross Street:</label>
              </td>
              <td>
              <label for="state">At:</label>
               
              </td>
              </tr>
              <br>
             
             <tr>   
             
               <td width="200"> 
               <input class="input-half" type="text-half-th" placeholder="Cross Street:" value="<?php echo $cross_street;?>" name="cross_street">
                </td>
                <td>
                <input class="input-half" type="text-half-th" placeholder="At:" value="<?php echo $at;?>"  name="at">
                </td>
             </tr>
             </table>
          
       <br>
         <label>DropOff :</label>
        <input  id="to_places"  name="dest_addr" type="text"  class="" value="<?php echo $addressTo;?>"    placeholder="Enter Drop Address"><br>
        
       
        
       </div>
       <div class="col-lg-4" style="background-color:;  border-radius:5px;width:43%;height:80%; border:1px solid #ccc">
       <br></br>
              <table>
              <tr>
              <td width="37%">
              <label>Time:</label> 
              </td>
              <td width="21%">
              <label for="">Lead</label>
               
              </td>
              <td width="155">
              <label for="">Service</label>
               
              </td>
              <td width="100">
              <label for="">Vehicle Type</label>
               
              </td>
              </tr>
              
             </table>
       
         
        
        <?PHP $now=date("H:i:s  m/d/y");?> 
        
        <input class="" type="text-half" placeholder="" name="timing" value="<?PHP echo $timing;?>" required>
        
        <select class="selectT-Mini" name="time_assigned">
        <option value="<?PHP echo $time_assigned;?>"><?PHP echo $time_assigned;?></option>
        <option>ASAP</option>
        <option>Later</option>
         <option>Price Check</option>
        <option>5min</option>
        <option>10min</option>
        <option>15min</option>
        <option>20min</option>
        <option>30min</option>
        <option>45min</option>
        <option>1hr0min</option>
        <option>1hr30min</option>
        <option>2hr0min</option>
        </select>
        
       <select class="selectT-Mini2" name="service">
        <option value="<?PHP echo $service;?>"><?PHP echo $service;?></option>
       
        <option>Quick Ride</option>
         <option>Reservation</option>
         <option>Personal Request</option>
         <option>Delivery</option>
        <option>Roadside</option>
        
         <option>Moving</option>
          <option>Wheel Chair</option>
       
        </select>
        
        <select name="vehicle_type" class="selectT-Mini">
                                         <option value="<?PHP echo $vehicle_type;?>"><?PHP echo $vehicle_type;?></option>
                                        <option value="">ANY</option>
                                         <option>SD</option>
                                         
                                         <option>SUBN</option>
                                         <option>Compact</option>
                                         <option>Black cab</option>
                                         <option>SUV</option>
                                         <option>Bus</option>
                                         <option>Minibus</option>
                                         <option>Van</option>
                                         <option>MVN</option>
                                         <option>Limousine</option>
                                         <option>Stretch Limousine</option>
                                         <option> Golf cart</option>
                                         
</select>
<br></br>
       <table>
              <tr>
              <td width="24%">
              <label>Driver</label> 
              </td>
              <td width="32%">
              <label for="">First Mile</label>
               
              </td>
              <td width="185">
              <label for="">Distance Charge</label>
               
              </td>
              <td width="102">
              <label for="">CZF</label>
               
              </td>
              </tr>
              
             </table>
      
       <?php 
       $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
       include "$rootDir/dispatch/m/driverAPI/driverslistdropdown-api.php";
       ?>
      
      
     
      
     <input class="input-half" type="text-fs" placeholder="First Mile Charge" name="fmile_charge" value="<?PHP echo $fmile_charge;?>" required>
      <input class="input-half" type="text-fs" placeholder="Distance Charge" name="distance_charge" value="<?PHP echo $distance_charge;?>" required>
      <input class="input-half" type="text-fs-sm" placeholder="CZF" name="czf" ><br></br>
      
       <table>
              <tr>
              <td width="135">
              <label>Distance</label> 
              </td>
              <td width="132">
              <label>Duration</label> 
              </td>
              <td width="133">
              <label for="">Paytment</label>
               
              </td>
              <td width="135">
              <label for="">Fare Override</label>
               
              </td>
              <td width="123">
              <label for="">No.Vehilce</label>
               
              </td>
              </tr>
              
             </table>
             
      <input class="input-half" type="text-fs-sm" placeholder="Distance" size="30"  value="<?PHP echo $dist;?>" name="distance">
      <input class="input-half" type="text-fs-sm" placeholder="Duration"  value="<?PHP echo $duration;?>" name="duration">
      <input class="input-half" type="text-fs-sm" placeholder="Paytment" value="<?PHP echo $tf;?>" name="fare">
      <input class="input-half" type="text-fs-sm" placeholder="Fare Override" name="fare_override" value="<?PHP echo $fare_override;?>">
     
      <select class="selectT-Mini3" name="veh_number">
            
         <option value="<?PHP echo $veh_number;?>"><?PHP echo $veh_number;?></option>
        <option >1</option>
        
         <option>2</option>
         <option>3</option>
         <option>4</option>
         <option>5</option>
         <option>6</option>
        </select>
        <br></br>
        
     <label>Comment</label>
     <input type="text" name="comment" value="<?PHP echo $comment;?>" placeholder="Comment">
        <tr>
        
       
      
      </tr>
         
     </div>
     
     <div class="col-lg-4" style="background-color:<?PHP echo $colormodeComponent;?>;  border-radius:5px;width:27%;height:80%; border:1px solid #ccc">
      <center><h4>Drivers Avalible and ETA</h4></center>
      <hr>
      <?php 
	       $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
	       include "$rootDir/dispatch/m/driverAPI/driversETA.php";
       ?>
      
         
     </div>
       
        <button class="btn-sm-right-close" type="submit"><a href="/dispatch/v/dashboard.php">Call Off</a></button>
      <button class="btn-sm-right-duplicate" type="submit" name="duplicate">Duplicate</button>
       <button class="btn-sm-right-recalculate"  type="submit" name="recaljob">ReCalcute</button>
      <button class="btn-sm-right-save" type="submit" name="savejob">Save Changes</button>
      <button class="btn-sm-right-dispatch" type="submit" name="dispatchjob">Dispatch</button>
     </div>
     
      </form>
</div>
</div>
<script>
// Get the modal
var modal = document.getElementById("customerModal");

// Get the button that opens the modal
var btn = document.getElementById("modal_button");

// Get the <span> element that closes the modal
//var closebtn = document.getElementsByClassName("close")[0];
var closebtn = document.getElementById("close");
// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
closebtn.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


<script>
$(document).ready(function(){

            load_data();
            
 function load_data(acq){
  $.ajax({
   url:"/dispatch/m/driverAPI/driversETA.php",
   method:"POST",
   async: "false",
   data:{acq:acq},
   success:function(data)
   {
    $('#td').html(data);
   }
  });
 }
 $('#autocomplete').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
 
});
</script>

<?php include('createJobFooter.php');?>