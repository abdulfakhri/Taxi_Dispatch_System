<?php include ('../c/api.php');?>
<?php include('/dispatch/m/jobsAPI/cjob_api.php');?>
<?php include ('../c/nav/createjob-style.php');?>
<?php include ('../c/createjobSource.php');?>
<?php include ('../c/c.php');?>
<?php include('/home/aidifxin/cloud/dispatch/c/connection.php');?> 
<?PHP include($nav);?>

<!-----------------------------Fetch Lines--------------------------------------------------------------------->  
<?php include('/home/aidifxin/cloud/dispatch/m/jobsAPI/calcDistanceAPI.php');?>
<?php include('/home/aidifxin/cloud/dispatch/m/jobsAPI/createJobAPI.php');?>
<?php include('/home/aidifxin/cloud/dispatch/m/jobsAPI/loadLinesScript.php');?>
<?php include('/home/aidifxin/cloud/dispatch/m/jobsAPI/AddAutoCompleteAPI.php');?>
<?php include('/home/aidifxin/cloud/dispatch/m/jobsAPI/calculateFareAPI.php');?>
<!-------------------------------------------------------------------------------------------------------------->

<body onload="initialize()">
    
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

<?php include('/home/aidifxin/cloud/dispatch/m/jobsAPI/driverETAScript.php');?>