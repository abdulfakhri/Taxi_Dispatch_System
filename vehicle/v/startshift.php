
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

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    
<div class="container">

        <form action="" method="POST">
        <div class="title-d">
          Shift Ends:<br> 
          Total Time:
        </div>
        <p>
        <label>Edit Total Time:</label>
        <input class="input" name="shift-time" type="time"  placeholder="Enter Pickup Address">
        </p>
        <hr>
        <label>Car:</label>
        <select class="input" name="car_id">
        <option>Car1</option>
        <option>Car2</option>
        </select>
        <hr>
        <label>Selected Vehicle:</label>
         <p><?php echo $_SESSION['car_id'];?></p>
         <hr>
         <button class="btn-submit" type="submit" name="createjob">Start Shift</button>
         <button class="btn-cancel" type="reset">Cancel</button>
        </form>
      
  
</div>
   
  
   
   
   
  </div>
</div>


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
