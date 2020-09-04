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
               <thead>
                 <tr><h3>New Job</h3></tr>  
                
                </thead>
                <tbody>
<?php 
include ($dbc);
$Job=$_GET['jobId'];
$ac=$_SESSION['id'];
$taxi_comp=$_SESSION['taxi_comp'];

$resul = mysqli_query($conn,"SELECT * FROM jobs WHERE  job_id='$Job' ORDER BY date_reg DESC LIMIT 1");
while($res2 = mysqli_fetch_array($resul)) {
    
    $jId=$res2['job_id'];
    
echo "<tr>";
echo "<td>Time</td>";
echo "<td>".$res2['date_time']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Duration</td>";
echo "<td>".$res2['duration']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Service</td>";
echo "<td>".$res2['service']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Class</td>";
echo "<td>".$res2['vehicle_type']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Pickup</td>";
echo "<td>".$res2['src_addr']."</td>";
echo "</tr>";


echo "<tr>";
echo "<td>DropOff</td>";
echo "<td>".$res2['dest_addr']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Fare</td>";
echo "<td>"."$".$res2['fare']."</td>";
echo "</tr>";


}
?>
                  
               </tbody>
            </table> 
          </div>
  