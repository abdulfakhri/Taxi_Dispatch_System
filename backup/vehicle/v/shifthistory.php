<?php include ('../c/api.php');?>
<?php include ('../c/m.php');?>
<?php include ('../c/v.php');?>
<?php include ('../c/c.php');?>

<div class="container">
  
       
 
      
      
       <div>
         <div class="title-d">Driver History</div>
        <?php 
        $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
        include "$rootDir/vehicle/m/readdriverhistory_api.php";
        ?>
       </div>
</div>
   
<?php include ($ft);?>
       