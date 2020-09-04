<?php
$databaseHost = 'localhost';
$databaseName = 'jorrog3_dispatch';
$databaseUsername = 'jorrog3_dispatch';
$databasePassword = '!@#123qweasdzxc';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
		
/////////////////////////////////////////////////////////////////////    
$to=$_POST['to'];

$apiKey=$_POST['key'];

$from= $_POST['key'];

$tm=$_POST['message'];

$token=$_POST['token'];


///////////////////////////////////////////////////////////////
$sql="INSERT INTO chat_message(token,reciever,sender,chat_message,taxi_comp) VALUES('$token','$to','$from','$tm','$apiKey')";

$result=mysqli_query($conn,$sql);

if($result!=null){
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  echo "Inserted";
}else{
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	echo "Not Upload";
}
mysqli_close($conn);
	

?>