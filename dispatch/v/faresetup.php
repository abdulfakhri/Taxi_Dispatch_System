<?php 
include('../c/api.php');
include('../c/c.php');
include($nav);
?>


 	
<?php
include($dbc);
if(isset($_POST['fsave'])) {

    $increment = $_POST['increment'];
    $first_mile = $_POST['first_mile'];
    $distance_charg = $_POST['distance_charg'];
	$stop_flag_charg = $_POST['stop_flag_charg'];
	$rounding_method = $_POST['rounding_method'];
	$car_class = $_POST['car_class'];
	$pickup = $_POST['pick_up'];
	$drop_off = $_POST['drop_off'];
	$tc= $_SESSION['id'];

	
	 
$sql="INSERT INTO fares(car_class,pick_up,drop_off,increment,distance_charg,stop_flag_charg,rounding_method,first_mile,taxi_comp)
VALUES('$car_class','$pickup','$drop_off','$increment','$distance_charg','$stop_flag_charg','$rounding_method','$first_mile','$tc')"; 
   $result=mysqli_query($conn, $sql);
	if ($result != null) {
?>
	     <script>
	          window.location.href = "/dispatch/v/fare.php";
	     </script>
	      
<?php   

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
?>
    
   <script>
	          window.location.href = "/dispatch/v/faresetup.php";
	</script>
    
<?php
}
mysqli_close($conn);
}
?>

 <div class="row">
  <form action="" method="POST">
     
         <div class="col-lg-6">
           <label>Car Class</label><br>
         <input class=""  type="text-half" placeholder="Car Class"  id="car_class" name="car_class" required ><br>
       
         <label>Pickup</label><br>
        <input class="" type="text-fs" placeholder="Pickup" id="pick_up"  name="pick_up" required><br>
     
         <label>Drop Off</label><br>
         <input class=""  type="text-fs" placeholder="Drop Off" id="drop_off"  name="drop_off" required><br>
          <label>First mile</label><br>
         <input class=""  type="text-fs" placeholder="First Mile"  id="first_mile" name="first_mile" required><br>
        </div>
         
         <div class="col-lg-6">
         <label>Increment</label><br>
         <input class=""  type="text-fs" placeholder="Increment"  id="increment" name="increment" required><br>
         
        
    
         <label>Distance Charg</label><br>
        <input class="" type="text-fs" placeholder="Distance Charg" id="distance_charg"  name="distance_charg" required><br>
    
         <label>Stop Flag Charg</label><br>
         <input class=""  type="text-fs" placeholder="Stop Flag Charg" id="stop_flag_charg"  name="stop_flag_charg" required><br>
     
        <label>Rounding Method</label><br>
        <input class=""  type="text-fs" placeholder="Rounding Method" id="rounding_method"   name="rounding_method" required ><br>
      
       
      </div>
      
        <div class="col-lg-12">
            
            <input type="submit" class="btn-small" name="fsave" value="Create">
           <input type="reset" class="btn-small" name="" value="Clear">
           
       </div>
    </form>
  </div>
  
   <button class="btn-small" style="float:right"><a href="/dispatch/v/fare.php">Back</a></button><br></br>
    <hr> 
   <p align="right" style="font-size:20px">Distance</p>
   <hr>
   
   <div id="result" class=""></div>
 
  
 

