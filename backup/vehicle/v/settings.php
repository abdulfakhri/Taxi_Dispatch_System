<?php include ('../c/api.php');?>
<?php include ('../c/m.php');?>
<?php include ('../c/v.php');?>
<?php include ('../c/c.php');?>
<?php include ($startshift);?>
<?php include ($startshiftapi);?>
<?php include ($nav);?>
<?php include ('calc.php');?>
<?php include ('driverjob_busy.php');?>
<?php include ('../m/busydriver_api.php');?>
<?php include ('../m/awaydriver_api.php');?>
<div class="container">
  
       
       <!--Shift table-->
       <div class="title-d"><span style="font-size:20px;cursor:pointer" onclick="openNavi()"> Calculator</span></div>
       <div class="title-d">
        <p>
        <?php 
        $status=$_GET['s'];
        if($status=="Started"){
        echo  "<p style='font-size:20px;cursor:pointer'>Shift:<span style='font-size:18px;cursor:pointer;color:green'>$status</span></p>";
        }else if($status=="Started"){
        echo  "<p style='font-size:20px;cursor:pointer'>Shift:<span style='font-size:18px;cursor:pointer;color:green' onclick='openNav()'>$status</span></p>";   
        }
        
        ?></p>
        
       </div>
      
       <div class="title-d">
         <div class="title-d">Jobs View</div>
        <?php include ($readdriverjob);?>
       </div>
</div>
   
<?php include ($ft);?>
       