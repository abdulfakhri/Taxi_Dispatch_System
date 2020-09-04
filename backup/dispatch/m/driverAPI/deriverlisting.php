 <?php  
 include('/home/aidifxin/cloud/dispatch/c/api.php');
 
 include('/home/aidifxin/cloud/dispatch/c/c.php');

 include('/home/aidifxin/cloud/dispatch/c/connection.php');
   
 ?>                               
                               
    
<script>

function pop_up(url){
window.open(url,"_blank")
    
}
</script>
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
 $query = "SELECT * FROM jobs WHERE taxi_comp='$api_key'";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){?>
             
  <div class="table-responsive-clg text-nowrap">
           <table class="table">
             <tr>
             <!--<th>View</th>--> 
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
 <?php
 while($res2 = mysqli_fetch_array($result)){?>
 
<tr onmouseover="ChangeColor(this, true);" 
    onmouseout="ChangeColor(this, false);"
    onclick="popupCenter('editjob.php?job_id=<?php echo $res2['job_id'];?>')"
    >
    
   <!--<td><a href="editjob.php?job_id=<?php //echo $res2['job_id'];?>"  onclick="pop_up(this);">View</a></td>-->
    <td ><?php echo $res2['job_id'];?></td>;
    <td><?php echo $res2['src_addr'];?></td>;
    <td><?php echo $res2['dest_addr'];?></td>;
    <td><?php echo $res2['customer_phone'];?></td>;
    <td><?php echo $res2['phone_line'];?></td>;
	<td><?php echo $res2['time_assigned'];?></td>;
	<td><?php echo $res2['driverId'];?></td>;
	<td><?php echo $res2['time_assigned'];?></td>;
	<td><?php echo $res2['eta'];?></td>;
	 <td><?php echo $res2['job_status'];?></td>;
   </tr>

<?php 
 }
}
else
{
 echo 'Data Not Found';
}
?>    
