
       
                               <?php
                               //including the database connection file
                                include_once($dbc);
                                $api=$_SESSION['id'];
                               //fetching data in descending order (lastest entry first)
                               $resul = mysqli_query($conn,"SELECT * FROM taxi_drivers WHERE disp_id='$api' ORDER BY date_reg ASC");
		                       while($res2 = mysqli_fetch_array($resul)) {
		                            echo "<tr>";
		                            echo "<td><a href=\"/w/v/editdriver.php?driver_id=$res2[driver_id]\">Edit</a> | <a href=\"/w/m/deletedriver_api.php?driver_id=$res2[driver_id]\" onClick=\"return confirm('Are you sure you want to delete this Driver?')\">Delete</a></td>";
		                           
		                            echo "<td>".$res2['driver_name']."</td>";
		                            echo "<td>".$res2['driver_email']."</td>";
		                            echo "<td>".$res2['home_address']."</td>";
		                            echo "<td>".$res2['driver_phone']."</td>";
		                            echo "<td>".$res2['driving_license']."</td>";
		                            echo "<td>".$res2['driver_level']."</td>";
		                            echo "<td>".$res2['car_id']."</td>";
		                            echo "<td>".$res2['operator_license']."</td>";
		                            echo "<td>".$res2['username']."</td>";
		                            echo "<td>".$res2['password']."</td>";
		                           
		                            echo "</tr>";
	                            	}
	                            	?> 
               