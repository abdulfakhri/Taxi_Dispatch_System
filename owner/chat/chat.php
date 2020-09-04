<?php
include('../c/c.php');
include('../c/nav/chatstyle.php');

include($dbc);
if(!isset($_SESSION['id'])){
	header("location:login.php");
}
?>


		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <?php //include ('../c/nav/chatstyle.php');?>
<script>

function BackToChathome() {
       // window.open("/dispatch/chat/newchat.php");
       location.replace("/dispatch/chat/talkhome.php");
    }
$(document).ready(function(){
     setInterval(function(){
        $('#success').load('readChat.php');
     },1000);
     });
     
</script>
      <?php
session_start();
include ('../c/c.php');
include_once($dbc);	
		
if(isset($_POST['save'])) {
/////////////////////////////////////////////////////////////////////    
$to=$_GET['uid'];

//$apiKey=$_SESSION['taxi_comp'];

$apiKey=$_GET['di'];

$from= $_GET['di'];

$tm=$_POST['message'];

$time=date("h:i");

$token=$_GET['di']+$_GET['uid'];

$_SESSION['chatToken']=$token;
///////////////////////////////////////////////////////////////
$sql="INSERT INTO chat_message(token,reciever,sender,chat_message,time,taxi_comp) VALUES('$token','$to','$from','$tm','$time','$apiKey')";

$result=mysqli_query($conn,$sql);

if($result){
		//echo "Upload";
		//header('Location: /dispatch/chat/chatone.php?t='.$token.'&'.'uid='.$to.'&n='.$tname);
}else{
	//echo "Not Upload";
}
mysqli_close($conn);
	
}

?>
      
   </head>
    <br>
  
   <Button class="btn-talk" onclick="BackToChathome()">Back</Button><br></br>
    <body>
      
        
               <!-- <div id="controls">
                    <button id="recordButton" class="btn-speak-sm"><i style='font-size:50px;color:red' class="fa fa-microphone"></i></button>
               
  	               <button  class="btn-speak" id="pauseButton" disabled>Pause</button>
  	               <button class="btn-speak" id="stopButton" disabled>Stop</button>
                </div>-->
                
        
                <form action="" method="POST" id="fupForm" name="form1" >
                    <input type="hidden"  name="to" value="<?php echo $_GET['uid'];?>">
                    <input type="hidden"  name="token" value="<?php echo $_GET['t'];?>">
                    <input type="hidden"  name="key" value="<?php echo $_GET['di'];?>">
                     <textarea id="message" class="textarea"  name="message" placeholder="Input Text" rows="" cols=""></textarea>
                
             
                <input type="submit" class="btn-talk" name="save" value="Send Message"  id="butsave">
                </form>
                
    <!-- <hr style="color:white">            
                <p align="left" style="size:15px" id="recordingsList"></p> -->
    <hr style="color:white"> 
               <div  class="scroll">
                       
              <div id="success"></div>
            <?php //include('readChat.php');?>
                
                     
                </div>
                   
             
            
          
       
  	<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
  	<script src="js/app.js"></script>
  	
    
<?php //include($ft);?> 