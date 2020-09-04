

<style>
body {
  font-family: 'Lato', sans-serif;
}

.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 5%;
  width: 100%;
  
  margin-top: 15px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 1px;
  right: 20px;
  font-size: 30px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 10px;
  right: 35px;
  }
}
</style>
</head>
<body>

<div id="busyDriver" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeBusyDriver()">&times;</a>
  <div class="overlay-content">
    
<div class="container">

        <form action="" method="POST">
        <div class="row">
        <br>
       
        <input class="" name="src_addr" type="text"  placeholder="Enter Pickup Address"  required>
        <input class="" name="dest_addr" type="text" placeholder="Enter Drop Address"  required><br>

       <label class="title-d">Duration:</label>
        <select class="jobentry" name="duration">
        <option>Estimed Duration</option>
        <option>15min</option>
        <option>30min</option>
        <option>1hr</option>
        <option>2hr</option>
        </select>
        </div>
        
        <div class="row">
        <label class="jobentry">Passengers:</label>
         <select class="jobentry" name="passenger_no">
        <option>1</option>
        <option>2</option>
         <option>3</option>
         <option>4</option>
         <option>5</option>
         <option>6</option>
         <option>7</option>
         <option>8</option>
         
        </select>
        <br>
              
      <label class="title-d">Bags#</label>
      <input class="jobentry " type="number" value="0" name="bags_no" min="0" max="6"><br>
       <label class="title-d">WheelChairs#</label>
      <input class="jobentry " type="number" value="0" name="wheelchair_no" min="0" max="6"><br>
     </div>
     <br>
      
      <div class="row">
      <button class="btn  w3-green" type="submit" name="createurgentjob">Book</button>
      <button class="btn w3-red" type="reset">Cancel</button>
      </div>
       
   </form>
        
      
  
</div>
   
  
   
   
   
  </div>
</div>


<script>
function openBusyDriver() {
  document.getElementById("busyDriver").style.width = "100%";
}

function closeBusyDriver() {
  document.getElementById("busyDriver").style.width = "0%";
}
</script>
     
</body>
</html>
