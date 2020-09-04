<?php 
 $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
 include "$rootDir/api.php";
 include "$rootDir/connnection.php";
 $api_key=$_SESSION['id']; 
?>
 
<?php
//Database connection by using PHP PDO

$username = 'jorrog3_dispatch';
$password = '!@#123qweasdzxc';
$connPDO = new PDO( 'mysql:host=localhost;dbname=jorrog3_dispatch', $username, $password );  

if(isset($_POST["action"])){ //Check value of $_POST["action"] variable value is set to not
 //For Load All Data
 if($_POST["action"] == "Load"){
  $api_key=$_SESSION['id'];
  $statement = $connPDO->prepare("SELECT * FROM dispatcher WHERE taxi_comp='$api_key' ORDER BY id DESC");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
     <th width="20%">Name</th>
     <th width="20%">Password</th>
     <th width="20%">CompanyCode</th>
     <th width="20%">Update</th>
     <th width="20%">Delete</th>
    </tr>
  ';
  if($statement->rowCount() > 0){
   foreach($result as $row){
    $output .= '
    <tr>
     <td>'.$row["name"].'</td>
     <td>'.$row["password"].'</td>
     <td>'.$row["companyId"].'</td>
     <td><button type="button" id="'.$row['id'].'"   class="btn btn-warning btn-xs update">Modify</button></td>
     <td><button type="button" id="'.$row['id'].'"    class="btn btn-danger btn-xs delete">Delete</button></td>
    </tr>
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
  $statement = $connPDO->prepare("INSERT INTO dispatcher(name,organization,companyId,title,background,password,taxi_comp) VALUES(:first_name,:org,:companyid,:title,:back,:password,:key)");
  $result = $statement->execute(
   array(
    ':first_name' => $_POST["firstName"],
    ':companyid' => $_SESSION["companyId"],
    ':password' => $_POST["password"],
    ':title'=> $_SESSION['name'],
    ':org'=> $_SESSION['name'],
    ':back'=> 'Dark',
    ':key' => $_SESSION['id']
   )
  );
  if(!empty($result))
  {
   echo 'Dispatcher Account Created';
  }
 }

 //This Code is for fetch single customer data for display on Modal
 if($_POST["action"] == "Select"){
     $idd=$_POST['id'];
     $api=$_SESSION['id'];
     
  $output = array();
  $statement = $connPDO->prepare(
   "SELECT * FROM  dispatcher WHERE taxi_comp='$api_key' AND id = '$idd'");
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $output["first_name"] = $row["name"];
   $output["password"] = $row["password"];
   $output["companyid"] = $row["companyId"];
   
  }
  echo json_encode($output);
 }

 //if (isset($_POST['update'])){
 if($_POST["action"] =="Update"){
  $statement = $connPDO->prepare(
   "UPDATE dispatcher 
   SET name = :first_name ,password = :password
   WHERE id = :id AND taxi_comp =:key
   "
  );
  $result = $statement->execute(
   array(
    ':first_name' => $_POST["firstName"],
    ':password' => $_POST["password"],
    ':id'   => $_POST["id"],
    ':key' => $_SESSION['id']
   )
  );
  if(!empty($result))
  {
   echo 'Dispatcher Account Edited';
  }
 }

 if($_POST["action"] == "Delete"){
  $statement = $connPDO->prepare(
   "DELETE FROM dispatcher WHERE id = :id AND taxi_comp= :key"
  );
  $result = $statement->execute(
   array(
    ':id' => $_POST["id"],
    ':key' => $_SESSION['id']
   )
  );
  if(!empty($result))
  {
   echo 'Dispatcher Is Deleted';
  }
 }

}

?>