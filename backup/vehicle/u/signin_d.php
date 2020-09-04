<?php 
session_start();
include('../c/c.php');
include($dbc);

if(isset($_SESSION['id'])){

header('location:/vehicle/v/home.php?s=Started'); 


}else {

//if(isset($_POST['sign'])) {

    $pass = $_POST['password'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
    $username = $_POST['username'];
    $compId = $_POST['companyId'];
    
    $phone = $_POST['driver_phone'];

$ret=mysqli_query($conn,"SELECT * FROM  taxi_drivers WHERE driver_phone='$phone'");
$num=mysqli_fetch_array($ret);
if($num>0){
                $validuser = $num['driverId'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $num['driver_name'];
			$_SESSION['dphone'] = $num['driver_phone'];
			$_SESSION['username'] = $num['username'];
			$_SESSION['email'] = $num['driver_email'];
			$_SESSION['id'] = $num['driverId'];
			$_SESSION['taxi_comp'] = $num['taxi_comp'];
			
           
			header('location: /vehicle/v/home.php?s=Started&tc='); 

}else{
echo "Invalid username or password";
}

}

?>
   

<body>
       

            
    <?php include 'nav.php';?>
         


       
        <center> <h4><b>Sign In As Driver</b></h4> </center>
   
            <div class="container">
            <form action="" method="POST">

                <div class="row">
                    
                    
                           <div class="col-25">
                              
                              <form action=""  name="sigin" method="post" >
                                         
                                       <label></label>
                                     <input type="text" placeholder="Enter Mobile Number" name="driver_phone"  /> <br>    
                                     <!--<input type="checkbox" placeholder="" name=""  /> Remember Me-->
                                      
                                       
      
                                   
                                   
                                     <?PHP echo $reg; ?>
                                     <br></br>
                                     <button type="submit"  class="btn btn-default" name='sign'>Sign In</button>
                                     <br></br>
                                     
                                     <button type="reset" class="btn btn-default">Clear Form </button>
                                     <hr>
                                     
                            </div>
                          
                 </div>
                
                
                
 
            </form>
            
        
        </div>
        

    <?php include 'footer.php';?>