<script>
$(document).ready(function(){
 fetchUser(); //This function will load all data on web page when page load
 function fetchUser(){ // This function will fetch data from table and display under <div id="result">
  var action = "Load";
  $.ajax({
   url : "/dispatch/m/fareSetupAPI/actionFare.php", //Request send to "action.php page"
   method:"POST", //Using of Post method for send data
   data:{action:action}, //action variable data has been send to server
   success:function(data){
    $('#result').html(data); //It will display data under div tag with id result
   }
  });
 }
  //var companyid='<?php //echo $_SESSION['companyId'];?>';
 //This JQuery code will Reset value of Modal item when modal will load for create new records
 $('#modal_button').click(function(){
    
  $('#customerModal').modal('show'); //It will load modal on web page
  $('#car_class').val(''); //This will clear Modal first name textbox
  $('#pick_up').val(''); //This will clear Modal last name textbox
  $('#drop_off').val(''); //This will clear Modal last name textbox
  $('#increment').val(''); //This will clear Modal first name textbox
  $('#distance_charg').val(''); //This will clear Modal last name textbox
  $('#stop_flag_charg').val(''); //This will clear Modal last name textbox
  $('#rounding_method').val(''); //This will clear Modal last name textbox
  $('.modal-title').text("Create New Records"); //It will change Modal title to Create new Records
  $('#action').val('Create'); //This will reset Button value ot Create
 });

 //This JQuery code is for Click on Modal action button for Create new records or Update existing records. This code will use for both Create and Update of data through modal
 $('#action').click(function(){
  var car_class = $('#car_class').val(); //Get the value of first name textbox.
  var pick_up = $('#pick_up').val(); //Get the value of first name textbox.
  var drop_off = $('#drop_off').val(); //Get the value of last name textbox
  var increment = $('#increment').val(); //Get the value of first name textbox.
  var distance_charg = $('#distance_charg').val(); //Get the value of first name textbox.
  var stop_flag_charg= $('#stop_flag_charg').val(); //Get the value of last name textbox
  var id = $('#cid').val();  //Get the value of hidden field customer id
  var action = $('#action').val();  //Get the value of Modal Action button and stored into action variable
  if(car_class !='' && drop_off!='') //This condition will check both variable has some value
  {
   $.ajax({
    url : "/dispatch/m/fareSetupAPI/actionFare.php",    //Request send to "action.php page"
    method:"POST",     //Using of Post method for send data
    data:{ 
car_class:car_class,
pick_up:pick_up,
drop_off:drop_off,
increment:increment,
distance_charg:distance_charg,
stop_flag_charg:stop_flag_charg,
id:id,action:action}, //Send data to server
    success:function(data){
     alert(data);    //It will pop up which data it was received from server side
     $('#customerModal').modal('hide'); //It will hide Customer Modal from webpage.
     fetchUser();    // Fetch User function has been called and it will load data under divison tag with id result
    }
   });
  }
  else
  {
   alert("Both Fields are Required"); //If both or any one of the variable has no value them it will display this message
  }
 });

 //This JQuery code is for Update customer data. If we have click on any customer row update button then this code will execute
 $(document).on('click', '.update', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  var action = "Select";   //We have define action variable value is equal to select
  $.ajax({
   url:"/dispatch/m/fareSetupAPI/actionDispatch.php",   //Request send to "action.php page"
   method:"POST",    //Using of Post method for send data
   data:{id:id, action:action},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(data){
    $('#customerModal').modal();   //It will display modal on webpage
    $('.modal-title').text("Update Records"); //This code will change this class text to Update records
    $('#action').val("Update");     //This code will change Button value to Update
    $('#cid').val(id);     //It will define value of id variable to this customer id hidden field
    $('#first_name').val(data.first_name);  //It will assign value to modal first name texbox
    $('#companyid').val(data.companyid);  //It will assign value of modal last name textbox
    $('#password').val(data.password);
   }
  });
 });
  
 //This JQuery code is for Delete customer data. If we have click on any customer row delete button then this code will execute
 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  if(confirm("Are you sure you want to remove this data?")) //Confim Box if OK then
  {
   var action = "Delete"; //Define action variable value Delete
   $.ajax({
    url:"/dispatch/m/fareSetupAPI/actionDispatch.php",    //Request send to "action.php page"
    method:"POST",     //Using of Post method for send data
    data:{id:id, action:action}, //Data send to server from ajax method
    success:function(data){
     fetchUser();    // fetchUser() function has been called and it will load data under divison tag with id result
     alert(data);    //It will pop up which data it was received from server side
    }
   })
  }else{  //Confim Box if cancel then 
   return false; //No action will perform
  }
 });

});
</script>
<?php include($ft);?>