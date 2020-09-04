<html>
 <head>
 
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
<body>
<?php
session_start();
include('../c/c.php');
include('../c/nav/chatstyle.php');
include($dbc);
include('../c/layout/chatstyle.php');
include "$rootDir/vehicle/c/connnection.php";


$apiKey=$_SESSION['taxi_comp'];

$token=$_SESSION['id']+$_SESSION['taxi_comp'];

//$token=$_GET['q'];
//$token=68;

      
     $fetch = mysqli_query($conn, "SELECT * FROM chat_message WHERE taxi_comp='$apiKey' AND token='$token' ORDER BY date_reg DESC");
     
     while($row = mysqli_fetch_assoc($fetch)){
       
       $sender=$row['sender'];
      
       $taxiC= $row['taxi_comp'];
       
       $system=$_SESSION['taxi_comp'];
       
       $driver=$_SESSION['id'];
       
      
       $reciever=$row['reciever'];
       
       
       
       if($sender===$system){
           
           $person="System";
           
           $position="right";
           $timeposition="time-right";
           $bg="";
       }else if($sender===$driver){
           
          $person="You";
           $position="left";
           $timeposition="time-right";
           $bg="darker";
       }
       
       $f= $row['chat_message'];
       $t=$row['date_reg'];
       
       
  ?>
                       <div class="container <?php $bg;?>">
                       <p class="<?php echo $position;?>" style="" style="color:"><?php echo $person;?>:
                       <?php echo $f;?> 
                       
                       </p>
                       <p class="" style="width:95%;" style="color:"></p>
                       <span class="<?php echo $timeposition;?>"><?php echo $t;?></span>
                       </div>
    
    <?PHP    
       }
  
?>

   </body>
</html>