<?php include('../c/api.php');?>
<?php include ('../c/c.php');?>
<?php include ('../c/connection.php');?>
<?php include ($nav);?>
<?php 
/*
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 
include ($nav);
include ($cjob);
include ($mapt);
include ($scripts);
*/
?>


<?php

$databaseHost = 'localhost';
$databaseName = 'jorrog3_dispatch';
$databaseUsername = 'jorrog3_dispatch';
$databasePassword = '!@#123qweasdzxc';
$connect  = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "SELECT * FROM jobs WHERE taxi_comp='$api_key'";  
$result = mysqli_query($connect, $sql);
?>
<form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Save To Excel" />
    </form>
    
   <div class="table-responsive-clg text-nowrap">  
  
    <table class="table table-bordered">
     <tr>  
       <th>Date</th>  
       <th>Job#</th>
       <th>Pickup</th>
       <th>C/Pick Time</th>
       <th>D/Drop Time</th>
       <th>Drop Off</th>
       <th>Driver</th>
       <th>Driver Hach Lic</th>
       <th>Driver Lic Plate</th>
      </tr>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
       <tr>  
                          <td>'.$row['kdate'].'</td> 
                          <td>'.$row['job_id'].'</td>   
                          <td>'.$row['src_addr'].'</td>  
                          <td>'.$row['pickupTime'].'</td>  
                          <td> '.$row['dropTime'].'</td>  
                          <td>'.$row['dest_addr'].'</td>  
                          <td> '.$row['driverId'].'</td>  
                          <td> '.$row['driverId'].'</td>
                          <td> '.$row['driverId'].'</td>
       </tr>  
        ';  
     }
     ?>
    </table>
  
    
   </div>  
  </div>  
 </body>  
</html>
<?php include ($ft);?>