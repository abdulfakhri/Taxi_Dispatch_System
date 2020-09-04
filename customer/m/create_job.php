<?php 
include ($dbc);
if(isset($_POST['createjob'])) {

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
   
    
    $V27=$_SESSION['id'];
 
    
         /*  
          echo  $V1;
          echo "<br>";
          echo  $V2;
          echo "<br>";
         echo  $V3;
          echo "<br>";
         echo  $V4;
          echo "<br>";
        echo  $V5;
         echo "<br>";
         echo  $V6;
          echo "<br>";
          echo  $V7;
           echo "<br>";
           echo  $V8;
            echo "<br>";
            echo  $V9;
             echo "<br>";
             echo  $V10;
              echo "<br>";
              echo  $V11;
               echo "<br>";
               echo  $V12;
                echo "<br>";
                echo  $V13;
                 echo "<br>";
                 echo  $V14;
                  echo "<br>";
                  echo  $V15;
                   echo "<br>";
                   echo  $V16;
                    echo "<br>";
                    echo  $V17;
                     echo "<br>";
                     echo  $V18;
                      echo "<br>";
                      echo  $V19;
                       echo "<br>";
                      echo  $V20;
                       echo "<br>";
                      echo  $V21;
                       echo "<br>";
                      echo  $V22;
                       echo "<br>";
                      echo  $V23;
                       echo "<br>";
                      echo  $V24;
                       echo "<br>";
                      echo  $V25;
                       echo "<br>";
                      echo  $V26;
                       echo "<br>";
                      echo  $V27;
                       echo "<br>";
                      echo  $V28;
                       echo "<br>";
                      echo  $V29;
                       echo "<br>";
                        */
                      // echo  $V30;
                     
  
    
$sql="INSERT INTO    
jobs(
src_addr,
dest_addr,
route,
timing,
time_assigned,
customer_name,
customer_phone,
customer_id,
customer_email,
payment_amount,
payment_method,
passenger_no,
bags_no,
wheelchair_no,
car_no,
vehicle_type,
info_all,
info_driver,
assign_car,
assign_car_company,
tariff,
duration,
priority,
flight_no,
room_no,
disp_id)
VALUES(
    '$V1',
    '$V2',
    '$V3',
    '$V4',
    '$V5', 
    '$V6',
    '$V7',
    '$V8',
    '$V9',
    '$V10',
    '$V11',
    '$V12',
    '$V13',
    '$V14',
    '$V15',
    '$V16',
    '$V17',
    '$V18',
    '$V19',
    '$V20',
    '$V21',
    '$V22',
    '$V23',
    '$V24',
    '$V25',
    '$V27'
    );";
    
    $sql .="INSERT INTO customers(name,phone,email,location,disp_id) 
    VALUES('$V6','$V7','$V9','$V1','$V27')
    ";
    
     $result=mysqli_multi_query($conn, $sql);
    if ($result != null) {
	 header("refresh: 4; /w/v/home.php");
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("location: /w/v/createjob.php"); 
    }
    mysqli_close($conn);
    
    
}
?>
