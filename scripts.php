<!------------------------Data Display in Dashboard----------------------------->
<script type=""> 
$(document).ready(function(){
 fetch_timeDate();
	setInterval(function(){
	fetch_timeDate();
	},1000);
function fetch_timeDate(){
		$.ajax({
			url:"/dispatch/m/dashbaordAPI/dateTime.php",
			method:"POST",
			success:function(data){
				$('#clock').html(data);
			}
		})
	}
});
</script>
<!------------------------------------------------------------------------------>

<!------------------------Keyboard Commands------------------------------------->
<script>
document.onkeyup = function(e) {
if(e.ctrlKey &&e.which == 78) {
    openNav(); 
    
} else if (e.ctrlKey &&e.which ==67 ) {
    closeNav();
    closeNavi();
    
}else if (e.ctrlKey &&e.which == 81) {
    
   location.replace('/dispatch/v/home.php', '_self');
   
} else if (e.ctrlKey &&e.which == 83) {
    
       location.replace('/dispatch/v/settings.php', '_self');
      
} else if ( e.ctrlKey && e.which == 68) {

    location.replace('/dispatch/v/reg_dispatcher.php', '_self');
    
}else if (e.ctrlKey &&e.which == 72) {
    
       location.replace('/dispatch/v/dashboard.php', '_self');
      
}else if (e.ctrlKey &&e.which == 85) {
    
       location.replace('/dispatch/v/createDrivers.php', '_self');
      
}else if (e.ctrlKey &&e.which == 82) {
    
       reload();
      
}else if (e.ctrlKey &&e.which == 70) {
    
       location.replace('/dispatch/v/fare.php', '_self');
      
}
}

</script>
<script>
  function openfare() {
      window.location.href = "/dispatch/v/fare.php";
    }
    function createFare() {
      window.location.href = "/dispatch/v/faresetup.php";
    }
    function openReports() {
      window.location.href = "/dispatch/v/reports.php";
    }
   function TalkToAll() {
       // window.open("/dispatch/chat/newchat.php");
       window.location.href ="/dispatch/chat/chatone.php";
    }
    function BackToChathome() {
       // window.open("/dispatch/chat/newchat.php");
       window.location.href ="/dispatch/chat/talkhome.php";
    }
   function OpenMap() {
        window.open("/dispatch/v/map.php", '_blank');
     
    }
    
     function OpenJob() {
       location.replace('/dispatch/v/createjb.php', '_self');
     
    }
     
    function refresh() {
      location.reload(); 
    }
   function menu() {
      window.location.href = "/dispatch/v/home.php";
    }
   
    function home() {
        //window.open("/dispatch/v/home.php");
      window.location.href = "/dispatch/v/dashboard.php";
    }
   // setTimeout("home()",0 );
    
    function liveCamera() {
        window.open("/dispatch/v/citycamera.php", "_blank");
     // window.location.href = "/dispatch/v/citycamera.php";
    }
    function drivers() {
      window.location.href = "/dispatch/v/createDrivers.php";
    }
    function vehicles() {
      window.location.href = "/dispatch/v/vehicles.php";
    }
    function createdriver() {
      window.location.href = "/dispatch/v/regdriver.php";
    }
    function createVehicle() {
      window.location.href = "/dispatch/v/regdriver.php";
    }
     function createDispatcher() {
      window.location.href = "/dispatch/v/reg_dispatcher.php";
    }
     function suspension() {
      window.location.href = "/dispatch/v/suspension.php";
    }
     function settings() {
      window.location.href = "/dispatch/v/settings.php";
    }
     function signout() {
      window.location.href = "/dispatch/u/signout.php";
    }
     function chat() {
      window.open("/dispatch/chat/hm.php","_blank");     
     // window.location.href = "/dispatch/chat/hm.php";
    }
</script> 
<!----------------Row Table Color Change--------------------------------->
 <script type="text/javascript">
    function ChangeColor(tableRow, highLight)
    {
    if (highLight)
    {
      tableRow.style.backgroundColor = '#ffbf00';
    }
    else
    {
      tableRow.style.backgroundColor = '';
    }
  }

  function DoNav(theUrl)
  {
  document.location.href = theUrl;
  }
</script>
  