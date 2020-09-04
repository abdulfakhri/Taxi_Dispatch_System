<?php 
include('../c/api.php');
include('../c/c.php');
include($nav);
?>

<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  padding-top: 100px; /* Location of the box */
  left: 10%;
  top: 20%;
  right:10%;
  width: 50%; /* Full width */
  height: 70%; /* Full height */
  background-color: #000; /* Fallback color */
 
}

/* Modal Content */
.modal-content {
  background-color: ;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: ;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: ;
  text-decoration: none;
  cursor: pointer;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
 	
<?php
include($dbc);
if(isset($_POST['fsave'])) {

    $increment = $_POST['increment'];
    $distance_charg = $_POST['distance_charg'];
	$stop_flag_charg = $_POST['stop_flag_charg'];
	$rounding_method = $_POST['rounding_method'];
	$car_class = $_POST['car_class'];
	$pickup = $_POST['pickup'];
	$drop_off = $_POST['drop_off'];
	$tc= $_SESSION['id'];

	 //$sql="UPDATE taxi_company SET name='$title', background='$back',map_type='$map', meteric='$meteric' WHERE id='$tc'";
	 
$sql="INSERT INTO fares(car_class,pickup,drop_off,increment,distance_charg,stop_flag_charg,rounding_method,taxi_comp)
VALUES('$car_class','$pickup','$drop_off','$increment','$distance_charg','$stop_flag_charg','$rounding_method','$tc')"; 
   $result=mysqli_query($conn, $sql);
	if ($result != null) {
	     ?>
	     <script>
	          window.location.href = "/dispatch/v/fsetup.php";
	     </script>
	      
	 <?php   

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    ?>
    
   <script>
	          window.location.href = "/dispatch/v/createFareSetup.php";
	</script>
    
   <?php
}
mysqli_close($conn);

}

?>

 <body>
  
  <div class="container-dashboard">
  
  <form action="" method="POST">
      
      <div class="col-lg-6">
          
         <label>Increment</label>
         <input class=""  type="text-fs" placeholder="Increment"  id="increment" name="increment" >
    
         <label>Distance Charg</label>
        <input class="" type="text-fs" placeholder="Distance Charg" id="distance_charg"  name="distance_charg">
    
         <label>Stop Flag Charg</label>
         <input class=""  type="text-fs" placeholder="Stop Flag Charg" id="stop_flag_charg"  name="stop_flag_charg">
     
        <label>Rounding Method</label>
        <input class=""  type="text-fs" placeholder="Rounding Method" id="rounding_method"   name="rounding_method" >
     </div>
      
      <div class="col-lg-6">
         
         <label>Car Class</label>
         <input class=""  type="text-fs" placeholder="Car Class"  id="car_class" name="car_class" >
     
         <label>Pickup</label>
        <input class="" type="text-fs" placeholder="Pickup" id="pickup"  name="pickup">
     
         <label>Drop Off</label>
         <input class=""  type="text-fs" placeholder="Drop Off" id="drop_off"  name="drop_off">
     </div>  
     
    <input type="submit" class="btn-faresetup " name="fsave" value="Create">
    <button  class="btn-faresetup" ><a href="/dispatch/v/fsetup.php">Clear</a></button>
   
  </form>
  
  
   </div>
 </body>
</html>



