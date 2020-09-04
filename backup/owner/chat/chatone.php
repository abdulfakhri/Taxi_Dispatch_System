<?php
include('../c/c.php');
include('../c/nav/chatstyle.php');
session_start();
$_SESSION['to_chat']=$_GET['uid'];
$_SESSION['to_chatName']=$_GET['n'];
$_SESSION['token']=$_GET['t'];
include($dbc);
if(!isset($_SESSION['id'])){
	header("location:login.php");
}
?>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      
<script>

function BackToChathome() {
       // window.open("/dispatch/chat/newchat.php");
       window.location.href ="/dispatch/chat/talkhome.php";
    }
$(document).ready(function(){
     setInterval(function(){
        $('#success').load('readChat.php');
     },1000);
     });
     
</script>
    
      
   </head>
    <br>
  
    <body>
      
        
                <form action="uploadT.php" method="POST" id="fupForm" name="form1" >
                    <input type="hidden"  name="to" value="<?php echo $_GET['uid'];?>">
                    <input type="hidden"  name="token" value="<?php echo $_GET['t'];?>">
                    
                     <textarea id="message" class="textarea"  name="message" placeholder="Input Text" rows="" cols=""></textarea>
                
             
                <input type="submit" class="btn-talk" name="save" value="Send Message"  id="butsave">
                </form>
                
   
    <hr style="color:white"> 
               <div  class="scroll">
                       
              <div id="success"></div>
           
                
                     
                </div>
                   
    