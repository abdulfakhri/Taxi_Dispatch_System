<?php
//if(isset($_POST['jobs_search'])){



                               //including the database connection file
                                include_once($dbc);
                                $Key=$_POST['search_key'];
                                $api=$_SESSION['id'];
                               //fetching data in descending order (lastest entry first)
                              $resul = mysqli_query($conn, "SELECT * FROM jobs WHERE disp_id='$api' AND customer_name LIKE '%".$Key."%' OR customer_phone LIKE '%".$Key."%' OR customer_email LIKE '%".$Key."%' OR date_reg LIKE '%".$Key."%'");
		                       while($res2 = mysqli_fetch_array($resul)) {
		                            echo "<tr>";
		                            echo "<td><a href=\"/w/v/editjob.php?job_id=$res2[job_id]\">Edit</a> | <a href=\"/w/m/deletejob_api.php?job_id=$res2[job_id]\" onClick=\"return confirm('Are you sure you want to delete this job?')\">Delete</a></td>";
		                            echo "<td>".$res2[1]."</td>";
		                            echo "<td>".$res2[2]."</td>";
		                            echo "<td>".$res2[3]."</td>";
		                            echo "<td>".$res2[4]."</td>";
		                            echo "<td>".$res2[5]."</td>";
		                            echo "<td>".$res2[6]."</td>";
		                            echo "<td>".$res2[7]."</td>";
		                            echo "<td>".$res2[8]."</td>";
		                            echo "<td>".$res2[9]."</td>";
		                            echo "<td>".$res2[10]."</td>";
		                            echo "<td>".$res2[11]."</td>";
		                            echo "<td>".$res2[12]."</td>";
		                            echo "<td>".$res2[13]."</td>";
		                            echo "<td>".$res2[14]."</td>";
		                            echo "<td>".$res2[15]."</td>";
		                           
		                           
		                            echo "</tr>";
	                            	}
//  }
	                            	?> 
               