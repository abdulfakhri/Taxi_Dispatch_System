<?php 
include('../c/api.php');
include('../c/c.php');
include($nav);
?>


 	
<?php
include($dbc);
if(isset($_POST['fsave'])) {

    $increment = $_POST['increment'];
    $distance_charg = $_POST['distance_charg'];
	$stop_flag_charg = $_POST['stop_flag_charg'];
	$rounding_method = $_POST['rounding_method'];
	$tc= $_SESSION['id'];

	 //$sql="UPDATE taxi_company SET name='$title', background='$back',map_type='$map', meteric='$meteric' WHERE id='$tc'";
	 
$sql="INSERT INTO fares(increment,distance_charg,stop_flag_charg,rounding_method,taxi_comp)
VALUES('$increment','$distance_charg','$stop_flag_charg','$rounding_method','$tc')"; 
   $result=mysqli_query($conn, $sql);
	if ($result != null) {
	     $reg="Not Profile, Try Again Now";
	      // header('Location: /dispatch/v/settings.php');
	      //header('Location: /dispatch/v/fsetup.php'); 
	    

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    $reg="Not Profile, Try Again Now";
    header('Location: /dispatch/v/fsetup.php'); 
}
mysqli_close($conn);

}

?>
<?php
include($dbc);
if(isset($_POST['clear'])) {

}
?>
<?php
include($dbc);
if(isset($_POST['fupdate'])) {

    $increment = $_POST['increment'];
    $distance_charg = $_POST['distance_charg'];
	$stop_flag_charg = $_POST['stop_flag_charg'];
	$rounding_method = $_POST['rounding_method'];
	$pickup= $_POST['pick_up'];
	$drop_off=  $_POST['drop_off'];
	$car_class=  $_POST['car_class'];
    $stop_flag= $_POST['stop_flag_charg'];
	$tc= $_SESSION['id'];
	$id= $_POST['fid'];

	 //$sql="UPDATE taxi_company SET name='$title', background='$back',map_type='$map', meteric='$meteric' WHERE id='$tc'";
	 $sql="UPDATE fares SET 
	 increment='$increment', 
	 distance_charg='$distance_charg',
	 stop_flag_charg='$stop_flag_charg',
	 car_class='$car_class',
	 pick_up='$pickup',
     drop_off='$drop_off',
     stop_flag_charg='$stop_flag',
	 rounding_method='$rounding_method' 
	 WHERE id='$id' AND taxi_comp='$tc'";

   $result=mysqli_query($conn, $sql);
	if ($result != null) {
	     $reg="Not Profile, Try Again Now";
	      // header('Location: /dispatch/v/settings.php');
	      //header('Location: /dispatch/v/fsetup.php'); 
	    

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    $reg="Not Profile, Try Again Now";
    header('Location: /dispatch/v/fsetup.php'); 
}
mysqli_close($conn);

}

?>
<?php
$id = $_GET['fid'];
$api=$_SESSION['id'];
//fetching data in descending order (lastest entry first)
$resul=mysqli_query($conn,"SELECT * FROM fares WHERE taxi_comp='$api' AND id='$id'");
while($res2 = mysqli_fetch_array($resul)) {
     
		                              $increment=$res2['increment'];
		                               $distance_charg=$res2['distance_charg'];
		                               $rounding_method=$res2['rounding_method'];
		                               $car_class=$res2['car_class'];
		                               $pickup=$res2['pick_up'];
		                               $drop_off= $res2['drop_off'];
		                               $stop_flag=$res2['stop_flag_charg'];
		                                            
}                                
?>
 
  
  
 <div class="row">
  <form action="" method="POST">
      <div class="col-lg-6">
      <input type="hidden" name="fid" value="<?php echo $_GET['fid'];?>">   
      
          
             <label>Increment</label><br>
         <input class=""  type="text-fs" placeholder="Increment" value="<?php echo $increment;?>" id="increment" name="increment" ><br>
     
         <label>Distance Charg</label><br>
        <input class="" type="text-fs" placeholder="Distance Charg" id="distance_charg" value="<?php echo $distance_charg;?>" name="distance_charg"><br>
    
         <label>Stop Flag Charg</label><br>
         <input class=""  type="text-fs" placeholder="Stop Flag Charg" id="stop_flag_charg" value="<?php echo $stop_flag;?>" name="stop_flag_charg"><br>
    
        <label>Rounding Method</label><br>
        <input class=""  type="text-fs" placeholder="Rounding Method" id="rounding_method"  value="<?php echo $rounding_method;?>" name="rounding_method" ><br>
       
              
          </div> 
          <div class="col-lg-6">
              <label>Car Class</label><br>
         <input class=""  type="text-fs" placeholder="Car Class" value="<?php echo $car_class;?>" id="car_class" name="car_class" ><br>
     
         <label>Pickup</label><br>
        <input class="" type="text-fs" placeholder="Pickup" id="pick_up" value="<?php echo $pickup;?>" name="pick_up"><br>
   
         <label>Drop Off</label><br>
         <input class=""  type="text-fs" placeholder="Drop Off" id="drop_off" value="<?php echo $drop_off;?>" name="drop_off"><br> 
              
          </div>
      
      
         <div class="col-lg-12">
          <input type="submit" class="btn-faresetup " name="fupdate" value="Modify Fare">
    
          <button  class="btn-faresetup" ><a href="/dispatch/v/fare.php">Close</a></button>
         </div>
    </form>
    
     </div>  
   <p align="right" style="font-size:20px">Distance</p>
   <hr>
    <button align="right"  class="btn-faresetup" style="background-color:green" onclick="createFare()">Create Fare</button>
    <br></br>
   <div id="result" class="table-responsive"></div>
 
  



<script>
$(document).ready(function(){
 fetchUser(); //This function will load all data on web page when page load
 function fetchUser(){ // This function will fetch data from table and display under <div id="result">
  var action = "Load";
  $.ajax({
   url : "/dispatch/m/fareSetupAPI/actionFareD.php", //Request send to "action.php page"
   method:"POST", //Using of Post method for send data
   data:{action:action}, //action variable data has been send to server
   success:function(data){
    $('#result').html(data); //It will display data under div tag with id result
   }
  });
 }
 
});
</script>
<?php include($ft);?>