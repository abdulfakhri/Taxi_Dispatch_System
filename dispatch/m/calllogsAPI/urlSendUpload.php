<?php
$databaseHost = 'localhost';
$databaseName = 'jorrog3_dispatch';
$databaseUsername = 'jorrog3_dispatch';
$databasePassword = '!@#123qweasdzxc';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
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
        $name = "testvalue";
	$phone = "testvalue";
	$line = "testvalue";
	$time = "testvalue";
	$duration ="testvalue";
	$se = "testvalue";
	$io = "testvalue";
	$ringType ="testvalue";
	$ringNumber ="testvalue";
	$status = "testvalue";
	$tc="testvalue";
	$date= "testvalue";
	*/
    
		// INSERT INTO database
		$sql = "INSERT INTO urlSend(Name,Phone,Line,Time,Duration,IO,SE,RingType,RingNumber,Status,kdate,taxi_comp) VALUES 
		('$name','$phone','$line','$time','$duration','$io','$se','$ringType','$ringNumber','$status','$date','$tc')";
		$r=mysqli_query($conn,$sql);
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		if($r !=null){
		    echo "inserted";
		}else{
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		    echo "Not Inserted";
		}


	mysql_close($conn);

?>