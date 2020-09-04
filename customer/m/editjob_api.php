

<?php
//including the database connection file
include_once($dbc);

if(isset($_POST['updatejob'])){
    $id=$_POST['job_id'];
    
    $V1=$_POST['job1'];
    $V2=$_POST['job2'];
    $V3=$_POST['job3'];
    $V4=$_POST['job4'];
    $V5=$_POST['job5'];
    $V6=$_POST['job6'];
    $V7=$_POST['job7'];
    $V8=$_POST['job8'];
    $V9=$_POST['job9'];
    $V10=$_POST['job10'];
    $V11=$_POST['job11'];
    $V12=$_POST['job12'];
    $V13=$_POST['job13'];
    $V14=$_POST['job14'];
    $V15=$_POST['job15'];
    $V16=$_POST['job16'];
    $V17=$_POST['job17'];
    $V18=$_POST['job18'];
    $V19=$_POST['job19'];
    $V20=$_POST['job20'];
    $V21=$_POST['job21'];
    $V22=$_POST['job22'];
    $V23=$_POST['job23'];
    $V24=$_POST['job24'];
    $V25=$_POST['job25'];

    $api=$_SESSION['id'];
    
	// checking empty fields
	if(empty($V1)) {
		if(empty($V1)) {
			echo "<font color='red'>".$V1." field is empty.</font><br/>";
		}
} else {	
		//updating the table
		$result = mysqli_query($conn,"UPDATE jobs SET 
src_addr='$V1',
dest_addr='$V2',
route='$V3',
timing='$V4',
time_assigned='$V5',
customer_name='$V6',
customer_phone='$V7',
customer_id='$V8',
customer_email='$V9',
payment_amount='$V10',
payment_method='$V11',
passenger_no='$V12',
bags_no='$V13',
wheelchair_no='$V14',
car_no='$V15',
vehicle_type='$V16',
info_all='$V17',
info_driver='$V18',
assign_car='$V19',
assign_car_company='$V20',
tariff='$V21',
duration='$V22',
priority='$V23',
flight_no='$V24',
room_no='$V25'
WHERE job_id=$id  AND disp_id='$api'");
		
		//redirectig to the display page. In our case, it is view.php
		header('URL=/w/v/home.php'); 
	}
}

?>
<?php
//getting id from url
$id = $_GET['job_id'];
$api=$_SESSION['id'];

                            
                               //fetching data in descending order (lastest entry first)
                               $resul = mysqli_query($conn,"SELECT * FROM jobs WHERE disp_id='$api' AND job_id='$id'");
		                       while($res2 = mysqli_fetch_array($resul)) {
		                                 $vr1=$res2[1];
		                                 $vr2=$res2[2];
		                                 $vr3=$res2[3];
		                                 $vr4=$res2[4];
		                                 $vr5=$res2[5];
		                                 $vr6=$res2[6];
		                                 $vr7=$res2[7];
		                                 $vr8=$res2[8];
		                                 
		                                 $vr9=$res2[9];
		                                 $vr10=$res2[10];
		                                 $vr11=$res2[11];
		                                 $vr12=$res2[12];
		                                 $vr13=$res2[13];
		                                 $vr14=$res2[14];
		                                 $vr15=$res2[15];
		                                 $vr16=$res2[16];
		                                 
		                                 $vr17=$res2[17];
		                                 $vr18=$res2[18];
		                                 $vr19=$res2[19];
		                                 $vr20=$res2[20];
		                                 $vr21=$res2[21];
		                                 $vr22=$res2[22];
		                                 $vr23=$res2[23];
		                                 $vr24=$res2[24];
		                                 
		                                 $vr25=$res2[23];
		                                 $vr26=$res2[24];
		                                 
	}
?> 


     
