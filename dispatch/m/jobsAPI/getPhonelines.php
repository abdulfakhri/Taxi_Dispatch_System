
<?php
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 
if($_REQUEST['empid']) {
$sql = "SELECT  *  FROM urlSend WHERE taxi_comp='$api_key' AND id='".$_REQUEST['empid']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$data = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
$data = $rows;
}
echo json_encode($data);
} else {
echo 0;
}
?>