<?php
unset($_SESSION['valid']);
session_destroy(); // destroy session
header("Location: /index.php"); 
?>