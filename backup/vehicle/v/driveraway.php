

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

<div id="awayDriver" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeawayDriver()">&times;</a>
  <div class="overlay-content">
    
<div class="container">

        <form action="" method="POST">
       
       <div class="title-d">Estimated Duration</div>
        <div class="row">
        
        
        <select class="jobentry" name="duration">
        <option>10mins</option>
        <option>15min</option>
        <option>30mins</option>
        <option>30mins</option>
        <option>1hour</option>
        </select>
        </div>
       
      
      <div class="row">
      <button class="btn  w3-green" type="submit" name="driverAway">Submit</button>
      <button class="btn w3-red" type="reset">Cancel</button>
      </div>
       
   </form>
        
      
  
</div>
   
  
   
   
   
  </div>
</div>


<script>
function openawayDriver() {
  document.getElementById("awayDriver").style.width = "100%";
}

function closeawayDriver() {
  document.getElementById("awayDriver").style.width = "0%";
}
</script>
     
</body>
</html>
