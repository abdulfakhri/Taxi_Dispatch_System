<?php include ('../c/api.php');?>
<?php include ('../c/c.php');?>
<?php include ('../c/m.php');?>
<?php include ($createjobapi);?>
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
  
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#job1">Job#1</a></li>
    <li><a data-toggle="pill" href="#job2">Job#2</a></li>
   
  </ul>
  
  <div class="tab-content">
    <div id="job1" class="tab-pane fade in active">
      
      <div class="title">Create New Job1</div>
    <hr>
      <div class="row">
        <form action="" method="POST">
        <div class="col-lg-4">
        <label class="">Location:</label>
        <input class="jobentry" name="<?php echo $v1;?>" type="text"  placeholder="Enter Pickup Address"  required>
        <input class="jobentry" name="<?php echo $v2;?>" type="text" placeholder="Enter Drop Address"  required><br>
        <label>Route:</label><input class="jobentry" name="<?php echo $v3;?>" type="text"  placeholder="Route"><br>
        <label>When:</label> 
        <?PHP $now=date("Y-m-d h:i");?>
        <input class="" type="text" placeholder="" name="<?php echo $v4;?>" value="<?PHP echo $now;?>">
        <label>Assign:</label>
        <select class="input" name="<?php echo $v5;?>">
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
        <hr>
       
       <label>Extras:</label><br>
       <label>Assign To:</label>
       <?php echo include('../m/driverslistdropdown-api.php');?>
      <br>
      <label>Company:</label>
      
      <?php echo include('../m/listcompanies.php');?>
      
      <br>
      <label>Tariff:</label>
      <select name="<?php echo $v21;?>" class="jobentry ">
          <option>v1</option>
          <option>v2</option>
      </select>
      <br>
       <label>Duration:</label>
      <select name="<?php echo $v22;?>" class="jobentry ">
          <option>v1</option>
          <option>v2</option>
      </select>
      <br>
      <label>Priority:</label>
      <select name="<?php echo $v23;?>" class="jobentry ">
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
      <label>Flight#:</label>
      <input class="jobentry " type="text" placeholder="Flight" name="<?php echo $v24;?>">
      <br>
      <label>Room#:</label>
      <input class="jobentry " type="text" placeholder="Room" name="<?php echo $v25;?>">
    </div>
        <div class="col-lg-4">
        
          <label>Passenger:</label><br>
      
      <input class="jobentry " type="text" placeholder="Name" name="<?php echo $v6;?>" required>          
      <input class="jobentry " type="text" placeholder="Phone" name="<?php echo $v7;?>" required>
      <input class="jobentry " type="text" placeholder="Account Id/Name" name="<?php echo $v8;?>" required>          
      <input class="jobentry " type="text" placeholder="Email" name="<?php echo $v9;?>" required><br>
      <label>Payment:</label> <br>
        <input type="text" name="<?php echo $v10;?>" placeholder="Amount">&nbsp;
         
        <select class="input" name="<?php echo $v11;?>">
        <option>eTicket</option>
        <option>Prepaid-Cash</option>
        <option>Prepaid-Card Present</option>
        <option>Prepaid-Bank Transfer</option>
        </select>
        
      <hr>
       <label>JOB INFO:</label><br>
       
      <label>Number of Passenger#</label>
      <input class="jobentry " type="number" value="1" name="<?php echo $v12;?>" min="1" max="6">              
      <label>Bags#</label>
      <input class="jobentry " type="number" value="0" name="<?php echo $v13;?>" min="0" max="6">
       <label>WheelChairs#</label>
      <input class="jobentry " type="number" value="0" name="<?php echo $v14;?>" min="0" max="6">
      <label>Car#</label>
      <input class="jobentry " type="number" value="1" name="<?php echo $v15;?>" min="1" max="8">
      <label>Vehicle Type:</label>
      <select name="<?php echo $v16;?>" class="jobentry ">
          <option>Not Specified</option>
          <option>Station Wagon</option>
      </select>    
   
      <hr>
      <button class="btn  w3-green" type="submit" name="createjob">Book</button>
      <button class="btn w3-red" type="reset">Cancel</button>
          </div>
        <div class="col-lg-4">
              <iframe id=""name="<?php echo v30;?>" width="100%" height="700px" src="https://maps.google.com/maps?width=100%&amp;height=100%&amp;hl=en&amp;q=New%20York%2C%20city%2C%20United%20States%20of%20America+(MasteryDispatch)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/coordinates.html">gps coordinates</a></iframe> 
              
          </div>
        </form>
      </div>
      
    </div>
    <div id="job2" class="tab-pane fade">
      <div class="title">Create New Job2</div>
    <hr>
      <div class="row">
        <form action="" method="POST">
        <div class="col-lg-4">
        <label class="">Location:</label>
        <input class="jobentry" name="<?php echo $v1;?>" type="text"  placeholder="Enter Pickup Address"  required>
        <input class="jobentry" name="<?php echo $v2;?>" type="text" placeholder="Enter Drop Address"  required><br>
        <label>Route:</label><input class="jobentry" name="<?php echo $v3;?>" type="text"  placeholder="Route"><br>
        <label>When:</label> 
        <?PHP $now=date("Y-m-d h:i");?>
        <input class="" type="text" placeholder="" name="<?php echo $v4;?>" value="<?PHP echo $now;?>">
        <label>Assign:</label>
        <select class="input" name="<?php echo $v5;?>">
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
        <hr>
       
       <label>Extras:</label><br>
       <label>Assign To:</label>
       <?php echo include('../m/driverslistdropdown-api.php');?>
      <br>
      <label>Company:</label>
      
      <?php echo include('../m/listcompanies.php');?>
      
      <br>
      <label>Tariff:</label>
      <select name="<?php echo $v21;?>" class="jobentry ">
          <option>v1</option>
          <option>v2</option>
      </select>
      <br>
       <label>Duration:</label>
      <select name="<?php echo $v22;?>" class="jobentry ">
          <option>v1</option>
          <option>v2</option>
      </select>
      <br>
      <label>Priority:</label>
      <select name="<?php echo $v23;?>" class="jobentry ">
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
      <label>Flight#:</label>
      <input class="jobentry " type="text" placeholder="Flight" name="<?php echo $v24;?>">
      <br>
      <label>Room#:</label>
      <input class="jobentry " type="text" placeholder="Room" name="<?php echo $v25;?>">
    </div>
        <div class="col-lg-4">
        
          <label>Passenger:</label><br>
      
      <input class="jobentry " type="text" placeholder="Name" name="<?php echo $v6;?>" required>          
      <input class="jobentry " type="text" placeholder="Phone" name="<?php echo $v7;?>" required>
      <input class="jobentry " type="text" placeholder="Account Id/Name" name="<?php echo $v8;?>" required>          
      <input class="jobentry " type="text" placeholder="Email" name="<?php echo $v9;?>" required><br>
      <label>Payment:</label> <br>
        <input type="text" name="<?php echo $v10;?>" placeholder="Amount">&nbsp;
         
        <select class="input" name="<?php echo $v11;?>">
        <option>eTicket</option>
        <option>Prepaid-Cash</option>
        <option>Prepaid-Card Present</option>
        <option>Prepaid-Bank Transfer</option>
        </select>
        
      <hr>
       <label>JOB INFO:</label><br>
       
      <label>Number of Passenger#</label>
      <input class="jobentry " type="number" value="1" name="<?php echo $v12;?>" min="1" max="6">              
      <label>Bags#</label>
      <input class="jobentry " type="number" value="0" name="<?php echo $v13;?>" min="0" max="6">
       <label>WheelChairs#</label>
      <input class="jobentry " type="number" value="0" name="<?php echo $v14;?>" min="0" max="6">
      <label>Car#</label>
      <input class="jobentry " type="number" value="1" name="<?php echo $v15;?>" min="1" max="8">
      <label>Vehicle Type:</label>
      <select name="<?php echo $v16;?>" class="jobentry ">
          <option>Not Specified</option>
          <option>Station Wagon</option>
      </select>    
   
      <hr>
      <button class="btn  w3-green" type="submit" name="createjob">Book</button>
      <button class="btn w3-red" type="reset">Cancel</button>
          </div>
        <div class="col-lg-4">
              <iframe id=""name="<?php echo v30;?>" width="100%" height="700px" src="https://maps.google.com/maps?width=100%&amp;height=100%&amp;hl=en&amp;q=New%20York%2C%20city%2C%20United%20States%20of%20America+(MasteryDispatch)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/coordinates.html">gps coordinates</a></iframe> 
              
          </div>
        </form>
      </div>
      
    </div>
   
  </div>

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
