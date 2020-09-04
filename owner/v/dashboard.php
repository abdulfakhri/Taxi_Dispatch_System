<?php include ('../c/api.php');?>
<?php include ('../c/linkApi.php');?>

  <div style="1px solid fff">
        <!--Jobs table-->
       <div class="col-lg-8" style="background-color:<?PHP echo $colormodeComponent;?>;  border-radius:5px;width:80%; border:px solid #ccc">
            <div style="height:20%">
            <div class="title" style="background-color:<?PHP echo $colormodeComponent;?>; border-radius: width:20%;5px; border:;font-size:30px;cursor:pointer;float:left">Jobs Distributions
            <br>
            <p style="font-size:12px;cursor:pointer">powered by: aiDispatchSys</p>
            <span style="font-size:20px;cursor:pointer" onclick="openNav()">New Job</span>|
          <span  style="font-size:20px;cursor:pointer" onclick="openMap()">Map</span>
            </div>
              
             <div class="col-lg-4" style="background-color:<?PHP echo $colormodeComponent;?>; border-radius: width:40%;5px; border:">
              
              <span style="font-size:25px;cursor:pointer;float:left" >Phone Lines</span> 
             <div class="" id="PhoneList"></div>
            </div>
             <div class="col-lg-4" style="background-color:<?PHP echo $colormodeComponent;?>; border-radius: width:40%;5px; border: ">
            <span style="font-size:25px;cursor:pointer;float:right" id='clock'></span> 
           <div class="" id="driverStatus"></div>
 
            </div>
            
            </div>
           
            
            <div style="height:60%">
            
         
             <?php include($vlist);?>
         
            </div>
            
               
       </div>      
      <!--Phone Lines-->
       <div class="col-lg-4" style="background-color:black;  border-radius:7px;width:20%;height:; border:px solid #fff">
        
       <iframe src="chatroom.php" style="height:85%;width:100%;border-raduis:7px;">
            
        </iframe>
     
     </div>
       
</div>
<script>  
$(document).ready(function(){

	fetch_user();

	setInterval(function(){
		
		fetch_user();
		
	}, 5000);

	function fetch_user(){
		$.ajax({
			url:"chatMember.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
			}
		})
	}
});  
</script>


<script>
$(document).ready(function(){

       
        fetch_DriverStatus();
	       fetch_PhoneList();
	   
     
    setInterval(function(){
    	ChatRoom();
	    fetch_DriverStatus();
	       fetch_PhoneList();
	     
	},5000);
	

 
    function fetch_DriverStatus(){
		$.ajax({
		   
			url:"/dispatch/m/driverAPI/driverStatus.php",
			method:"POST",
			success:function(data){
				$('#driverStatus').html(data);
			}
		})
	}
    function fetch_PhoneList(){
		$.ajax({
		   
			url:"/dispatch/m/calllogsAPI/phoneList.php",
			method:"POST",
			success:function(data){
				$('#PhoneList').html(data);
			}
		})
	}
	

	
});
</script> 

<?php include ($ft);?>