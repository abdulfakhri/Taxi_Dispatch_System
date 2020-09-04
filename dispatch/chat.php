<?php
include('../c/c.php');
include('../c/layout/chatstyle.php');
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

$(document).ready(function(){
     setInterval(function(){
        $('#success').load('readChatAPI.php');
     },1000);
     });
     
</script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: block;
  position: fixed;
  bottom: 0;
  right: 0px;
  height:60%;
  width:100%;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 100%;
  padding: 0px;
  background-color: white;
  min-height: 20%;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 0px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 30%;
  
}

.scroll{
    height: 85%;
  font-size:35px;
  overflow-x: hidden; 
  overflow-x: auto; 
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>




<?php
session_start();
include ('../c/c.php');
include_once($dbc);	
		
if(isset($_POST['save'])) {
/////////////////////////////////////////////////////////////////////    
$to=$_SESSION['taxi_comp'];

$apiKey=$_SESSION['taxi_comp'];

$from=	$_SESSION['id'];

$tm=$_POST['message'];

$time=date("h:i");

$token=$_SESSION['taxi_comp']+$_SESSION['id'];

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

<div class="chat-popup" id="myForm">
    <button type="button" class="btn" onclick="closeForm()">Close</button>
  <form action="" method="POST" class="form-container">
    

    
    <textarea placeholder="Type message.." name="message" required></textarea>

    <button type="submit" class="btn w3-green" name="save">Send</button>
    
  </form>
  
        <div  class="scroll">
                       
              <div id="success"></div>
           
        </div>
</div>


  
  
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>  