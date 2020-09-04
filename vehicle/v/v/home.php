<?php include ('../c/api.php');?>
<?php include ('../c/c.php');?>
<?php include ('../c/nav/n1-api.php');?>
<?php include ('../c/nav/style.php');?>

<script>
document.onkeyup = function(e) {
    
if(e.which == 97) {
    
    location.replace('/dispatch/v/dashboard.php', '_self');
    
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

<script type="text/javascript">
    function ChangeColor(tableRow, highLight)
    {
    if (highLight)
    {
      tableRow.style.backgroundColor = '#ff0000';
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


<body style="background-color:<?php echo $colormode;?>">



  <br></br>
  <center> 
  
  <br>
  
     
     <center>
<b><span style="color:white;font-size:60px" ><?PHP  echo $_SESSION['name'];?></span></b>
  <p style="color:white;font-size:30px">Powered by aiDispatchSys</p>
<ul  style="color:white;font-size:25px;border:1px solid #fff;width:50%;height:40%;border-raduis:10px;">
   <li onclick="home()"
      style="color:white;font-size:25px;float:left"
      onmouseover="ChangeColor(this, true);" 
    onmouseout="ChangeColor(this, false);"
    >A>Calls/Jobs Distribution<br></li><br>
    
    <li onclick="drivers()"  
    style="color:white;font-size:25px;float:left"
      onmouseover="ChangeColor(this, true);" 
    onmouseout="ChangeColor(this, false);"
     >B>Drivers Menu</li><br>
   
    <li onclick="openfare()" 
     style="color:white;font-size:25px;float:left"
     onmouseover="ChangeColor(this, true);" 
    onmouseout="ChangeColor(this, false);"
    >
   D>Fare Setup </li> <br> 
    <li onclick="openReports()" 
    style="color:white;font-size:25px;float:left"
     onmouseover="ChangeColor(this, true);" 
    onmouseout="ChangeColor(this, false);"
    >E>Reports</li><br>
     <li onclick="createDispatcher()" 
      style="color:white;font-size:25px;float:left"
      onmouseover="ChangeColor(this, true);" 
    onmouseout="ChangeColor(this, false);"
     >F>Create Dispatcher</li><br>
     <li onclick="signout()" 
      style="color:white;font-size:25px;float:left"
      onmouseover="ChangeColor(this, true);" 
    onmouseout="ChangeColor(this, false);"
     >G>Exit</li><br>
    

</ul>
</center>
     
   
  


   
</body>
</html>