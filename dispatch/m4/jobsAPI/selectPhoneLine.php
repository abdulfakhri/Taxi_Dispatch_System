 <?php  
 include('/home/aidifxin/cloud/dispatch/c/api.php');
 
 include('/home/aidifxin/cloud/dispatch/c/c.php');

 include('/home/aidifxin/cloud/dispatch/c/connection.php');
   
 ?>                               
                               
                               
                               
                               <select class="selectT" name="phonelines" onchange="showUser(this.value)">
                                <option value="">L#:|Number</option>
                                <?php
                              
                               //include_once($dbc);
                                $api=$_SESSION['id'];
                               //fetching data in descending order (lastest entry first)
                               $resul = mysqli_query($conn,"SELECT * FROM urlSend WHERE taxi_comp='$api'  order by date_reg DESC LIMIT 4");
		                       while($res2 = mysqli_fetch_array($resul)) {
		                         $l=$res2["Line"];
	                           ?> 
	                           <option>L#:|<?PHP  echo $res2["Line"];?>|<?PHP  echo $res2["Phone"];?></option>	
                                <?PHP
                                }
                                ?>
                               
                                </select>