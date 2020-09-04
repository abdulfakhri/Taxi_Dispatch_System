<?php include ('../c/api.php');?>
<?php include('/dispatch/m/jobsAPI/cjob_api.php');?>
<?php include ('../c/nav/createjob-style.php');?>
<?php include ('../c/createjobSource.php');?>
<?php include ('createjb.php');?>
<?php include ('../c/c.php');?>
<?php include('/dispatch/c/connection.php');?> 
<?php include ('../c/nav/createjob-style.php');?>
<?PHP include($nav);?>

<!-----------------------------Fetch Lines--------------------------------------------------------------------->  
<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/dispatch/m/jobsAPI/calcDistanceAPI.php";
include "$rootDir/dispatch/m/jobsAPI/createJobAPI.php";
include "$rootDir/dispatch/m/jobsAPI/loadLinesScript.php";
include "$rootDir/dispatch/m/jobsAPI/AddAutoCompleteAPI.php";
include "$rootDir/dispatch/m/jobsAPI/calculateFareAPI.php";

?>
<!-------------------------------------------------------------------------------------------------------------->
<?php
if(isset($_REQUEST['back'])){
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
?>
 <div class="container-createjob">
          
     
      <div class="col-lg-8" style="background-color:;  border-radius:5px;width:70%; border:1px solid #ccc">

        <form action="cdjobs.php" method="POST" style="border:px solid #ccc"> 
        <label class="">Select Line#:</label><br>
         <select class="selectT-Mini" name="phonelines" onchange="showUser(this.value)">
        <option value=""><?php echo $phonelines;?></option>
        <option value="">L#:</option>
        <option value="1">L1</option>
        <option value="2">L2</option>
        <option value="3">L3</option>
        <option value="4">L4</option>
       </select>
        <br>
        <div id="txtHint"></div> 
        
       <br>
    
        <label class="">PickUp:</label>
       <input id="autocomplete" name="src_addr" type="text" class="" oninput="initialize()" value="<?php echo $addressFrom;?>" placeholder="Enter Pickup Address" required><br>
       

        <input class="input-half" type="text-fs" placeholder="Cross Street:" name="cross_street">
      <input class="input-half" type="text-fs" placeholder="At:" name="at">
    
       <select class="selectT" name="service">
        <option>Quick Ride</option>
         <option>Reservation</option>
         <option>Personal Request</option>
         <option>Delivery</option>
        <option>Roadside</option>
        
         <option>Moving</option>
       
        </select>
         <label>DropOff :</label>
        <input  id="autocomplete1"  name="dest_addr" type="text"  class="" oninput="initialize()"   placeholder="Enter Drop Address" required><br>
       
       
        <label>Time:</label> <br>
        <?PHP $now=date("Y-m-d h:i");?> 
        <input class="" type="text-half" placeholder="" name="timing" value="<?PHP echo $now;?>" required>
       
        <select class="selectT" name="time_assigned" required>
            
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
        
       <?php 
       $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
       include "$rootDir/dispatch/m/driverAPI/driverslistdropdown-api.php";
       ?>
      <br>
      
      <input type="text" name="comment" placeholder="Comment">
      
      <br>
     
      
      <input class="input-half" type="text-fs" placeholder="First Mile Charge" name="fmile_charge" required >
      <input class="input-half" type="text-fs" placeholder="Distance Charge" name="distance_charge" required>
      <input class="input-half" type="text-fs" placeholder="CZF" name="czf" >
       <br>
         <button class="btn" type="submit" name="caljob">Calcute</button>
      <button class="btn" type="reset">Clear</button>
      
     
    
        
      
       </form>
         
     </div>
     
     <div class="col-lg-4" style="background-color:<?PHP echo $colormodeComponent;?>;  border-radius:5px;width:30%; border:1px solid #ccc">
      <center><h4>Drivers Avalible and ETA</h4></center>
      <hr>
      
          <br><div id="td"></div><br>
     </div>
<?php   
}
?>

<body>
    
