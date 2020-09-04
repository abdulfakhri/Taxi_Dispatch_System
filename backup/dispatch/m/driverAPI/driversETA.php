<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 
?>


             
<div class="table-responsive-clg text-nowrap">
                               <table class="table">
                              
                                  <tr>
                                      <th>Drvr#</th>
                                       <th>Date</th>
                                       
                                        <th>Time</th>
                                        <th>Rides</th>
                                        <th>ETA</th>
                                        <th>Distance</th>
                                  </tr>
 <?php
 
$api_key=$_SESSION['id'];

$date=date("Y-m-d");

$addressFrom;

$query = "SELECT * FROM taxi_drivers WHERE taxi_comp='$api_key'";

$result = mysqli_query($conn, $query);

while($res2 = mysqli_fetch_array($result)){

$dc=$res2['dcurrent_location'];
/////////////////////////////////////////////////////////////////////////////////////////////////
$d12=str_replace(" ","+",$addressFrom);
    
$p12=str_replace(" ","+",$dc);

$url2="https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$p12&destinations=$d12&key=AIzaSyA9Pyf9DzK853LRdgobgwCdMDbi5B-QUMY";
 
    $ch2 = curl_init();
    curl_setopt($ch2, CURLOPT_URL, $url2);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch2, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
    $response2 = curl_exec($ch2);
    curl_close($ch2);
    $response_a2 = json_decode($response2, true);
    $dist2 = $response_a2['rows'][0]['elements'][0]['distance']['text'];
    $duration2 = $response_a2['rows'][0]['elements'][0]['duration']['text'];
 
 
 //////////////////////////////////////////////////////////////////////////////////////////////////

 $dt=$res2['date_reg'];
 
 list($date,$time)=explode(" ",$dt,2);
 
 
echo "<tr>";
                              
echo "<td>".$res2['driverId']."</td>";
?>
<td> <?php echo $date;?></td>
<td><?php echo $time;?></td>
<?php
echo "<td>".$res2['last_ride']."</td>";
?>
<td><?php echo $duration2;?></td>
<td><?php echo $dist2;?></td>
<?php
 echo "</tr>";
 }

?>
</table>
</div>