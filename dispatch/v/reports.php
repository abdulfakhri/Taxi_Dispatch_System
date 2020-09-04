<?php include('../c/api.php');?>
<?php include ('../c/c.php');?>
<?php include ($nav);?>
<?php 

/*
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 
include ($nav);
include ($cjob);
include ($mapt);
include ($scripts);
*/

?>



  
  <h3>Manage Drivers Reports</h3>
   
 
   
   <div id="result" class="table-responsive"></div>
  
 
  
<script>
// Get the modal
var modal = document.getElementById("driverModal");


// Get the button that opens the modal
var btn = document.getElementById("modal_button");

// Get the <span> element that closes the modal
//var closebtn = document.getElementsByClassName("close")[0];
var closebtn = document.getElementById("close");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}



// When the user clicks on <span> (x), close the modal
closebtn.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>

<script>
$(document).ready(function(){
 fetchUser(); //This function will load all data on web page when page load
 function fetchUser(){ // This function will fetch data from table and display under <div id="result">
  var action = "Load";
  $.ajax({
      
   url : "/dispatch/m/reportsAPI/driversListReport.php", //Request send to "action.php page"
   method:"POST", //Using of Post method for send data
   data:{action:action}, //action variable data has been send to server
   success:function(data){
    $('#result').html(data); //It will display data under div tag with id result
   }
  });
 }
  
  
 //This JQuery code will Reset value of Modal item when modal will load for create new records
$('#modal_button').click(function(){
  $('#driverModal').modal('show'); //It will load modal on web page
  $('#driver_name').val(''); //This will clear Modal first name textbox
  $('#driver_email').val(''); //This will clear Modal last name textbox
  $('#home_address').val(''); //This will clear Modal first name textbox
  $('#driver_phone').val(''); //This will clear Modal last name textbox
  $('#driver_level').val(''); //This will clear Modal last name textbox
  $('#driving_license').val(''); //This will clear Modal last name textbox
  $('#operator_license').val(''); //This will clear Modal last name textbox
  $('#call_sign').val(''); //This will clear Modal first name textbox
  $('#wheelchair').val(''); //This will clear Modal last name textbox
  $('#bags').val(''); //This will clear Modal last name textbox
  $('#type').val(''); //This will clear Modal first name textbox
  $('#passenger').val(''); //This will clear Modal last name textbox
  $('#color').val(''); //This will clear Modal last name textbox    
  $('#license_plate').val(''); //This will clear Modal last name textbox
  $('#image').val(''); //This will clear Modal last name textbox
  $('.modal-title').text("Create New Records"); //It will change Modal title to Create new Records
  $('#action').val('Create'); //This will reset Button value ot Create
 });
 //This JQuery code is for Click on Modal action button for Create new records or Update existing records. This code will use for both Create and Update of data through modal
 $('#action').click(function(){
var driver_name=$('#driver_name').val();  
var driver_email=$('#driver_email').val();  
var home_address=$('#home_address').val();  
var driver_phone=$('#driver_phone').val();  
var driving_license=$('#driving_license').val();  
var driver_level=$('#driver_level').val();  
var operator_license=$('#operator_license').val();  
var driver_license=$('#driver_license').val(); 
var call_sign=$('#call_sign').val(); 
var passenger=$('#passenger').val(); 
var wheelchair=$('#wheelchair').val(); 
var bags=$('#bags').val(); 
var type=$('#type').val(); 
var image=$('#image').val(); 
var color=$('#color').val(); 
var license_plate=$('#license_plate').val(); 
var driver_id = $('#cid').val(); 
var driverId = $('#driverId').val();
//Get the value of hidden field customer id
var action = $('#action').val();  //Get the value of Modal Action button and stored into action variable
if(driver_name!=''&& driver_phone!='') //This condition will check both variable has some value
{
$.ajax({
url : "/dispatch/m/driverAPI/driver_api.php",    //Request send to "action.php page"
method:"POST",     //Using of Post method for send data
data:{
driver_name:driver_name,  
driver_email:driver_email,
home_address:home_address,
driver_phone:driver_phone,
driving_license:driving_license,
driver_level:driver_level,
operator_license:operator_license,
driver_license:driver_license,
call_sign:call_sign,
passenger:passenger,
wheelchair:wheelchair,
bags:bags,
type:type,
image:image,
driver_id:driver_id,
color:color,
license_plate:license_plate,
action:action
    }, //Send data to server
    success:function(data){
     alert(data);    //It will pop up which data it was received from server side
     $('#driverModal').modal('hide'); //It will hide Customer Modal from webpage.
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
   url:"/dispatch/m/driverAPI/driver_api.php",   //Request send to "action.php page"
   method:"POST",    //Using of Post method for send data
   data:{id:id, action:action},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(data){
    $('#customerModal').modal();   //It will display modal on webpage
    $('.modal-title').text("Update Records"); //This code will change this class text to Update records
    $('#action').val("Update");     //This code will change Button value to Update
    $('#cid').val(driver_id);     //It will define value of id variable to this customer id hidden field
    
    $('#driver_name').val(data.driver_name);  //It will assign value to modal first name texbox
    $('#driver_phone').val(data.driver_phone);  //It will assign value of modal last name textbox
    $('#driver_license').val(data.driver_license);
   }
  });
 });

 //This JQuery code is for Delete customer data. If we have click on any customer row delete button then this code will execute
 $(document).on('click', '.delete', function(){
  var driverId = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  if(confirm("Are you sure you want to remove this Driver?")) //Confim Box if OK then
  {
   var action = "Delete"; //Define action variable value Delete
   $.ajax({
    url:"/dispatch/m/driverAPI/driver_api.php",    //Request send to "action.php page"
    method:"POST",     //Using of Post method for send data
    data:{driverId:driverId, action:action}, //Data send to server from ajax method
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
<?php include ($ft);?>