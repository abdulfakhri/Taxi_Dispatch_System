  <?php  
 include('/home/aidifxin/cloud/dispatch/c/api.php');
 
 include('/home/aidifxin/cloud/dispatch/c/c.php');

 include('/home/aidifxin/cloud/dispatch/c/connection.php');
   
 ?>                              
                          <div class="table-responsive-clg text-nowrap">
                               <table class="table">
                              
                                  <tr>
                                      <th>Drvr#</th>
                                       <th>Date</th>
                                        <th>Time</th>
                                        <th>Rides</th>
                                        <th>ETA</th>
                                  </tr>
                              
                                  <tbody>
                                      
                                 
                               <?php
                               //including the database connection file
                                include_once($dbc);
                                $api=$_SESSION['id'];
                               //fetching data in descending order (lastest entry first)
                               $resul = mysqli_query($conn,"SELECT * FROM jobs WHERE taxi_comp='$api' ORDER BY date_reg ASC LIMIT 20");
		                       while($res2 = mysqli_fetch_array($resul)) {
		                            echo "<tr>";
		                            
		                            echo "<td>".$res2['driverId']."</td>";
		                            echo "<td>".$res2['date_reg']."</td>";
		                            echo "<td>".$res2['timing']."</td>";
		                            echo "<td>".$res2['last_ride']."</td>";
		                            echo "<td>".$res2['eta']."</td>";
		                            
		                           
		                            echo "</tr>";
	                            	}
	                            	?> 
	                            	 </tbody>
	                            	
	                            	
	                           </table>
                           </div>