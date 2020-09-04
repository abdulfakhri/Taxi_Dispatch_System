<?php 
       $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
       include "$rootDir/dispatch/c/c/api.php";
       include "$rootDir/dispatch/c/c/connection.php";
       include "$rootDir/dispatch/m/jobsAPI/editjob_api.php";
       
?>
<?PHP include($nav);?>

<?php
$id = $_GET['job_id'];
$api=$_SESSION['id'];
//fetching data in descending order (lastest entry first)
$resul=mysqli_query($conn,"SELECT * FROM jobs WHERE taxi_comp='$api_key' AND job_id='$id'");
while($res2 = mysqli_fetch_array($resul)) {
		                                
    $jobId = $res2['job_id'];	
                                  
    $phonelines = $res2['phone_line'];
    
    $vehicle_type=$res2['vehicle_type'];
    
    $addressFrom = $res2['src_addr'];
    
    $addressTo =$res2['dest_addr'];
    
    $cross_street=$res2['cross_street'];
    
    $fare=$res2['fare'];
    
    $at=$res2['at'];
    
    $service=$res2['service'];
    
    $timing=$res2['date_time'];
    
    $time_assigned=$res2['time_assigned'];
    
    $customer_name=$res2['customer_name'];
    
    $customer_phone=$res2['customer_phone'];
    
    $comment=$res2['comment'];
    
    $fare=$res2['fare'];
    
    $distance=$res2['distance'];
    
    $api_key=$_SESSION['id'];

		                          
 }		                                 
?> 
 
  
</head>
  <body>
<h4>Dispatch Saved Jobs</h4>

  <div>
  <p align="right"><input type="text-half" class="jobentry-half" name="job_id" value="<?php echo $jobId;?>" placeholder="Job#" /></p>
 
  
     <body onload="initialize()">
    
<div class="row">
      
    <div class="col-lg-8" style="background-color:;  border-radius:5px;width:58%; border: 1px solid #ccc">

      <br>
     <form action="" method="POST">  
        
        <div class="col-lg-4" style="background-color:;  border-radius:5px;width:50%; border:px solid #ccc">
             
        <input type="hidden" name="distance_charge" value="<?php echo $distance;?>" />
        <input type="hidden" name="fmile_charge" value="<?php echo $fmile_charge;?>" />
       <input type="hidden" name="job_id" value="<?php echo $jobId;?>" />
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
      <input type="text" name="distance" value="<?php echo $distance;?>" placeholder="Distance">
      
      <label>Payment:</label><br>
      <input type="text" name="fare" value="<?php echo $fare;?>" placeholder="Payment Amount">
      
       <label>Selected L#:</label><br>
      <input type="text" name="phonelines" value="<?php echo $phonelines;?>" placeholder="">
      <br>
      <label>Selected Driver:</label> <br>
          <?php
          $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
          include "$rootDir/dispatch/m/driverAPI/selectAdriverAPI.php"; 
          ?>
       <br>
      <label>Vehicle Type</label>
       <input type="text" name="vehicle_type" value="<?php echo $vehicle_type;?>" placeholder="">
    
           
      <label>Time Assigned:</label> <br>
      
         <input class="" type="text" placeholder="" name="date_time" value="<?PHP echo $timing;?>">
          <input class="" type="text" placeholder="" name="time_assigned" value="<?PHP echo $time_assigned;?>">
        
         
     </div>
     
         
      <div class="col-lg-8" style="background-color:;  border-radius:5px;width:100%; border:px solid #ccc">
      
      <label>Comment:</label><br>
      <input type="text" name="comment" value="<?PHP echo $comment;?>"  placeholder="Comment"><br>
      
      
      <button class="btn-small" type="submit" name="savejobE">Save </button>
      <button class="btn-small" type="submit" name="dispatchjobE">Dispatch</button>
      <button class="btn-small" type="submit"  name="canceljobE">Cancel</button>
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

<?php
          $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
          include "$rootDir/dispatch/m/jobsAPI/driverETAScript.php";          
 ?>