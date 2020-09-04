<?php include ('../c/api.php');?>
<?php include ('../c/c.php');?>
<?php include ('../c/m.php');?>
<?php include('mapApi.php');?>
<?php include('../m/cjob_api.php');?>


<?php include ('../c/nav/createjob-style.php');?>
 
  
</head>
  <body>
<body>
    
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <div class="overlay-content">
    
    
     <div class="container-createjob">
          
     
      <div class="col-lg-8" style="background-color:;  border-radius:5px;width:70%; border:1px solid #ccc">

        <form action="cdjobs.php" method="POST" style="border:px solid #ccc"> 
        <label class="">Select Line#:</label><br>
         <select class="selectT-Mini" name="phonelines" onchange="showUser(this.value)">
        <option value="">L#:</option>
        <option value="1">L1</option>
        <option value="2">L2</option>
        <option value="3">L3</option>
        <option value="4">L4</option>
       </select>
        <br>
        <div id="txtHint"></div> 
        
       <br>
    
        <label class="">PickUp:</label>
       <input id="from_places"  name="src_addr" type="text" class="input-half"   onFocus="geolocate()"  placeholder="Enter Pickup Address"/><br>
       

        <input class="input-half" type="text-fs" placeholder="Cross Street:" name="cross_street">
      <input class="input-half" type="text-fs" placeholder="At:" name="at" >
      <input class="input-half" type="text-fs" placeholder="Service:" name="service"><br>
      
         <label>DropOff :</label>
        <input  id="to_places"  name="dest_addr" type="text"  class="input-half"    onFocus="geolocate()" placeholder="Enter Drop Address"/><br>
       
       
        <label>Time Assigned:</label> <br>
        <?PHP $now=date("Y-m-d h:i");?> 
        <input class="" type="text-half" placeholder="" name="timing" value="<?PHP echo $now;?>">
       
        <select class="selectT" name="time_assigned">
            
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
        
       <?php echo include('/home/aidifxin/cloud/dispatch/m/driverAPI/driverslistdropdown-api.php');?>
      <br>
      
      <input type="text" name="comment" placeholder="Comment">
      
      <br>
      <input class="input-half" type="text-f" placeholder="First Mile Charge" name="fmile_charge" >
      <input class="input-half" type="text-f" placeholder="Distance Charge" name="distance_charge">
       <br>
         <button class="btn  w3-green" type="submit" name="caljob">Calcute</button>
      <button class="btn w3-red" type="reset">Clear</button>
     
    
        
      
       </form>
         
     </div>
     
     <div class="col-lg-4" style="background-color:<?PHP echo $colormodeComponent;?>;  border-radius:5px;width:30%; border:1px solid #ccc">
      <center><h4>Drivers Avalible and ETA</h4></center>
      <hr>
      
          <br><div id="td"></div><br>
     </div>
      
     </div>

      
  </div>
</div>


<!--<script>
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    mapTypeControl: false,
    center: {lat:40.730610, lng: -73.935242},
    zoom: 13
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
  var destinationAutocomplete =
      new google.maps.places.Autocomplete(destinationInput);
  // Specify just the place data fields that you need.
  destinationAutocomplete.setFields(['place_id']);
  this.setupClickListener('changemode-walking', 'WALKING');
  this.setupClickListener('changemode-transit', 'TRANSIT');
  this.setupClickListener('changemode-driving', 'DRIVING');
  this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
  this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
      destinationInput);
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

</script>-->

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(40.730610, -73.935242),
  zoom:10,
  
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9Pyf9DzK853LRdgobgwCdMDbi5B-QUMY&callback=myMap"></script>
<!--       
<script>
function addRow() {
  const div = document.createElement('div');
  div.className = 'row';
  div.innerHTML = `
  <label>Stop1:</label>
    <input type="text" id="to_places" name="dest_addr[]"  value="" class="input" placeholder="Drop Add1" />
    <input type="button" value="-" onclick="removeRow(this)" />
  `;
  document.getElementById('content').appendChild(div);
}
function removeRow(input) {
  document.getElementById('content').removeChild(input.parentNode);
}
</script>-->

<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
     
</body>
</html>
