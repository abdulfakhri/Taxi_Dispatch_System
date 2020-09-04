<?php
session_start();
include ('../c/c.php');
include_once($dbc);	
		
if(isset($_POST['save'])) {
$to=$_POST['taxi_comp'];

$apiKey=$_SESSION['id'];
$from=	$_SESSION['user_id'];
$fromName= 	$_SESSION['name'];
$tname=$_SESSION['to_chatName'];
$tm=$_POST['message'];
$token=$to+$from;
$sql="INSERT INTO chat_message(token,to_user_id,sender_name,destination_name,from_user_id,chat_message,taxi_comp) VALUES('$token','$to','$fromName','$tname','$from','$tm','$apiKey')";
$result=mysqli_query($conn,$sql);

if($result){
		//echo "Upload";
		header('Location: /dispatch/chat/newchat.php?t='.$token.'&'.'uid='.$to.'&n='.$tname);
}else{
	echo "Not Upload";
}
mysqli_close($conn);
	
}

?>