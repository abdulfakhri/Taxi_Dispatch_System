<?php
unset($_SESSION['valid']);
session_destroy(); // destroy session

header("Location: http://cloud.regrowup.com/vehicle/u/signin_d.php"); 
?>