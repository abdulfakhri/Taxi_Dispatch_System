<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 
 
 $api_key=$_SESSION['id'];
 
 ?>
<?php

if(isset($_POST["action"])){ //Check value of $_POST["action"] variable value is set to not
 //For Load All Data
 
 if($_POST["action"] == "Load"){
   $kd=$_GET['key'];
  $api_key=$_SESSION['id'];
  $statement = $connPDO->prepare("SELECT * FROM fares WHERE taxi_comp='$api_key' AND id='$kd'  ORDER BY id DESC");
  $statement->execute();
  $result = $statement->fetchAll();
 
  ?>
  
  <table class="table table-bordered">
    <tr>
    <th>Modify</th>
     <th width="%">UptoDistance(miles)</th>
     <th width="%">Increment(miles)</th>
     <th width="%">Charg Per Increment</th>
    </tr>
  
<?php 
if($statement->rowCount() > 0){
foreach($result as $row){ 
?>
    <tr>
    <td><a href="/dispatch/v/fsetup.php?fid=<?php echo $row["id"];?>">Modify</a></td>
    <td> <?php echo $row["increment"];?></td>
    <td> <?php echo $row["distance_charg"];?></td>
    <td> <?php echo $row["rounding_method"];?></td>
    
    </tr>
    
<?php
    }
  }else{
   echo "No Data Found";
   
  }
 }
}
?>