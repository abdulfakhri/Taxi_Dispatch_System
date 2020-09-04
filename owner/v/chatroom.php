<?php
session_start();
//include('../c/c.php');
include('../c/connection.php');
//include($dbc);
if(!isset($_SESSION['id'])){
	header("location:login.php");
}
?>

        
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
  		
  	   <?php include ('../c/nav/chatstyle.php');?>
    </head>  


    <body>  
    <!-- inserting these scripts at the end to be able to use all the elements in the DOM -->
  	<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
  	<script src="js/app.js"></script>
       
          <center><h2  style='color:#fff'><b>Radio Copy</b></h2><br>
          
          </center> 
          
          <br>
            <div class="title" id="user_details"></div>
       </div>
       
       <div class="wrapper">
           	<button class="button" onclick="TalkToAll()"><b>Text</b></button>
          </div>
           
       </div>
	 
<br>
              
 
<script>  
$(document).ready(function(){

	fetch_user();

	setInterval(function(){
		
		fetch_user();
		
	}, 5000);

	function fetch_user(){
		$.ajax({
			url:"chatM.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
			}
		})
	}
});  
</script>
<?php include($ft);?>