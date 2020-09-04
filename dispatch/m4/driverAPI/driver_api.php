<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
header('Location: /dispatch/index.php');
}
?>

<?php
//Database connection by using PHP PDO

$username = 'aidifxin_abfa';
$password = '!@#123qweasdzxc';
$connection = new PDO( 'mysql:host=localhost;dbname=aidifxin_dispatch', $username, $password ); // Create Object of PDO class by connecting to Mysql database

if(isset($_POST["action"])){ 
 //For Load All Data
 if($_POST["action"] == "Load"){
  $api_key=$_SESSION['id'];
  $statement = $connection->prepare("SELECT * FROM taxi_drivers WHERE taxi_comp='$api_key' ORDER BY driver_id DESC");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
     <th width="20%">Driver#</th>
     <th width="20%">Driver Name</th>
     <th width="20%">Driver Phone</th>
     <th width="20%">Vehicle#</th>
     <th width="10%">Modify</th>
     <th width="10%">Remove</th>
    </tr>
  ';
  if($statement->rowCount() > 0){
   foreach($result as $row){
    $output .= '
    ?>
    <tr>
        
     <td>'.$row["driver_id"].'</td>
     <td>'.$row["driver_name"].'</td>
     <td>'.$row["driver_phone"].'</td>
     <td>'.$row["license_plate"].'</td>
     
     
       <td><button type="button" class="btn-sm" style="color:white;" id="ebtn"><a href="/dispatch/v/editDrivers.php?d='.$row['driverId'].'">Modify<a></button></td>
     <td><button type="button" id="'.$row['driverId'].'"    class="btn-sm btn-danger btn-xs delete">Delete</button></td>
    </tr>
<?php    
    ';
   }
  }else{
   $output .= '
    <tr>
     <td align="center">Data not Found</td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 //This code for Create new Records

if($_POST["action"] == "Create"){
  
echo $_POST["driver_name"];
echo $_POST["driver_phone"];
echo $_POST["driver_email"];
echo $_POST["home_address"];
echo $_POST["driver_level"];
echo $_POST["driving_license"];
echo $_POST["operator_license"];
echo $_POST["call_sign"];
echo $_POST["passenger"];
echo $_POST["wheelchair"];
echo $_POST["bags"];
echo $_POST["type"];
echo $_POST["image"];
echo $_POST["color"];
$_POST["license_plate"];
  
  
  
$statement = $connection->prepare("
INSERT INTO taxi_drivers(
driver_name,
driver_email,
home_address,
driver_phone,
driving_license,
driver_level,
operator_license,
call_sign,
passenger,
wheelchair,
bags,
type,
image,
color,
license_plate,
taxi_comp
)VALUES(
:driver_name,
:driver_email,
:home_address,
:driver_phone,
:driver_level,
:operator_license,
:driving_license,
:call_sign,
:passenger,
:wheelchair,
:bags,
:type,
:image,
:color,
:license_plate,
:key)
  ");
  $result = $statement->execute(
   array(
    ':driver_name' => $_POST["driver_name"],
    ':driver_phone' => $_POST["driver_phone"],
    ':driver_email' => $_POST["driver_email"],
    ':home_address' => $_POST["home_address"],
    ':driver_level' => $_POST["driver_level"],
    ':driving_license' => $_POST["driving_license"],
    ':operator_license' => $_POST["operator_license"],
    ':call_sign' => $_POST["call_sign"],
    ':passenger' => $_POST["passenger"],
    ':wheelchair' => $_POST["wheelchair"],
    ':bags' => $_POST["bags"],
    ':type' => $_POST["type"],
    ':image' => $_POST["image"],
    ':color' => $_POST["color"],
    ':license_plate' => $_POST["license_plate"],
    ':key' => $_SESSION['id']
   )
  );
  if(!empty($result))
  {
   echo 'Driver Registered';
  }
 
 }

 //This Code is for fetch single customer data for display on Modal
 /*
 if($_POST["action"] == "Select"){
     $idd=$_POST['driver_id'];
     $api=$_SESSION['id'];
     
  $output = array();
  $statement = $connection->prepare(
   "SELECT * FROM  taxi_driver WHERE taxi_comp='$api' AND driver_id='$idd'");
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
       
   $output["driver_name"] = $row["driver_name"];
   $output["driver_phone"] = $row["driver_phone"];
   $output["driver_license "] = $row["driver_license"];
   
  }
  echo json_encode($output);
 }
 //if (isset($_POST['update'])){
 if($_POST["action"] =="Update"){
     
   
     
  $statement = $connection->prepare(
   "UPDATE taxi_drivers
   SET
driver_name = :driver_name,
driver_email = :driver_email,
home_address = :home_address,
driver_phone = :driver_phone,
driving_license = :driving_license,
driver_level= :driver_level,
operator_license= :operator_license,
call_sign= :call_sign,
passenger= :passenger,
wheelchair= :wheelchair,
bags= :bags,
type= :type,
image= :image,
color= :color,
license_plate= :license_plate,
WHERE driver_id = :driver_id AND taxi_comp =:key
   "
  );
  $result = $statement->execute(
   array(
    ':driver_name' => $_POST["driver_name"],
    ':driver_phone' => $_POST["driver_phone"],
    ':driver_email' => $_POST["driver_email"],
    ':home_address' => $_POST["home_address"],
    ':driver_level' => $_POST["driver_level"],
    ':driving_license' => $_POST["driving_license"],
    ':operator_license' => $_POST["operator_license"],
    ':call_sign' => $_POST["call_sign"],
    ':passenger' => $_POST["passenger"],
    ':wheelchair' => $_POST["wheelchair"],
    ':bags' => $_POST["bags"],
    ':type' => $_POST["type"],
    ':image' => $_POST["image"],
    ':color' => $_POST["color"],
    ':license_plate' => $_POST["license_plate"],
    ':driver_id' => $_POST["driver_id"],
    ':key' => $_SESSION['id']
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
  */
  
 if($_POST["action"] == "Delete"){
  $statement = $connection->prepare(
   "DELETE FROM taxi_drivers WHERE driverId = :id AND taxi_comp= :key"
  );
  $result = $statement->execute(
   array(
    ':id' => $_POST["driverId"],
    ':key' => $_SESSION['id']
   )
  );
  if(!empty($result))
  {
   echo 'Driver Deleted';
  }
 }


}
    



?>