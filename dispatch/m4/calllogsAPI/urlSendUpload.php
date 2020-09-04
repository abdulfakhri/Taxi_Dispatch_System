<?php

 
include('/home/aidifxin/cloud/dispatch/c/connection.php');

    include('connection.php');
    /*
	// connects to the mysql server and then the database
    $connection=mysql_connect($host,$user,$password) or die ("Could not connect to server (conn)");
    $db = mysql_select_db($database,$connection) or die ("could not select database. (DB)");
	http://www.yourserver.com/urlSendUpload.php?name=%Name&phone=%Phone&
	https://cloud.aidispatchsys.com/dispatch/m/urlSendUpload.php?name=%Name&phone=%Phone&line=%Line&time=%Time&duration=%Duration&se=%SE&io=%IO&ringType=Ring%type&ringNumber=%Ring%Number&status=%Status&key=14
    http://cloud.aidispatchsys.com/dispatch/m/urlSendUpload.php?name=%Name&phone=%Phone&line=%Line&time=%Time&duration=%Duration&se=%SE&io=%IO&ringType=Ring%type&ringNumber=%Ring%Number&status=%Status&key=14
    http://.aidispatchsys.com/dispatch/m/urlSendUpload.php?name=%Name&phone=%Phone&line=%Line
    http://scloud.aidispatchsys.com/dispatch/m/urlSendUpload.php?name=%Name&phone=%Phone&line=%Line&time=%Time&duration=%Duration&se=%SE&io=%IO&ringType=Ring%type&ringNumber=%Ring%Number&status=%Status&key=14
    
    API=http://scloud.aidispatchsys.com/dispatch/m/urlSendUpload.php?name=%Name&phone=%Phone&line=%Line&time=%Time&duration=%Duration&se=%SE&io=%IO&ringtype=%RingType&ringnumber=%RingNumber&status=%Status&key=14
    
	// Get all values sent from URLSend
	*/
	$name = $_GET["name"];
	$phone = $_GET["phone"];
	$line = $_GET["line"];
	$time = $_GET["time"];
	$duration = $_GET["duration"];
	$se = $_GET["se"];
	$io = $_GET["io"];
	$ringType = $_GET["ringtype"];
	$ringNumber = $_GET["ringnumber"];
	$status = $_GET["status"];
	$tc=$_GET["key"];
	$date= date("Y-m-d");
	/*
	$name = "Alex";
	$phone = "123456789";
	$line = "123345";
	*/
	
	
	
	//$tc="14";


		// INSERT INTO database
		$sql = "INSERT INTO urlSend (Name,Phone,Line,Time,Duration,IO,SE,RingType,RingNumber,Status,kdate,taxi_comp) VALUES ('$name','$phone','$line','$time','$duration','$io','$se','$ringType','$ringNumber','$status','$date','$tc')";
		$r=mysqli_query($conn,$sql);
		if($r !=null){
		    echo "inserted";
		}else{
		    echo "Not Inserted";
		}



	// Check to see if record already in database
	// This is important in case multiple ELPopups are running URLSend at the same time. It will keep duplicate records from appearing.
	/*
	$result = mysql_query("SELECT COUNT(*) AS Count FROM urlSend WHERE Name='$name' AND Phone='$phone' AND Line='$line' AND Time='$time' AND Duration='$duration' AND IO='$io' AND SE='$se' AND RingType='$ringType' AND RingNumber='$ringNumber' AND Status='$status'");
	
		$result = mysql_query("SELECT COUNT(*) AS Count FROM urlSend WHERE Name='$name' AND Phone='$phone' AND Line='$line' AND Time='$time' AND Duration='$duration' AND IO='$io' AND SE='$se' AND RingType='$ringType' AND RingNumber='$ringNumber' AND Status='$status'");
		
    $row = mysql_fetch_assoc($result);
    $count = $row['Count'];

	// If record doesn't exist
	if ($count==0){

		// INSERT INTO database
		$insertQuery = "INSERT INTO urlSend (Name,Phone,Line,Time,Duration,IO,SE,RingType,RingNumber,Status,taxi_comp) VALUES ('$name','$phone','$line','$time','$duration','$io','$se','$ringType','$ringNumber','$status','$tc')";
		mysql_query($insertQuery);
		
		echo " $name : $phone --- added to database.<br/>";
		// --------------------------------
	}else{
		echo " Record already exist.<br/>";
	}
	*/
	
	mysql_close($conn);

?>