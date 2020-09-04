<?php
include($dbc);
if(isset($_POST['setting'])) {
    $title = $_POST['title'];
    $back = $_POST['background'];
	$map = $_POST['map'];
	$meteric = $_POST['meteric'];
	$tc= $_SESSION['id'];

	 $sql="UPDATE taxi_company SET name='$title', background='$back',map_type='$map', meteric='$meteric' WHERE id='$tc'";
	     
   $result=mysqli_query($conn, $sql);
	if ($result != null) {
	     $reg="Not Profile, Try Again Now";
	      // header('Location: /dispatch/v/settings.php');
	    ?>
	 <script>
    window.location = '/dispatch/u/signout.php';
    </script>
	  <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    $reg="Not Profile, Try Again Now";
    header('Location: /dispatch/v/settings.php'); 
}
mysqli_close($conn);

}
?>
