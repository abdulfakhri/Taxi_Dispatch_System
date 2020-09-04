<?php include ('../c/api.php');?>
<?php include ('../c/m.php');?>
<?php include ('../c/v.php');?>
<?php include ('../c/c.php');?>
<?php include ($nav);?>

<!------------------------Data Display in Dashboard----------------------------->
<script type=""> 
$(document).ready(function(){
 fetch_timeDate();
	setInterval(function(){
	fetch_timeDate();
	},1000);
function fetch_timeDate(){
		$.ajax({
			url:"../m/dateTime.php",
			method:"POST",
			success:function(data){
				$('#clock').html(data);
			}
		})
	}
});
</script>
<?php 
include($dbc);
if(isset($_POST['confirmed'])) {
    
    $status="accepted";
    
    $Id=$_POST['jobId'];
    $s="Confirmed";
    $driverId=$_SESSION['id'];
    $tc=$_SESSION['taxi_comp'];
    
    // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  
    //$sql="INSERT INTO jobs(job_status,confirmedId)VALUES('$status','$s')  WHERE job_id='$Id'";
    
    $sql="UPDATE jobs SET job_status='$status',confirmedId='$s' WHERE job_id='$Id'";
    
    
     $result=mysqli_query($conn, $sql);

    if($result != null) {
        ?>
	   <script>

      location.replace("/vehicle/v/onsite.php?jb=<?php echo $Id;?>");
      </script>
	
	<?php
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    ?>
    
   
    <script>

  location.replace("/vehicle/v/home.php");
</script>

    <?php
    }
    mysqli_close($conn);
    
    
}

if(isset($_POST['denied'])) {
  $status="rejected";
    
    $Id=$_POST['jobId'];
    $s="rejected";
    $driverId=$_SESSION['id'];
    $tc=$_SESSION['taxi_comp'];
    
    // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  
    //$sql="INSERT INTO jobs(job_status,confirmedId)VALUES('$status','$s')  WHERE job_id='$Id'";
    
    $sql="UPDATE jobs SET job_status='$status',confirmedId='$s' WHERE job_id='$Id'";
    
    
     $result=mysqli_query($conn, $sql);

    if($result != null) {
        ?>
	   <script>

      location.replace("/vehicle/v/home.php");
      </script>
	
	<?php
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    ?>
    
   
    <script>

  location.replace("/vehicle/v/home.php");
</script>

    <?php
    }
    mysqli_close($conn);
}
?>
 <br>
<div class="container">
  
      <form action="" method="POST">

       
         <input type="hidden" name="jobId" value="<?php echo $_GET['jobId'];?>">
         
        <?php include('../m/fetchNewJob.php');?>
        
        
        <hr>
        <input type="submit" class="btn w3-green" name="confirmed" value="Accept">
         <input type="submit" class="btn w3-red" name="denied" value="Reject">
         <br></br>
     
      </form>
      
</div>
 
<?php include ($ft);?>