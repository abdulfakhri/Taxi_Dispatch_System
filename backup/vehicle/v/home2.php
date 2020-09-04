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

<div class="container">
  
    <?php include('/home/aidifxin/cloud/vehicle/m/driverProfile.php');?>
     
     
  
</div>

         
 <hr>    
<?php //include('chat.php');?>


<?php include ($ft);?>
       