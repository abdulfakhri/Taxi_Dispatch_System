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
$resul = mysqli_query($conn,"SELECT * FROM jobs WHERE confirmedId='confirmed' AND(job_status !='finished') AND driverId='$ac' ORDER BY date_reg DESC LIMIT 1");
while($res2 = mysqli_fetch_array($resul)) {
    
    $jId=$res2['job_id'];
    $pk=$res2['src_addr'];
    $epk=$res2['esrc_addr'];
    $dp=$res2['dest_addr'];
    $edp=$res2['edest_addr'];
    
    //$map='<a href="https://www.google.com/maps/dir/?api=1&origin="'+$epk+'"&"'+'$edp+'"&travelmode=bicycling"'></a>';
  ?>  
 <tr>
<th>Job#</th>
<th><?PHP echo $res2['job_id'];?></th>
</tr>
<tr>
<th>Service</th>
<th><?PHP echo $res2['service'];?></th>
</tr>
 
<tr>
<th>Comment</th>
<th><?PHP echo $res2['comment'];?></th>
</tr>
<tr>
<th>Ctype</th>
<th><?PHP echo $res2['vehicle_type'];?></th>
</tr> 

<tr>
<th>Time</th>
<th><?PHP echo $res2['date_time'];?></th>
</tr> 
 
<tr>       
<th>Pickup</th>
<th> <a href="https://www.google.com/maps/dir/?api=1&origin=<?PHP echo $epk;?>&destination=<?PHP echo $edp;?>&dir_action=navigate" target="_blank" ><?PHP echo $pk;?></a>   </th>
</tr>
<?
echo "<tr>";
echo "<td>ETA</td>";
echo "<td>".$res2['duration']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Name</td>";
echo "<td>".$res2['customer_name']."</td>";
echo "</tr>";

echo "</tr>";
echo "<tr>";
echo "<td>Cross Street </td>";
echo "<td>".$res2['cross_street']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>At</td>";
echo "<td>".$res2['at']."</td>";
echo "</tr>";
}
?>





                  
               </tbody>
            </table> 
          </div>