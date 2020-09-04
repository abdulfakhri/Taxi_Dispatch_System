<?php 
include ('../c/api.php');
include ('../c/c.php');

//including the database connection file
include($dbc);
//getting id of the data from url
$id = $_GET['job_id'];
$api=$_SESSION['id'];
//deleting the row from table
$result=mysqli_query($conn,"DELETE FROM jobs WHERE job_id=$id AND disp_id='$api'");
if($result){
  header("Location:/w/v/home.php");  
}else{
    echo "Failed To Delete This Job, Try Again!!";
}
?>



