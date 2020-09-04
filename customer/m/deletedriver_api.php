<?php 
include ('../c/api.php');
include ('../c/c.php');

//including the database connection file
include($dbc);
//getting id of the data from url
$id = $_GET['driver_id'];
$api=$_SESSION['id'];
//deleting the row from table
$result=mysqli_query($conn,"DELETE FROM taxi_drivers WHERE driver_id='$id' AND disp_id='$api'");
if($result){
  header("Location:/w/v/users.php");  
}else{
    echo "Failed To Delete This Job, Try Again!!";
}
?>



