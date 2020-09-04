<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 

?>

<div class="table-responsive-clg">
  <table class="table table-bordered">

               
                   <tr>
                       <th  style="background-color:<?PHP echo $colormodeComponent;?>; width:33%;  border-radius: 5px; border: 2px solid #ccc;color:white;font-size:18px;text-align:center">All</th >
                       <th  style="background-color:<?PHP echo $colormodeComponent;?>; width:33%;  border-radius: 5px; border: 2px solid #ccc;color:green;font-size:18px;text-align:center">Free</th>
                       <th  style="background-color:<?PHP echo $colormodeComponent;?>; width:33%;  border-radius: 5px; border: 2px solid #ccc;color:red;font-size:18px;text-align:center">Busy</th>
                       <th  style="background-color:<?PHP echo $colormodeComponent;?>; width:33%;  border-radius: 5px; border: 2px solid #ccc;color:yellow;font-size:18px;text-align:center">Away</th>
                  </tr>
               
               
                 <tr>
                       <td style="color:white;font-size:17px;text-align:center">
                       <?PHP
                        $sql="SELECT COUNT(*) FROM taxi_drivers WHERE taxi_comp='$api_key'";
                        $result = mysqli_query($conn,$sql);
                        while($res2 = mysqli_fetch_array($result)) {
		                            echo $res2['COUNT(*)'];
	                          }
                     	?> 
                       </td>
                      <td style="color:green;font-size:17px;text-align:center">
                       <?PHP
                        
                        $sql="SELECT COUNT(*) FROM avalible_drivers WHERE taxi_comp='$api_key'";
                        $result = mysqli_query($conn,$sql);
                        while($res2 = mysqli_fetch_array($result)) {
		                           
		                            echo $res2['COUNT(*)'];
		                            
	                          }
                     	?> 
                       </td>
                       <td style="color:red;font-size:17px;text-align:center">
                       <?PHP
                        $sql="SELECT COUNT(*) FROM drivers_busy WHERE taxi_comp='$api_key'";
                        $result = mysqli_query($conn,$sql);
                        while($res2 = mysqli_fetch_array($result)) {
		                            echo $res2['COUNT(*)'];
	                    }
                     	?> 
                       </td>
                       <td style="color:yellow;font-size:17px;text-align:center">
                       <?PHP
                        $sql="SELECT COUNT(*) FROM drivers_away WHERE taxi_comp='$api_key'";
                        $result = mysqli_query($conn,$sql);
                        while($res2 = mysqli_fetch_array($result)) {
		                            echo $res2['COUNT(*)'];
	                    }
                     	?> 
                       </td>
             </tr>
                   
               
</table>
     
</div>