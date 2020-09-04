
       
       
                               <?php
                               //including the database connection file
                                include_once($dbc);
                                $api=$_SESSION['id'];
                                
                               //fetching data in descending order (lastest entry first)
                               $resul = mysqli_query($conn,"SELECT * FROM vehicles WHERE disp_id='$api'");
		                       while($res2 = mysqli_fetch_array($resul)) {
		                            echo "<tr>";
		                            echo "<td><a href=\"/w/v/editvehicle.php?car_id=$res2[car_id]\">Edit</a> | <a href=\"/w/m/deletevehicle_api.php?car_id=$res2[car_id]\" onClick=\"return confirm('Are you sure you want to delete this Vehicle?')\">Delete</a></td>";
		                            echo "<td>".$res2['active']."</td>";
		                            echo "<td>".$res2['number']."</td>";
		                            echo "<td>".$res2['call_sign']."</td>";
		                            echo "<td>".$res2['passenger']."</td>";
		                            echo "<td>".$res2['wheelchair']."</td>";
		                            echo "<td>".$res2['bags']."</td>";
		                            echo "<td>".$res2['type']."</td>";
		                            echo "<td>".$res2['color']."</td>";
		                            echo "<td>".$res2['license_plate']."</td>";
		                            echo "</tr>";
	                            	}
	                            	?> 
               