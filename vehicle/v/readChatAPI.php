 <html>
 <head>
  <meta http-equiv="refresh" content="">

<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: <?php echo $back; ?>;
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
include('../c/layout/chatstyle.php');

//include('../c/layout/style.php');

include('/home/aidifxin/cloud/vehicle/c/api.php');
 
include('/home/aidifxin/cloud/vehicle/c/c.php');
 
include('/home/aidifxin/cloud/vehicle/c/connection.php');

$apiKey=$_SESSION['taxi_comp'];

$from=$_SESSION['id'];


$token=$_SESSION['taxi_comp']+$_SESSION['id'];
      
     $fetch = mysqli_query($conn, "SELECT * FROM chat_message WHERE taxi_comp='$apiKey' AND token='$token' ORDER BY date_reg DESC");
     while($row = mysqli_fetch_assoc($fetch)){
       
       $sender=$row['sender'];
       $reciever= $row['reciever'];
       $taxiC= $row['taxi_comp'];
       
       //if($sender===$from and $apiKey===$taxiC){
     
       
       if($sender!=null and $reciever==null ){
           
           //$person=$sender;
           $person="You:";
           $position="right";
           $timeposition="time-left";
           $bg="";
       }else if($reciever!=null and $sender==null){
           //$person=$toP;
           $person="System:";
           $position="left";
           $timeposition="time-right";
           $bg="darker";
       }
       $fn= $row['filename'];
       $f= $row['chat_message'];
       $t=$row['date_reg'];
       
       
  ?>
                       <div class="container <?php echo $bg;?>">
                       <p class="<?php echo $position;?>" style="width:100%;" style="color:"><?php echo $person;?></p>
                       <p class="" style="width:100%;" style="color:"><?php echo $f;?></p>
                       <span class="<?php echo $timeposition;?>"><?php echo $t;?></span>
                       </div>
    
    <?PHP    
       }
   //  }
    ?>
   </body>
</html>
 
 