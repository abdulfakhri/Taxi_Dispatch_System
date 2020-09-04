
<?php 
include('/home/aidifxin/cloud/dispatch/c/api.php');
 
include('/home/aidifxin/cloud/dispatch/c/c.php');
 
include('/home/aidifxin/cloud/dispatch/c/connection.php');
 
//include ($dbc);

$output = '';
if(isset($_POST["acq"])){
$api_key=$_SESSION['id'];
//$api_key='14';
$date=date("Y-m-d");
    //$api_key="14";
$Key=mysqli_real_escape_string($conn, $_POST["acq"]);
$kdate=mysqli_real_escape_string($conn, $date);
$query ="SELECT * FROM taxi_drivers WHERE taxi_comp='$api_key' AND dcurrent_location LIKE '%".$Key."%'";
}else{
 $query = "SELECT * FROM taxi_drivers WHERE taxi_comp='$api_key' LIMIT 20";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){?>
             
<div class="table-responsive-clg text-nowrap">
                               <table class="table">
                              
                                  <tr>
                                      <th>Drvr#</th>
                                       <th>Date</th>
                                        <th>Time</th>
                                        <th>Rides</th>
                                        <th>ETA</th>
                                  </tr>
 <?php
 while($res2 = mysqli_fetch_array($result)){
 $dt=$res2['date_reg'];
 list($date,$time)=explode(" ",$dt,2);
 
 
                                  echo "<tr>";
                              
                                    echo "<td>".$res2['driver_id']."</td>";
                                    ?>
		                             <td> <?php echo $date;?></td>
		                             <td><?php echo $time;?></td>
		                        <?php
		                            echo "<td>".$res2['rides']."</td>";
		                            echo "<td>".$res2['eta']."</td>";
		                      
                                  echo "</tr>";

 }
}
else
{
 echo 'Data Not Found';
}
?>    
