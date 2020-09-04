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