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
        <script type="text/javascript" src="jquery-1.3.2.js"> </script>
        <?php //include ('../c/nav/chatstyle.php');?>


<?php
session_start();
include ('../c/c.php');
include_once($dbc);	
		
if(isset($_POST['save'])) {
/////////////////////////////////////////////////////////////////////    
$to=$_GET['uid'];

$apiKey=$_GET['di'];

$_SESSION['id']=$_GET['di'];

$_SESSION['to']=$_GET['uid'];

$from= $_GET['di'];

$tm=$_POST['message'];

$time=date("h:i");

$token=$_GET['di']+$_GET['uid'];

$_SESSION['chatToken']=$_GET['di']+$_GET['uid'];

///////////////////////////////////////////////////////////////
$sql="INSERT INTO chat_message(token,reciever,sender,chat_message,time,taxi_comp) VALUES('$token','$to','$from','$tm','$time','$apiKey')";

$result=mysqli_query($conn,$sql);

if($result!=null){
   $_SESSION['chatToken']=$_GET['di']+$_GET['uid'];
}else{
	//echo "Not Upload";
}
mysqli_close($conn);
	
}

?>
     <style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #000;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.lighter {
  border-color: #e6e6ff;
  background-color: #ccffcc;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style> 
   </head>
    <br>
  
   <Button class="btn-talk" onclick="BackToChathome()">Back</Button><br></br>
    <body>
      
        
        
                <form action="" method="POST" id="fupForm" name="form1" >
                    <input type="hidden"  name="to" value="<?php echo $_GET['uid'];?>">
                    
                    <input type="hidden"  name="key" value="<?php echo $_GET['di'];?>">
                     <textarea id="message" class="textarea"  name="message" placeholder="Input Text" rows="" cols=""></textarea>
                
             
                <input type="submit" class="btn-talk" name="save" value="Send Message"  id="butsave">
                </form>
   
               <hr style="color:white"> 
                <div  class="scroll">
                <?php include('readChatAPI.php');?>
              
                       <div  class="">
             
           
              </div>
                   
<script>

function BackToChathome() {
       // window.open("/dispatch/chat/newchat.php");
       location.replace("/dispatch/v/chatroom.php");
    }
    <script>

$(document).ready(function(){
     setInterval(function(){
        $('#success').load('readChatAPI.php');
     },1000);
     });
     
</script>

</script>
            
          
       
  	<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
  	<script src="js/app.js"></script>
  	
    
 