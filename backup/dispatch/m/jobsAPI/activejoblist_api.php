<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 

$output = '';
if(isset($_POST["acquery"])){
$api_key=$_SESSION['id'];
$date=date("d/m/Y");
    
$Key=mysqli_real_escape_string($conn, $_POST["acquery"]);
$kdate=mysqli_real_escape_string($conn, $date);
$query ="SELECT * FROM jobs WHERE taxi_comp='$api_key' AND job_id LIKE '%".$Key."%' OR src_addr LIKE '%".$Key."%' OR dest_addr LIKE '%".$Key."%' OR  job_status  LIKE '%".$Key."%' OR assign_car LIKE '%".$Key."%' OR customer_phone LIKE '%".$Key."%'";
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
 $pd=$res2['pickup_drop'];
 $jobconf=$res2['confirmedId']; 	
 $job_status=$res2['job_status']; 
 $date=date("d/m/Y");
 
 $kdate=$res2['kdate'];
 
 $driver=$res2['driverId'];
 $jobDis=$res2['jobDis'];
 
 if($job_status=="Not Assigned"){
     
     $color="red";
     $dcolor="blue";
     
 }else{
     $color="";
     $dcolor="green";
 }
 
 
 //if($kdate==$date and $job_status!=="finished" and $job_status!=="canceled" and $t=="ASAP" and $pd!=="drop" and $kdate===$date ){  
 if($t=="ASAP" and $kdate==$date and $job_status!="finished" and $job_status!="Negative" ){  
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
	<td><?php echo $res2['driverId'];?></td>
	<td><?php echo $res2['date_reg'];?></td>
	<td><?php echo $res2['duration'];?></td>
	 
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