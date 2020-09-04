 <?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 

 $api_key=$_SESSION['id'];
 ?>                      
<table class="table table-bordered">
               
               <tbody>
                   
                     <tr> 
                    
                    <td>
                        <?PHP
                        $sql="SELECT Phone FROM taxi_drivers WHERE taxi_comp='$api_key'";
                        $result = mysqli_query($conn,$sql);
                        while($res2 = mysqli_fetch_array($result)) {
		                            echo $res2['COUNT(*)'];
	                          }
                     	?> 
                    
                    </td>
                  
                    </tr> 
                 
   
               </tbody>
               
</table>
     
 
 
               
  
           
