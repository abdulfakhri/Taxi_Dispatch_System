<!DOCTYPE html>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9Pyf9DzK853LRdgobgwCdMDbi5B-QUMY&libraries=places"></script>
<script>

            var autocomplete;
            var autocomplete1;
          
            
            function initialize() {
                
              autocomplete = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
                  { types: ['geocode'] });
                  
              google.maps.event.addListener(autocomplete, 'place_changed', function() {
              });
              
              autocomplete = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete1')),
                  { types: ['geocode'] });
                  
              google.maps.event.addListener(autocomplete1, 'place_changed', function() {
              });
              
            }

</script>
<?php include('/dispatch/m/jobsAPI/cjob_api.php');?>
<?php include ('../c/nav/createjob-style.php');?>

<!-----------------------------Fetch Lines--------------------------------------------------------------------->  
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","/dispatch2/m/jobsAPI/loadlinesdata.php?q="+str,true);
  xmlhttp.send();
}
</script>
<style>


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  padding-top: 10px; /* Location of the box */
  padding-left: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  left: 20%;
  top: 20%;
  right:20%;
  bottom:20%;
  width: 50%; /* Full width */
  height: 50%; /* Full height */
  background-color: #001; /* Fallback color */
  border:1px solid #fff;
  border-radius: 5px;
 
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
 <div id="customerModal" class="modal">
  <button id="close">x</button>
  
  <?php echo $_GET['k'];?>
    
</div>

<body>
    
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <div class="overlay-content">
    
    
      <div class="container-createjob">
          
     
      <div class="col-lg-4" style="background-color:;  border-radius:5px;width:30%;height:80%; border:1px solid #ccc">

         <form action="cdjobs.php" method="POST" style="border:px solid #ccc"> 
        <br></br>
        <label class="">Select Line#:</label><br>
         <select class="selectT-Mini" name="phonelines" onchange="showUser(this.value)">
        <option value=""><?php echo $phonelines;?></option>
        
        <option value="1">L1</option>
        <option value="2">L2</option>
        <option value="3">L3</option>
        <option value="4">L4</option>
        <option value="01">No Line</option>
        <option value="0">L0</option>
       </select>
        
        <div id="txtHint"></div> 
        
       <br>
       <p align="right" id="modal_button">History</p>
    
        <label class="">PickUp:</label>  
       <input id="autocomplete3" name="src_addr" type="text" class="" oninput="initialize()" value="<?php echo $addressFrom;?>" placeholder="Enter Pickup Address" required>
       
         <table>
              <tr>
              <td width="200">
              <label for="zip">Cross Street:</label>
              </td>
              <td>
              <label for="state">At:</label>
               
              </td>
              </tr>
              <br>
             
             <tr>   
             
               <td width="200"> 
               <input class="input-half" type="text-half-th" placeholder="Cross Street:" value="<?php echo $cross_street;?>" name="cross_street">
                </td>
                <td>
                <input class="input-half" type="text-half-th" placeholder="At:" value="<?php echo $at;?>"  name="at">
                </td>
             </tr>
             </table>
          
       <br>
         <label>DropOff :</label>
        <input  id="autocomplete4"  name="dest_addr" type="text"  class="" oninput="initialize()" value="<?php echo $addressTo;?>"  placeholder="Enter Drop Address" required><br>
       
       
        
       </div>
       <div class="col-lg-4" style="background-color:;  border-radius:5px;width:43%;height:80%; border:1px solid #ccc">
       <br></br>
              <table>
              <tr>
              <td width="35%">
              <label>Time:</label> 
              </td>
              <td width="18%">
              <label for="">Lead</label>
               
              </td>
              <td width="150">
              <label for="">Service</label>
               
              </td>
              <td width="100">
              <label for="">Vehicle Type</label>
               
              </td>
              </tr>
              
             </table>
       
         
        
        <?PHP $now=date("H:i:s  m/d/y");?> 
        
        <input class="" type="text-half" placeholder="" name="timing" value="<?PHP echo $timing;?>" required>
        
        <select class="selectT-Mini" name="time_assigned" required>
        <option value=""><?PHP echo $time_assigned;?></option>
        <option>ASAP</option>
        <option>Later</option>
         <option>Price Check</option>
        <option>5min</option>
        <option>10min</option>
        <option>15min</option>
        <option>20min</option>
        <option>30min</option>
        <option>45min</option>
        <option>1hr0min</option>
        <option>1hr30min</option>
        <option>2hr0min</option>
        </select>
        
       <select class="selectT-Mini2" name="service">
        <option value=""><?PHP echo $service;?></option>
        <option>Quick Ride</option>
         <option>Reservation</option>
         <option>Personal Request</option>
         <option>Delivery</option>
        <option>Roadside</option>
        
         <option>Moving</option>
       
        </select>
        
        <select name="vehicle_type" class="selectT-Mini">
                                         <option value=""><?PHP echo $service;?></option>
                                        <option value="">ANY</option>
                                         <option>SD</option>
                                         
                                         <option>SUBN</option>
                                         <option>Compact</option>
                                         <option>Black cab</option>
                                         <option>SUV</option>
                                         <option>Bus</option>
                                         <option>Minibus</option>
                                         <option>Van</option>
                                         <option>MVN</option>
                                         <option>Limousine</option>
                                         <option>Stretch Limousine</option>
                                         <option> Golf cart</option>
                                         
