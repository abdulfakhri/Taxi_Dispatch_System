<?php include ('../c/api.php');?>
<?php include ('../c/m.php');?>
<?php include ('../c/v.php');?>
<?php include ('../c/c.php');?>
<?php include ($startshift);?>
<?php include ($startshiftapi);?>
<?php include ('calc.php');?>
<?php include ('map.php');?>
<?php include ('driverjob_busy.php');?>
<?php include ('driveraway.php');?>

  <ul class="nav nav-tabs">
     <li class="active"><a data-toggle="tab" href="#m1">Current</a></li>
   
     <li><a data-toggle="tab" onclick="getLocation()" href="#m4">Map</a></li>
  </ul>

  <div class="tab-content">
      
    <div id="m1" class="tab-pane fade in active">
     <ul class="nav nav-tabs">
     <li class="active"><a data-toggle="tab" href="#Available">Available</a></li>
     <li><a data-toggle="tab" onclick="openBusyDriver()" href="#Busy">Busy</a></li>
     <li><a data-toggle="tab" onclick="openawayDriver()" href="#Away">Away</a></li>
     </ul>
     
    <div class="tab-content">
      <div id="Available" class="tab-pane fade">
          <div class="table-responsive text-nowrap">
           <table class="table table-striped">
                <th>Pickup Add</th>
                <th>Drop off Add</th>
                <th>Disp-Time</th>
                <th >Status</th>
                <tbody>
                  <?php  include('../m/readdriverjobs_api.php');?>
               </tbody>
            </table> 
          </div>
        
                
           
       </div>
     <div id="Busy" class="tab-pane fade">
        <div class="table-responsive text-nowrap">
           <table class="table table-striped">
                <th>Pickup Add</th>
                <th>Drop off Add</th>
                <th>Disp-Time</th>
                <tbody>
                  <?php  include('../m/readbusydriver_api.php');?>
               </tbody>
            </table> 
          </div>
     </div>
      <div id="Away" class="tab-pane fade">
           <table class="table table-striped">
                <th>Duration</th>
                <th>Status</th>
                <tbody>
                  <?php  include('../m/readawaydriver_api.php');?>
               </tbody>
            </table> 
           <form method="POST" action="">
             <button class="btn  w3-green" type="submit" name="driverAwayFinished">Finished</button>
           </form>
                 
           
       </div>
    </div>
    

    </div>
     
   
    <div id="m4" class="tab-pane fade">
     <div class="table-responsive text-nowrap">
                   
        <p>Map</p>   
    </div>
      
    </div>
 
   
  </div>


    
    
    
    
    
    
    
    
    
    
    
      

		   
 