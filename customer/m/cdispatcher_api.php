<?php
if(isset($_POST['addpro'])) {
    
    $name = $_POST['name'];
    $com = $_POST['company'];
	$phone = $_POST['phone'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$compId = $_POST['companyId'];
	$location= $_POST['location'];
	$ip= $_SERVER['REMOTE_ADDR'];
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $page = "http://".$_SERVER['HTTP_HOST']."".$_SERVER['PHP_SELF'];
    $referrer = $_SERVER['HTTP_REFERER'];
    $datetime = date("F j, Y, g:i a");
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $api_key;
    
	 $sql="INSERT INTO dispatcher(name,username,companyId,phone,email,password,location,ip,referer,organization,taxi_comp) 
	 VALUES('$name','$username','$compId','$phone','$email','$pass','$location','$ip','$referrer','$com','$api_key')";
   
   $result=mysqli_query($conn, $sql);
	if ($result != null) {
      $reg="You Have Successfully Registered Dispatcher.";    
	  header("refresh: 4; /w/v/home.php"); 
	 
	 

  
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    $reg="Not Registered, Try Again Now";
    header("refresh: 3; url = https://app.masterydispatch.com/w/u/signup.php");
}

mysqli_close($conn);
	
}
       
?>