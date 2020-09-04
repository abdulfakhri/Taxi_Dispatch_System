 <?php  
 include('/home/aidifxin/cloud/dispatch/c/api.php');
 
 include('/home/aidifxin/cloud/dispatch/c/c.php');

 include('/home/aidifxin/cloud/dispatch/c/connection.php');
   
 ?>                               

                            <select name="assign_car"  class="selectT">  
                                <option value="Not Assigned">Select A Driver</option> 
                               <?php
                               //name='$res2["driverId"]'
                                $api=$_SESSION['id'];
                               $resul = mysqli_query($conn,"SELECT * FROM taxi_drivers WHERE taxi_comp='$api'");
		                       while($res2 = mysqli_fetch_array($resul)) {
		                          $st=$res2["dfree_busy"];
		                          //$lo
		                          if($st=="free"){
		                              
	                           ?> 
	                           <option value="<?PHP echo $res2["driverId"];?>"><?PHP echo $res2["driver_id"];?></option>	
                                <?PHP
		                          }
                                }
                                ?>
                            </select>