</select>
<br></br>
       <table>
              <tr>
              <td width="117">
              <label>Driver</label> 
              </td>
              <td width="175">
              <label for="">First Mile</label>
               
              </td>
              <td width="180">
              <label for="">Distance Charge</label>
               
              </td>
              <td width="100">
              <label for="">CZF</label>
               
              </td>
              </tr>
              
             </table>
     
       <?php 
       $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
       include "$rootDir/dispatch/m/driverAPI/driverslistdropdown-api.php";
       ?>
      
      
     
      
     <input class="input-half" type="text-fs" placeholder="First Mile Charge" name="fmile_charge" value="<?PHP echo $fmile_charge;?>" required>
      <input class="input-half" type="text-fs" placeholder="Distance Charge" name="distance_charge" value="<?PHP echo $distance_charge;?>" required>
      <input class="input-half" type="text-fs-sm" placeholder="CZF" name="czf" ><br></br>
      
       <table>
              <tr>
              <td width="117">
              <label>Distance</label> 
              </td>
              <td width="120">
              <label for="">Paytment</label>
               
              </td>
              <td width="174">
              <label for="">Fare Override</label>
               
              </td>
              <td width="120">
              <label for="">No.Vehilce</label>
               
              </td>
              </tr>
              
             </table>
             
      <input class="input-half" type="text-fs-sm" placeholder="Distance"  value="<?PHP echo $distance_charge;?>" name="czf">
      <input class="input-half" type="text-fs-sm" placeholder="Paytment" value="<?PHP echo $Itf;?>" name="czf">
      <input class="input-half" type="text-fs" placeholder="Fare Override" name="fare_override" value="<?PHP echo $fare_override;?>">
     $veh_number
      <select class="selectT-Mini2" name="veh_number">
            
         <option value=""><?PHP echo $fare_override;?></option>
        <option >1</option>
        
         <option>2</option>
         <option>3</option>
         <option>4</option>
         <option>5</option>
         <option>6</option>
        </select>
        <br></br>
     <label>Comment</label>
     <input type="text" name="comment" value="<?PHP echo $comment;?>" placeholder="Comment">
        
      
       <button class="btn-sm-right"  type="submit" name="caljob">Calcute</button>
      <button class="btn-sm-left" type="reset">Start Over</button>
      
         
     </div>
     
     <div class="col-lg-4" style="background-color:<?PHP echo $colormodeComponent;?>;  border-radius:5px;width:27%;height:80%; border:1px solid #ccc">
      <center><h4>Drivers Avalible and ETA</h4></center>
      <hr>
      
          <br><div id="td"></div><br>
     </div>
      
      
     </div>
      
      </form>
</div>
</div>
<script>
// Get the modal
var modal = document.getElementById("customerModal");

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

            load_data();
            
 function load_data(acq){
  $.ajax({
   url:"/dispatch/m/driverAPI/driversETA.php",
   method:"POST",
   async: "false",
   data:{acq:acq},
   success:function(data)
   {
    $('#td').html(data);
   }
  });
 }
 $('#autocomplete').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
 
});
</script>

<?php include('createJobFooter.php');?>