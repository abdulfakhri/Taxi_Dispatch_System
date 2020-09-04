<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
header('Location: /index.php');
}
?>
<?php include ('../c/c.php');?>
                          <div class="table-responsive text-nowrap">
                               <table class="table">
                                <thead>
                                    <th>Job#</th>
                                    <th>Pickup</th>
                                     <th>DropedOff</th>
                                     <th>Fare</th>
                                     <th>Date</th>
                                </thead>
                
                
                                <tbody>
       
                               <?php
                               //including the database connection file
                                include_once($dbc);
                                $comp_key=$_SESSION['taxi_comp'];
                                $driver=$_SESSION['id'];
                            
                               //fetching data in descending order (lastest entry first)
                               $resul = mysqli_query($conn,"SELECT * FROM jobs WHERE taxi_comp='$comp_key' AND driverId='$driver' ORDER BY date_reg ASC");
		                       while($res2 = mysqli_fetch_array($resul)) {
		                            echo "<tr>";
		                            echo "<td>".$res2['job_id']."</td>";
		                            echo "<td>".$res2['src_addr']."</td>";
		                            echo "<td>".$res2['dest_addr']."</td>";
		                            echo "<td>".$res2['fare']."</td>";
		                            echo "<td>".$res2['date_reg']."</td>";
		                            echo "</tr>";
	                            	}
	                            	
	                            	?> 
                                </tbody>
                                </table>
                                </div>