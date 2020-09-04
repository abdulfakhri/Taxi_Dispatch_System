<?php include ('../c/api.php');?>
<?php include ('../c/c.php');?>
       <div class="table-responsive text-nowrap">
           <table class="table table-striped">
                <th>Pickup Add</th>
                <th>Drop off Add</th>
                <th>Disp-Time</th>
                <th >Status</th>
                <tbody>
                 <?php
                               //including the database connection file
                                include_once($dbc);
                                $comp_key=$_SESSION['taxi_comp'];
                                $driver=$_SESSION['id'];
                                
                               
                               //fetching data in descending order (lastest entry first)
                               $resul = mysqli_query($conn,"SELECT * FROM jobs WHERE taxi_comp='$comp_key' AND assign_car='$driver' ORDER BY date_reg ASC");
		                       while($res2 = mysqli_fetch_array($resul)) {
		                            echo "<tr>";
		                            echo "<td>".$res2[1]."</td>";
		                            echo "<td>".$res2[2]."</td>";
		                            echo "<td>".$res2['duration']."</td>";
		                            echo "<td><a href=\"/vehicle/v/jobdeliverystatus.php?job_id=$res2[job_id]\">Finished Job</a></td>";
		                            echo "</tr>";
	                            	}
	                            	
	                            	?> 
               </tbody>
            </table> 
          </div>
                               
               