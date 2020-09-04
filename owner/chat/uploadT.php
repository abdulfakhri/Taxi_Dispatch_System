<?php
session_start();
include ('../c/c.php');
include_once($dbc);	
		
if(isset($_POST['save'])) {
$to=$_POST['taxi_comp'];

$apiKey=$_SESSION['taxi_comp'];
$from=	$_SESSION['user_id'];
$fromName= 	$_SESSION['name'];
$tname=$_SESSION['to_chatName'];
$tm=$_POST['message'];
$token=$to+$from;
$_SESSION['chatToken']=$token;
$sql="INSERT INTO chat_message(token,to_user_id,from_user_id,chat_message,taxi_comp) VALUES('$token','$to','$from','$tm','$apiKey')";
$result=mysqli_query($conn,$sql);

if($result){
		//echo "Upload";
		header('Location: /dispatch/chat/chatone.php?t='.$token.'&'.'uid='.$to.'&n='.$tname);
}else{
	echo "Not Upload";
}
mysqli_close($conn);
	
}

?>