<?php 
 include('/home/aidifxin/cloud/dispatch/c/api.php');
 
 include('/home/aidifxin/cloud/dispatch/c/c.php');
 
 $api_key=$_SESSION['id'];
 
 ?>
<?php
//Database connection by using PHP PDO
$username = 'aidifxin_abfa';
$password = '!@#123qweasdzxc';
$connection = new PDO( 'mysql:host=localhost;dbname=aidifxin_dispatch', $username, $password ); // Create Object of PDO class by connecting to Mysql database

if(isset($_POST["action"])){ //Check value of $_POST["action"] variable value is set to not
 //For Load All Data
 
 if($_POST["action"] == "Load"){
  $api_key=$_SESSION['id'];
  $statement = $connection->prepare("SELECT * FROM fares WHERE taxi_comp='$api_key' ORDER BY id DESC");
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
        



    <td><a href="/dispatch/v/fare.php?fid=<?php echo $row["id"];?>">Modify</a></td>
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