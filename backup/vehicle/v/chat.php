<?php
session_start();
include('../c/c.php');
include('../c/layout/chatstyle.php');
$_SESSION['to_chat']=$_GET['uid'];
$_SESSION['to_chatName']=$_GET['n'];
$_SESSION['token']=$_GET['t'];
include($dbc);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
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

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 1px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 100%;
  padding: 10px;
  background-color:black;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
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

<script>
        $(document).ready(function(){
        
            $("#button").click(function(){
               
                var message=$("#message").val();
                 
                $.ajax({
                    url:'cInsert.php',
                    method:'POST',
                    data:{
                       
                        message:message
                    },
                   success:function(data){
                      document.getElementById("myF").reset();
                   }
                });
            });
            
        });
</script>




<div class="chat-pop" id="myForm">

  
    <p align="right" onclick="closeForm()">&nbspX&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
  <form action="" method="POST" style="width:100%" class="" name="myF" id="myF">
    

    
    <textarea class="textarea" placeholder="Message.."  id="message" name="message" required></textarea><br>

    <button type="button" class="btn w3-green" id="button"  name="save">Send</button>
    
  </form>
  
        <hr style="color:white"> 
               <div  class="scroll">
               
              
                       <div  id="chat"> </div>
                       
                       
             </div>
</div>

<script>
    function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
    }
        var di = getUrlVars()["di"];
         var uid = getUrlVars()["uid"];
         var ke= getUrlVars()["dp"];
	function chat_ajax(){
		var req = new XMLHttpRequest();
		req.onreadystatechange = function() {
			if(req.readyState == 4 && req.status == 200){
				document.getElementById('chat').innerHTML = req.responseText;
			}
		}
		
		req.open('GET','readChatAPI.php?q='+ke,true);
		req.send(); 
	}
	
	setInterval(function(){chat_ajax()}, 1000)
</script> 
  
  
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>