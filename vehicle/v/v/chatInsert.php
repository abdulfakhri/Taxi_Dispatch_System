<?php
session_start();
include ('../c/c.php');
$databaseHost = 'localhost';
$databaseName = 'jorrog3_dispatch';
$databaseUsername = 'jorrog3_dispatch';
$databasePassword = '!@#123qweasdzxc';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	    
//$to=$_GET['uid'];

//$apiKey=$_GET['di'];

//$_SESSION['id']=$_GET['di'];

//$_SESSION['to']=$_GET['uid'];

//$from= $key;

//$tm=$_POST['message'];
/*	
$to=$_POST['to'];

$key=$_POST['key'];

$tm=$_POST['message'];

$time=date("h:i");

$token=$_POST['token'];



//$sql="INSERT INTO chat_message(token,reciever,sender,chat_message,time,taxi_comp) VALUES('$token','$to','$from','$tm','$time','$key')";
$sql="INSERT INTO chat_message(chat_message) VALUES('$tm')";
$result=mysqli_query($conn,$sql);

if($result!=null){
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  echo "Inserted";
}else{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  echo "Not Inserted";
}
mysqli_close($conn);
	
}
*/
?>

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
	
		$name = $_POST['name'];
		$msg = $_POST['enter_message'];
		$key='46';
		
	

		$query = "INSERT INTO chat_message(sender,chat_message,taxi_comp) VALUES('$name','$msg','$key')";
		if ($con->query($query) === TRUE) {
                echo "data inserted";
                }
                else 
                   {
                 echo "failed";
                }
?>