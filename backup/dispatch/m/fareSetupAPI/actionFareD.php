<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 
 
 $api_key=$_SESSION['id'];
 
 ?>
<?php

if(isset($_POST["action"])){ //Check value of $_POST["action"] variable value is set to not
 //For Load All Data
 
 if($_POST["action"] == "Load"){
  $api_key=$_SESSION['id'];
    
  $statement = $connPDO->prepare("SELECT * FROM fares WHERE taxi_comp='$api_key' ORDER BY id DESC");
  $statement->execute();
  $result = $statement->fetchAll();
  if( $result !=null){
  ?>
  
  <table class="table table-bordered">
    <tr>
    <th>Modify</th>
     <th width="33%">Car Class</th>
     <th width="33%">Pick Up</th>
     <th width="34%">Drop Off</th>
    </tr>
  
<?php 
if($statement->rowCount() > 0){
foreach($result as $row){ 
?>
    <tr>
        



    <td><a href="/dispatch/v/faremodify.php?fid=<?php echo $row["id"];?>">Modify</a></td>
    <td> <?php echo $row["car_class"];?></td>
    <td> <?php echo $row["pick_up"];?></td>
    <td> <?php echo $row["drop_off"];?></td>
    
    </tr>
    
<?php
    }
  }else{
   echo "No Data Found";
   
  }
 }
}
}
?>