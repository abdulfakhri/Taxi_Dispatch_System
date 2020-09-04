<?php include('../c/v.php');?>
<!DOCTYPE html>
<html lang="en">
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-quarter img{margin-bottom: -6px; cursor: pointer}
.w3-quarter img:hover{opacity: 0.6; transition: 0.3s}
</style>
<body class="w3-<?php echo $back; ?>">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-<?PHP echo $top_color;?>w3-animate-<?PHP echo $top_menu_align;?> w3-top w3-text-black w3-large" style="z-index:3;width:250px;font-weight:bold;display:none;<?PHP echo $top_menu_align;?>:0;" id="mySidebar">
   <a href="javascript:void()" onclick="w3_close()" class="w3-bar-item w3-button w3-<?PHP echo $top_menu_align;?> w3-padding-4">X</a> 
  
 
    <hr>
   
    <?PHP echo $profile;?>
    
    <b><?PHP  echo $_SESSION['name'];?></b>
   
    <hr>
      <a href="<?PHP echo $shifthistory;?>" class="w3-bar-item"><?PHP echo $JobView;?></a>
      
      <a href="/vehicle/v/shifthistory.php" class="w3-bar-item"><?PHP echo $History;?></a>
      
      <a href="<?PHP echo $shifthistory;?>" class="w3-bar-item"><?PHP echo $WhatsNew;?></a>
    
      <a href="<?PHP echo $shifthistory;?>" class="w3-bar-item"><?PHP echo $Training;?></a>
  
      <hr>
     <?PHP echo $signout;?>
     </span>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-<?PHP echo $top_color;?> w3-xlarge w3-padding-12">
  <span class="w3-<?PHP echo $top_contents_align;?> w3-padding"><a href="<?php echo $hometitle;?>"><?PHP echo $name;?></a></span>
    <span class="w3-<?PHP echo $top_contents_align;?> w3-padding" onclick="openForm()">Chat</span>
  <a href="javascript:void(0)" class="w3-<?PHP echo $top_menu_align;?> w3-button w3-white" onclick="w3_open()">☰</a>
  
  
    
    

</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content" style="max-width:100%;margin-top:50px">