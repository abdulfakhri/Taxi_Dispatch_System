<?php 
include('/home/aidifxin/cloud/dispatch/c/api.php');
 
include('/home/aidifxin/cloud/dispatch/c/c.php');
 
include('/home/aidifxin/cloud/dispatch/c/connection.php');
 
//include ($dbc);

$output = '';
if(isset($_POST["acquery"])){
$api_key=$_SESSION['id'];
$date=date("Y-m-d");
    //$api_key="14";
$Key=mysqli_real_escape_string($conn, $_POST["acquery"]);
$kdate=mysqli_real_escape_string($conn, $date);
$query ="SELECT * FROM jobs WHERE taxi_comp='$api_key' AND job_id LIKE '%".$Key."%' OR src_addr LIKE '%".$Key."%' OR dest_addr LIKE '%".$Key."%' OR  	job_status  LIKE '%".$Key."%' OR assign_car LIKE '%".$Key."%' OR customer_phone LIKE '%".$Key."%'";
}else{
 $query = "SELECT * FROM jobs WHERE taxi_comp='$api_key' order by date_reg DESC";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){?>
             
  <div class="table-responsive-clg text-nowrap">
         <table class="table">
               <thead>
             <tr>
            
             <th >Job#</th>
              <th>Pickup</th>
               <th>DropOff</th>
               <th>Phone#</th>
               <th>LN</th>
              <th>Ptime</th>
              <th>Driver#</th>
            <th>Dtime</th>
            <th>ETA</th>
            <th>Status</th>
             </tr>
             </thead>
             <tbody>
 <?php
 while($res2 = mysqli_fetch_array($result)){
 $t=$res2['time_assigned'];
 
 $driver=$res2['driverId'];
 $jobDis=$res2['jobDis'];
 if($driver=="Not Assigned" and $jobDis=="Not Assigned"){
     
     $color="red";
     
 }else{
     $color="";
 }
 if($t!=="ASAP"){
 ?>
 
 
 
<tr bgcolor="<?php echo $color;?>"
    onmouseover="ChangeColor(this, true);" 
    onmouseout="ChangeColor(this, false);"
    onclick="location.replace('/dispatch/v/editjob.php?job_id=<?php echo $res2['job_id'];?>','_self');">
   <td><?php echo $res2['job_id'];?></td>
    <td><?php echo $res2['src_addr'];?></td>
    <td><?php echo $res2['dest_addr'];?></td>
    <td><?php echo $res2['customer_phone'];?></td>
    <td><?php echo $res2['phone_line'];?></td>
	<td><?php echo $res2['pickupTime'];?></td>
	<td><?php echo $res2['driver_id'];?></td>
	<td><?php echo $res2['date_reg'];?></td>
	<td><?php echo $res2['eta'];?></td>
	 
	 <td><?php echo $res2['job_status'];?></td>
   </tr>

<?php 
   }
 }
}
//else
//{
 //echo 'Data Not Found';
//}
?>   
</tbody>
         </table>
