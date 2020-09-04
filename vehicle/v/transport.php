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
	fetch_NewJobs();
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
	
	function fetch_NewJobs(){
		$.ajax({
			url:"../m/readNewJobsAPI.php",
			method:"POST",
			success:function(data){
				$('#newjob').html(data);
			}
		})
	}
	
});
</script>
<div id="newjob"></div>
<?php 
include($dbc);

if(isset($_POST['dropped'])) {
    $status="finished";
    $jb="free";
    $pkd="droped";
     
    $pk=$_POST['pk'];
    $dp=$_POST['dp'];
    //$dp=$_POST['dp'];
   // $dp='New York,USA';
    $Id=$_POST['jobId'];
    $driverId=$_SESSION['id'];
    $tc=$_SESSION['taxi_comp'];
    
    $dropTime=date("Y-m-d h:i:s");
    
    // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

   $sql="UPDATE jobs SET job_status='$status',pickup_drop='$pkd',dropTime='$dropTime' WHERE job_id='$Id'";
  
   $sql1="UPDATE taxi_drivers SET dfree_busy='$jb',dcurrent_location='$dp',last_ride='$dropTime' WHERE driverId='$driverId'";
    
   $resul=mysqli_query($conn, $sql1);
      
    $result=mysqli_query($conn, $sql);
   
    if($result != null and $resul !=null) {
        
       // echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
       // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        ?>
	   <script>
       window.location.href="/vehicle/v/home.php";
      </script>
	<?php
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    ?>
    <script>
    window.location.href="/vehicle/v/home.php";
</script>
    <?php
    }
    mysqli_close($conn);
}

if(isset($_POST['cancel'])) {
    $status="canceled";
    $Id=$_POST['jobId'];
    $driverId=$_SESSION['id'];
    $tc=$_SESSION['taxi_comp'];
    // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    $sql="UPDATE jobs SET job_status='$status' WHERE job_id='$Id'";
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
<div class="container">
  
       <h4>Job Details&Status</h4> 
      <h5 style="color:#ff0055;font-size:18px">Transporting...</h5>
      <form action="" method="POST">
        
         <?php include('../m/readTransporting_api.php');?>
       
    
    
         <input type="hidden" name="jobId" value="<?php echo $jId;?>">
         <input type="hidden" name="pk" value="<?php echo $pk;?>">
        <input type="hidden" name="dp" value="<?php echo $dp;?>">
      
        <hr>
        <input type="submit"  class="btn w3-blue"  name="dropped" value="Dropped Off"> <input type="submit"  class="btn w3-pink"  name="cancel" value="Cancel">
         
     
      </form>
      
     
  
  

         
         <?php //include('readjobs.php');?>
         
       <br>
     <!--<iframe src="https://cloud.aidispatchsys.com/dispatch/chat/driverchat.php" align="bottom" style="height:35%;width:100%;border-raduis:7px;">
            
        </iframe>-->
</div>
 
<?php include ($ft);?>
       