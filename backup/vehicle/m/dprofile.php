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
           <table class="table">
               
                
                
                <tbody>
<?php 
include ($dbc);
$ac=$_SESSION['id'];
$taxi_comp=$_SESSION['taxi_comp'];
//$resul = mysqli_query($conn,"SELECT * FROM jobs WHERE taxi_comp='$taxi_comp' ORDER BY date_reg ASC");
$resul = mysqli_query($conn,"SELECT * FROM taxi_drivers WHERE driverId='$ac'");
while($res2 = mysqli_fetch_array($resul)) {
    
    $dId=$res2['driver_id'];
    $car=$res2['type'];
    $dn=$res2['driver_name'];
    $ld=$res2['last_ride'];
    $edp=$res2['edest_addr'];
    
    
}
  ?>  
  <?php 
include ($dbc);
$ac=$_SESSION['id'];
$taxi_comp=$_SESSION['taxi_comp'];
$resul = mysqli_query($conn,"SELECT * FROM taxi_company WHERE id='$taxi_comp'");
//$resul = mysqli_query($conn,"SELECT * FROM taxi_company WHERE id=''");
while($res2 = mysqli_fetch_array($resul)) {
    
    $comp=$res2['organization'];
    $pk=$res2['src_addr'];
    $epk=$res2['esrc_addr'];
    $dp=$res2['dest_addr'];
    $edp=$res2['edest_addr'];
    
    //$map='<a href="https://www.google.com/maps/dir/?api=1&origin="'+$epk+'"&"'+'$edp+'"&travelmode=bicycling"'></a
}
  ?>
  <tr>
<th>Time</th>
<th id="clock"></th>
</tr> 
 <tr>
<th>Company</th>
<th><?PHP echo $comp;?></th>
</tr>

<tr>
<th>Driver Name</th>
<th><?PHP echo $dn;?></th>
</tr>

<tr>
<th>Driver#</th>
<th><?PHP echo $dId;?></th>
</tr>
 

<tr>
<th>Car Type</th>
<th><?PHP echo $car;?></th>
</tr> 

<tr>
<th>Last Ride</th>
<th><?PHP echo $ld;?></th>
</tr> 
 


                  
               </tbody>
            </table> 
          </div>
  