<div class="row">
      
    <div class="col-lg-8" style="background-color:;  border-radius:5px;width:58%; border: 1px solid #ccc">

      <br>
     <form action="" method="POST">  
        
        <div class="col-lg-4" style="background-color:;  border-radius:5px;width:50%; border:px solid #ccc">
             
        <input type="hidden" name="distance_charge" value="<?php echo $distance_charge;?>" />
        <input type="hidden" name="fmile_charge" value="<?php echo $fmile_charge;?>" />
      
      <label>Passenger Phone</label><br>
      <input type="text" class="input-half" placeholder="Phone" id="customer_phone"   value="<?php echo $customer_phone;?>"   name="customer_phone">
      <label>Passenger Name</label><br>
      <input type="text" class="input-half" placeholder="Name" name="customer_name"  value="<?php echo $customer_name;?>" id="customer_name"><br>
        <label class="">PickUp:</label>
       <input id="autocomplete" name="src_addr" type="text" class="input-half"  value="<?php echo $addressFrom;?>" onkeyup="load_data(this.value)"  onFocus="geolocate()"  placeholder="Enter Pickup Address"/><br>
    
    <label class="">Cross Street:</label><br>
     <input class="input-half" type="text" placeholder="Cross Street:" name="cross_street" value="<?php echo $cross_street;?>"><br>
     
      <label class="">At:</label><br>
      <input class="input-half" type="text" placeholder="At:" name="at" value="<?php echo $at;?>" ><br>
      
      <label class="">Service:</label><br>
      <input class="input-half" type="text" placeholder="Service:" name="service" value="<?php echo $service;?>"><br>
       
         <label>DropOff :</label>
        <input  id="autocomplete1"  name="dest_addr" type="text"  class="input-half" value="<?php echo $addressTo;?>" onFocus="geolocate()" placeholder="Enter Drop Address"/><br>
        
      
         </div>
         
        <div class="col-lg-4" style="background-color:;  border-radius:5px;width:50%; border:px solid #ccc">
             <label>Distance:</label><br>
      <input type="text" name="distance" value="<?php echo $Idistance;?>" placeholder="Distance">
      
      <label>Payment:</label><br>
      <input type="text" name="fare" value="<?php echo $Itf;?>" placeholder="Payment Amount">
      
       <label>Selected L#:</label><br>
      <input type="text" name="phonelines" value="<?php echo  $phonelines;?>" placeholder="">
      <br>
      <label>Selected Driver:</label> <br>
         <input type="text" name="assign_car" value="<?PHP echo $assign_car;?>" placeholder="">
       <br>
      <label>Vehicle Type</label>
       <input type="text" name="vehicle_type" value="<?php echo $vehicle_type;?>" placeholder="">
    
           
      <label>Time Assigned:</label> <br>
         <input class="" type="text-half" placeholder="" name="timing" value="<?PHP echo $timing;?>">
          <input class="" type="text-half" placeholder="" name="time_assigned" value="<?PHP echo $time_assigned;?>">
        
         
     </div>
     
         
      <div class="col-lg-8" style="background-color:;  border-radius:5px;width:100%; border:px solid #ccc">
      
      <label>Comment:</label><br>
      <input type="text" name="comment" value="<?PHP echo $comment;?>"  placeholder="Comment"><br>
      
       <button class="btn-small" type="button" name=""><a href="/dispatch/v/goback.php?v=<?PHP echo $timing;?>">Back</a></button>
      <button class="btn-small" type="submit" name="savejob">Save </button>
      <button class="btn-small" type="submit" name="dispatchjob">Dispatch</button>
      <button class="btn-small" type="button" name=""><a href="/dispatch/v/dashboard.php">Close</a></button>
        </div>
       
     </form>
         
     
     </div> 
      
    <div class="col-lg-3" style="background-color:<?PHP echo $colormodeComponent;?>;  border-radius:5px;width:39%; border: 1px solid #ccc">
      <center><h4>Drivers Avalible and ETA</h4></center>
      <hr>
       <br><div id="td"></div><br>
       
      </div>
      
</div>
  

</body>
</html>

<?php include('/dispatch/m/jobsAPI/driverETAScript.php');?>