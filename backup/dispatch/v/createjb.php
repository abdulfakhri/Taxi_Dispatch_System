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
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #origin-input,
      #destination-input {
        background-color: #000;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 200px;
      }

      #origin-input:focus,
      #destination-input:focus {
        border-color: #4d90fe;
      }

      #mode-selector {
        color: #fff;
        background-color: #4d90fe;
        margin-left: 12px;
        padding: 5px 11px 0px 11px;
      }

      #mode-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

    </style>
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
  xmlhttp.open("GET","/dispatch/m/jobsAPI/loadlinesdata.php?q="+str,true);
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
       
       <option value="0">L0</option>
        <option value="1">L1</option>
        <option value="2">L2</option>
        <option value="3">L3</option>
        <option value="4">L4</option>
       
        
       </select>
        
        <div id="txtHint"></div> 
        
       <br>
      
    
        <label class="">PickUp:</label>  
       <input id="autocomplete" name="src_addr" type="text" class=""  oninput="initialize()"  placeholder="Enter Pickup Address" required>
       
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
               <input class="input-half" type="text-half-th" placeholder="Cross Street:"  name="cross_street">
                </td>
                <td>
                <input class="input-half" type="text-half-th" placeholder="At:"  name="at">
                </td>
             </tr>
             </table>
          
       <br>
         <label>DropOff :</label>
        <input  id="autocomplete1"  name="dest_addr" type="text"  class=""  oninput="initialize()"   placeholder="Enter Drop Address"><br>
       
       
        
       </div>
       <div class="col-lg-4" style="background-color:;  border-radius:5px;width:40%;height:80%; border:1px solid #ccc">
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
        
        <input class="" type="text-half" placeholder="" name="timing" value="<?PHP echo $now;?>" required>
        
        <select class="selectT-Mini" name="time_assigned" required>
        
        <option value="ASAP">ASAP</option>
        <option value="Later">Later</option>
         <option value="Price Check">Price Check</option>
        <option> value="5min">5min</option>
        <option value="10min">10min</option>
        <option value="15min">15min</option>
        <option value="20min">20min</option>
        <option value="30min">30min</option>
        <option value="45min">45min</option>
        <option value="1hr0min">1hr0min</option>
        <option value="1hr30min">1hr30min</option>
        <option value="2hr0min">2hr0min</option>
        </select>
        
       <select class="selectT-Mini2" name="service">
        
        <option value="Quick Ride">Quick Ride</option>
         <option value="Reservation">Reservation</option>
         <option value="Personal Request">Personal Request</option>
         <option value="Delivery">Delivery</option>
        <option value="Roadside">Roadside</option>
        
         <option value="Moving">Moving</option>
       
        </select>
        
         <select name="vehicle_type" class="selectT-Mini">
                                        
                                        <option value="ANY">ANY</option>
                                         <option value="SD">SD</option>
                                         
                                         <option value="SUBN">SUBN</option>
                                         
                                         
                                         <option value="SUV">SUV</option>
                                         
                                         <option value="Van">Van</option>
                                         <option value="MVN">MVN</option>
                                       
                                         
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
       //$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
       //include "$rootDir/dispatch/m/driverAPI/driverslistdropdown-api.php";
      
       ?>
       <input type="text-fs-sm" name="comment"  placeholder="Driver" disabled >
      
     
      
     <input class="input-half" type="text-fs" placeholder="First Mile Charge" name="fmile_charge"  required>
      <input class="input-half" type="text-fs" placeholder="Distance Charge" name="distance_charge"  required>
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
             
      <input class="input-half" type="text-fs-sm" placeholder="Distance"   name="czf">
      <input class="input-half" type="text-fs-sm" placeholder="Paytment"  name="czf">
      <input class="input-half" type="text-fs" placeholder="Fare Override" name="fare_override" >
     
      <select class="selectT-Mini2" name="veh_number">
            
         
        <option value="1">1</option>
        
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
        </select>
        <br></br>
     <label>Comment</label>
     <input type="text" name="comment"  placeholder="Comment">
        
      
       <button class="btn-sm-right"  type="submit" name="caljob">Calcute</button>
      <button class="btn-sm-left" type="reset">Start Over</button>
      
         
     </div>
     
  <div class="col-lg-4" style="background-color:<?PHP echo $colormodeComponent;?>;  border-radius:5px;width:30%;height:80%; border:1px solid #ccc">
      

      <div id="map"></div>
          
          
     </div>
      
      
     </div>
      
      </form>
</div>
</div>

<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    mapTypeControl: false,
    center: {lat:40.730610, lng: -73.935242},

    zoom: 10
  });

  new AutocompleteDirectionsHandler(map);
}

/**
 * @constructor
 */
function AutocompleteDirectionsHandler(map) {
  this.map = map;
  this.originPlaceId = null;
  this.destinationPlaceId = null;
  this.travelMode = 'DRIVING';
  this.directionsService = new google.maps.DirectionsService;
  this.directionsRenderer = new google.maps.DirectionsRenderer;
  this.directionsRenderer.setMap(map);

  var originInput = document.getElementById('origin-input');
  var destinationInput = document.getElementById('destination-input');
  var modeSelector = document.getElementById('mode-selector');

  var originAutocomplete = new google.maps.places.Autocomplete(originInput);
  // Specify just the place data fields that you need.
  originAutocomplete.setFields(['place_id']);

  var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput);
  // Specify just the place data fields that you need.
  destinationAutocomplete.setFields(['place_id']);

  this.setupClickListener('changemode-walking', 'WALKING');
  this.setupClickListener('changemode-transit', 'TRANSIT');
  this.setupClickListener('changemode-driving', 'DRIVING');

  this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
  this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
}

// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
AutocompleteDirectionsHandler.prototype.setupClickListener = function(
    id, mode) {
  var radioButton = document.getElementById(id);
  var me = this;

  radioButton.addEventListener('click', function() {
    me.travelMode = mode;
    me.route();
  });
};

AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(
    autocomplete, mode) {
  var me = this;
  autocomplete.bindTo('bounds', this.map);

  autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();

    if (!place.place_id) {
      window.alert('Please select an option from the dropdown list.');
      return;
    }
    if (mode === 'ORIG') {
      me.originPlaceId = place.place_id;
    } else {
      me.destinationPlaceId = place.place_id;
    }
    me.route();
  });
};

AutocompleteDirectionsHandler.prototype.route = function() {
  if (!this.originPlaceId || !this.destinationPlaceId) {
    return;
  }
  var me = this;

  this.directionsService.route(
      {
        origin: {'placeId': this.originPlaceId},
        destination: {'placeId': this.destinationPlaceId},
        travelMode: this.travelMode
      },
      function(response, status) {
        if (status === 'OK') {
          me.directionsRenderer.setDirections(response);
        } else {
          window.alert('Directions request failed due to ' + status);
        }
      });
};

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9Pyf9DzK853LRdgobgwCdMDbi5B-QUMY&libraries=places&callback=initMap"
        async defer>
    </script>
        
<?php include('createJobFooter.php');?>