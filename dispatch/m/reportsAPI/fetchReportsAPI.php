<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 
$kId=$_SESSION['id'];
$drId=$_GET['d'];
$sql = "SELECT date_reg,job_id,src_addr,ptime,dtime,driverId,driver_license FROM jobs WHERE taxi_comp='$kId' AND driverId='$drId'";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  

$columnHeader = "Date" 
. 
"\t"
. 
"Job#" 
. 
"\t" 
. 
"Pickup" 
. 
"\t"
. 
"C/Pick Time" 
. 
"\t"
. 
"D/Drop Time" 
. 
"\t"
. 
"Driver" 
. 
"\t"
.
"Driver Lic"
;  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Driver_Report.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?>