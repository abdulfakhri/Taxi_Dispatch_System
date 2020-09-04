 <script src='https://kit.fontawesome.com/a076d05399.js'></script>
<?php
session_start();
include('../c/api.php');
include('../c/c.php');




$databaseHost = 'localhost';
$databaseName = 'ironxpxj_trip';
$databaseUsername = 'ironxpxj_admin';
$databasePassword = '!@#123qweasdzxc';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

?>                
<center>
<div class="table-responsive-clg text-nowrap">
                                <table class="table">
                                <tr bgcolor="#ff3333">
                                  <th style='color:#fff'>Drivers#</th>
                                  <th style='color:#fff'>VType</th>
                                   <th style='color:#fff'>LJob</th>
                                  <th style='color:#fff'>Text</th>
                                </tr>
		                        <tbody> 
                               <?php
                               
                                $apiKey=$_SESSION['id'];
                                 //$apiKey=;
                               //fetching data in descending order (lastest entry first)
                               $resul = mysqli_query($conn,"SELECT * FROM taxi_drivers WHERE taxi_comp='$apiKey' AND dfree_busy='free'");
		                       while($res2 = mysqli_fetch_array($resul)) {
		                           $did=$res2['driverId'];
		                           $dsp=$_SESSION['id'];
		                           $_SESSION['selectedD']=$_SESSION['driverId'];
		                            $s=$res2['status'];
		                           if($s==0){
		                               $ms="Offline";
		                           }else  if($s==1){
		                               $ms="Online";
		                           }else if($s==null){
		                              $ms="Offline";
		                           }
		                           $token=(rand(10,1000));
		                            echo "<tr>";
		                            echo "<td style='color:#fff'>".$res2['driver_id']."</td>";
		                            echo "<td style='color:#fff'>".$res2['type']."</td>";
		                            echo "<td style='color:#fff'>".$res2['last_ride']."</td>";
		          		            echo "<td style='color:#fff'><a style='color:#fff' href=\"/dispatch/v/chat.php?uid=$res2[driverId]&di=$dsp\">Text</a></td>";
		                           
		                           
		                            echo "</tr>";
	                            	}
	                            	?> 
                                     </tbody>
                                </table> 
                            </div>

</center>