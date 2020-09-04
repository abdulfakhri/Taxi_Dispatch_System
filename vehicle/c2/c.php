<?php include("../c/v.php");?>
<?PHP
$v="../c/v.php";
$dbc="../c/connection.php";
$nav="../c/layout/nav.php";
$url="https://cloud.aidispatchsys.com/vehicle";
$uri="/vehicle";

$api=$uri."/c/api.php";
$model="../c/m.php";
$cdispatcher="/w/m/cdispatcher_api.php";
$api_key=$_SESSION['id'];
//logout api
$signout="<a  class='w3-bar-item w3-button w3-padding' href=".$uri."/u/signout.php>Sign Out</a>";

/////////////////////////////////////////////////////Dispatch///////////////////////////////////////////////////
$ft="../c/layout/end.php";
//create driver 
$createdriverapi="../m/signupdriver_api.php";
//////////////////////////////////////////////////////Home Components Top&Sidebar/////////////////////////////////////////
//$chat='<a href="'./vehicle.'/v/chat/login.php">Chat</a>';
$chat='<a href="'.$uri.'/v/chat/login.php">Chat</a>';
$profile='<img src="'.$uri.'/c/images/logo_ic_small.png" class="w3-circle w3-margin-right" style="width:40%">';
$hometitle=$uri.'/v/home.php?s=Started';

/////////////////////////////////////////////////////vehicle//////////////////////////////////////////////////
$nav_veh="../c/layout/vehicle/nav.php";
//driver shifts
$startshift="../v/startshift.php";
$startshiftapi="../m/startshift_api.php";
$readshiftapi="../m/readshift_api.php";
$shifthistory =$uri."/v/home.php?s=Started";
//driver jobs
$readdriverjob="../v/readjobs.php";
?>
