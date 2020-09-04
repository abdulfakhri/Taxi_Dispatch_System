                               
                               
                               
                               
                               <?php
                                include_once('../c/c.php');
                               //including the database connection file
                                include_once($dbc);
                                $api=$_SESSION['id'];
                                ?>
                                <select name="taxi_comp" class="input">  
                               <option>Select</option> 
      
                              <?php
                               //fetching data in descending order (lastest entry first)
                               $resul = mysqli_query($conn,"SELECT * FROM taxi_company");
		                       while($res2 = mysqli_fetch_array($resul)) {
		                          
	                           ?> 
	                           <option value="<?PHP   echo $res2["id"];?>"><?PHP   echo $res2["organization"];?></option>	
                                <?PHP
                                }
                                ?>
                                </select>