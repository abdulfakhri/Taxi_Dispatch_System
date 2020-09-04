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

if(isset($_POST['onsite'])) {
    $status="On Site";
    $jb="free";
    $pkd="onsite";
     
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

   $sql="UPDATE jobs SET job_status='$status' WHERE job_id='$Id'";
  
  // $sql1="UPDATE taxi_drivers SET dfree_busy='$jb',dcurrent_location='$dp',last_ride='$dropTime' WHERE driverId='$driverId'";
    
  // $resul=mysqli_query($conn, $sql1);
      
    $result=mysqli_query($conn, $sql);
   
    //if($result != null and $resul !=null) {
    if($result != null) {    
       // echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
       // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        ?>
	   <script>
       window.location.href="/vehicle/v/dwaiting.php";
      </script>
	<?php
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    ?>
    <script>
    window.location.href="/vehicle/v/onsite.php";
</script>
    <?php
    }
    mysqli_close($conn);
}

?>
<div class="container">
  
      <h4>Job Details&Status</h4> <br>
      <span style="color:#ff0055;font-size:18px">On Task</span><br>
      <form action="" method="POST">
       
         <?php include('../m/readonsitedriver_api.php');?>
       
    
    
         <input type="hidden" name="jobId" value="<?php echo $jId;?>">
         <input type="hidden" name="pk" value="<?php echo $pk;?>">
        <input type="hidden" name="dp" value="<?php echo $dp;?>">
        
       
       
        <hr>
         <input type="submit"  class="btn w3-pink"  name="onsite" value="On Site"><br>
         
     
      </form>
      
     
  
  

         
         <?php //include('readjobs.php');?>
         
       <br>
     <!--<iframe src="https://cloud.aidispatchsys.com/dispatch/chat/driverchat.php" align="bottom" style="height:35%;width:100%;border-raduis:7px;">
            
        </iframe>-->
</div>
 
<?php include ($ft);?>
       