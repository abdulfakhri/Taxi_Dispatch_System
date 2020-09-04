<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
header('Location: /index.php');
}
?>
<?php include ('../c/c.php');?>


<?php 
include ($dbc);
$ac=$_SESSION['id'];
$taxi_comp=$_SESSION['taxi_comp'];
//$resul = mysqli_query($conn,"SELECT * FROM jobs WHERE taxi_comp='$taxi_comp' ORDER BY date_reg ASC");
$resul = mysqli_query($conn,"SELECT * FROM jobs WHERE driverId='$ac' AND confirmedId='not confirmed' ORDER BY date_reg DESC LIMIT 1");
if($resul != null){
while($res2 = mysqli_fetch_array($resul)) {
    
$jId=$res2['job_id'];

$_SESSION['jobId']=$res2['job_id'];
$pk=$res2['src_addr'];
$dp=$res2['dest_addr'];
$_SESSION['src_addr']=$res2['src_addr'];
$_SESSION['dest_addr']=$res2['dest_addr'];
    
?>

<script>

window.location.href="/vehicle/v/newjob.php?jobId=<?php echo $jId;?>&p=<?php echo $pk;?>";

</script>
<?php    
  }
}else{
?>
<script>
    window.location.href="/vehicle/v/home.php?jobId=<?php echo $jId;?>";
</script>
<?php
}
?>
               
  