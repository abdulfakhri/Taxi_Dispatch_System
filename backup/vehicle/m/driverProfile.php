<script type=""> 
$(document).ready(function(){
 fetch_timeDate();
	setInterval(function(){
	fetch_timeDate();
	},1000);
function fetch_timeDate(){
		$.ajax({
			url:"dateTime.php",
			method:"POST",
			success:function(data){
				$('#clock').html(data);
			}
		})
	}
});
</script>
<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
header('Location: /index.php');
}
?>
<?php include ('../c/c.php');?>
<br></br>


 <div class="table-responsive text-nowrap">
           <table class="table table-striped">
               
                
                
                <tbody>
<?php 
include ($dbc);
$ac=$_SESSION['id'];
$taxi_comp=$_SESSION['taxi_comp'];
//$resul = mysqli_query($conn,"SELECT * FROM jobs WHERE taxi_comp='$taxi_comp' ORDER BY date_reg ASC");
$resul = mysqli_query($conn,"SELECT * FROM taxi_jobs WHERE  driverId='$ac'");
while($res2 = mysqli_fetch_array($resul)) {
    
    
  
    
    //$map='<a href="https://www.google.com/maps/dir/?api=1&origin="'+$epk+'"&"'+'$edp+'"&travelmode=bicycling"'></a>';
  ?>  
 <tr>
<th>Clock</th>
<th><?PHP echo $res2['date_time'];?></th>
</tr>

 <tr>
<th>Driver#</th>
<th><?PHP echo $res2['driver_id'];?></th>
</tr>
<tr>
<th>Name</th>
<th><?PHP echo $res2['driver_name'];?></th>
</tr>
 
<tr>
<th>Vehicle#</th>
<th><?PHP echo $res2['vehicle_number'];?></th>
</tr>
<tr>
<th>Last Ride</th>
<th><?PHP echo $res2['last_ride '];?></th>
</tr> 

 


                  
               </tbody>
            </table> 
          </div>
  