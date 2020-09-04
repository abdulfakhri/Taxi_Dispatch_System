<?php  
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/api.php";
include "$rootDir/c.php"; 
include "$rootDir/connection.php";

//export.php  
$databaseHost = 'localhost';
$databaseName = 'jorrog3_dispatch';
$databaseUsername = 'jorrog3_dispatch';
$databasePassword = '!@#123qweasdzxc';
$connect  = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$output = '';
if(isset($_POST["export"])){


 $query = "SELECT * FROM jobs WHERE taxi_comp='$api_key' AND kdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
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
  ';
  while($row = mysqli_fetch_array($result)){
  $status=$row['job_status'];
  $driver_report=$row['driver_report'];
  if($status!="Not Assigned" and $driver_report=='Include In Reports' ){
   $output .= '
    <tr>  
                          <td>'.$row['kdate'].'</td> 
                          <td>'.$row['job_id'].'</td>   
                          <td>'.$row['src_addr'].'</td>  
                          <td>'.$row['pickupTime'].'</td>  
                          <td> '.$row['dropTime'].'</td>  
                          <td>'.$row['dest_addr'].'</td>  
                          <td> '.$row['driverId'].'</td>  
                          <td> '.$row['driver_license'].'</td>
                          <td> '.$row['operator_license'].'</td>
    </tr>
   ';
   }
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=jobs_report.xls');
  echo $output;
 }
}
?>