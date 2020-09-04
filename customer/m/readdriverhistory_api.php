
       
                               <?php
                               //including the database connection file
                                include_once($dbc);
                                $comp_key=$_SESSION['taxi_comp'];
                                $driver=$_SESSION['id'];
                                
                               
                               //fetching data in descending order (lastest entry first)
                               $resul = mysqli_query($conn,"SELECT * FROM drivers_busy WHERE taxi_comp='$comp_key' AND assign_car='$driver' ORDER BY date_reg ASC");
		                       while($res2 = mysqli_fetch_array($resul)) {
		                            echo "<tr>";
		                            echo "<td>".$res2[1]."</td>";
		                            echo "<td>".$res2[2]."</td>";
		                            echo "<td>".$res2['duration']."</td>";
		                             echo "<td>".$res2['date_reg']."</td>";
		                            echo "</tr>";
	                            	}
	                            	
	                            	?> 
               