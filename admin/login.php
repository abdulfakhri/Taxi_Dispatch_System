<?php 

session_start(); 
//include('../c/c.php');
include('../dispatch/c/connection.php');
//include($dbc);
if(isset($_POST['sign'])) {
    $pass = $_POST['password'];
	//$email = $_POST['email'];
	//$pass = $_POST['password'];
    $username = $_POST['username'];
    //$compId = $_POST['companyId'];
$ret=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' and password='$pass'");
$num=mysqli_fetch_array($ret);
if($num>0){
            $validuser = $num['id'];
			$_SESSION['valid'] = $validuser;
			//$_SESSION['name'] = $num['organization'];
			$_SESSION['username'] = $num['username'];
			//$_SESSION['email'] = $num['email'];
			$_SESSION['id'] = $num['id'];
		//	$_SESSION['companyId'] = $num['companyId'];
         //   $_SESSION['password'] = $num['password'];
         //   $_SESSION['mode'] = $num['background'];
          //  $_SESSION['title'] = $num['title'];
            
			header('location: /admin/home/index.php'); 

}else{
$msg="Invalid username or password";
}

}

?>
   

<body>
       

            
   <?php 
   //include($navu);
   include('nav-u.php');
   ?>
         


       
        <center> <h4><b>Sys Ad</b></h4> <br>
     <img  align="center" style=" align-items: center;
                background-color: #ffffff;
                padding:;
                width: ;
                margin-bottom: ;
                border: 3px;
                background: white;
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
                font-family: lato;
                position: relative;
                color: #333;
                border-radius: 15px;" src="log.png" alt="" width="700" height="300">
             </center>
             <br>
            <div class="container">
            <form action="" method="POST">

                <div class="row">
                    
                    
                           <div class="col-25">
                              
                              <form action=""  name="sigin" method="post" >
                                       
                                       <label></label>
                                       <input type="text" placeholder="Username" name="username"  />     
                                       
                                       <label> </label>
                                       <input name="password" type="text" value="" placeholder="Password" required />
      
                                   
                                   
                                     <?PHP echo $reg; ?>
                                     <hr>
                                     <button type="submit"  class="btn btn-default" name='sign'>Sign In</button>
                         <button type="reset" class="btn btn-default">Clear Form </button>
                            </div>
                          
                 </div>
                
                
               
 
            </form>
            
        
        </div>
        
