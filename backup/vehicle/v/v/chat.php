<?php
include ('../c/api.php');
include('../c/c.php');
include('../c/nav/chatstyle.php');
?>

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	       


                
 <script>
        $(document).ready(function(){
        
            $("#button").click(function(){
                var to=$("#to").val();
                var message=$("#message").val();
                 var key=$("#key").val();
                 var token=$("#token").val();
                $.ajax({
                    url:'cInsert.php',
                    method:'POST',
                    data:{
                        to:to,
                        token:token,
                        key:key,
                        message:message
                    },
                   success:function(data){
                      document.getElementById("myForm").reset();
                   }
                });
            });
            
        });
    </script>








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
  
   <button class="btn-talk" onclick="BackToChathome()">Back</Button><br></br>
    <body>
      
        
        
                <form  action=""  method="POST" id="myForm" name="myForm">
                    <input type="hidden" id="to"  name="to" value="<?php echo $_GET['uid'];?>">
                    
                    <input type="hidden" id="key" name="key" value="<?php echo $_GET['di'];?>">
                    <input type="hidden" id="token" name="token" value="<?php echo $_GET['dp'];?>">
                     <textarea id="message" class="textarea"  name="message" placeholder="Message..." rows="" cols=""></textarea>
                
             
                <input type="button" class="btn-talk" id="button" name="savebutton" value="Send" >
               
                </form>
   
               <hr style="color:white"> 
                <div  class="scroll">
               
              
                       <div  id="chat"> </div>
                       
                       
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
</div>
                   
<script>

function BackToChathome() {
       
       location.replace("/dispatch/v/chatroom.php");
    }
</script>