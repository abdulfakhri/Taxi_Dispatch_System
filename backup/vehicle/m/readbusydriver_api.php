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
$resul = mysqli_query($conn,"SELECT * FROM jobs WHERE confirmedId='confirmed' AND(job_status !='finished') AND driverId='$ac' ORDER BY date_reg DESC LIMIT 1");
while($res2 = mysqli_fetch_array($resul)) {
    
    $jId=$res2['job_id'];
    $pk=$res2['src_addr'];
    $dp=$res2['dest_addr'];
    
    
echo "<tr>";
echo "<th>Job#</th>";
echo "<th>".$res2['job_id']."</th>";
echo "</tr>";

echo "<tr>";
echo "<td>Service</td>";
echo "<td>".$res2['service']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Cell</td>";
echo "<td>".$res2['customer_phone']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Time</td>";
echo "<td id='clock'></td>";
echo "</tr>";

echo "<tr>";
echo "<td>ETA</td>";
echo "<td>".$res2['duration']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Name</td>";
echo "<td>".$res2['customer_name']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Pickup</td>";
echo "<td>".$res2['src_addr']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Cross Street </td>";
echo "<td>".$res2['cross_street']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>At</td>";
echo "<td>".$res2['at']."</td>";
echo "</tr>";
 	 




echo "<tr>";
echo "<td>DropOff</td>";
echo "<td>".$res2['dest_addr']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Fare</td>";
echo "<td>"."$".$res2['fare']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>CZF</td>";
echo "<td>"."CZF"."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Class</td>";
echo "<td>".$res2['vehicle_type']."</td>";
echo "</tr>";
}
?>
                  
               </tbody>
            </table> 
          </div>
  