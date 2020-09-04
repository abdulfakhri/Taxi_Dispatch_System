<?php
session_start();
include('../c/c.php');
include('../c/nav/chatstyle.php');
include($dbc);


$apiKey=$_SESSION['id'];
$from=$_SESSION['id'];
$to=$_SESSION['to_chat'];
$fname=$_SESSION['name'];
$tname=$_SESSION['to_chatName'];
$tk=$_SESSION['chatToken'];
//token='$tk' AND
/*
$from=$_SESSION['user_id'];
$to=$_GET['uid'];
*/
     $fetch = mysqli_query($conn,"SELECT * FROM chat_message WHERE taxi_comp='$apiKey' ORDER BY date_reg DESC");
     while($row = mysqli_fetch_assoc($fetch)){
       
       $sender=$row['from_user_id '];
       $toP=$row['to_user_id '];
       /*
       if($sender!=null OR $toP==null ){
           $per=$sender;
       }else if($toP!=null OR $sender==null){
            $per=$toP;
       }
       */
       
       $fn= $row['filename'];
       $f= $row['chat_message'];
                     //if($f != null){
                         
                       echo'<table><tr>';
                       echo '<td style="color:">'.'<b>'.$from.'</b>'.':<br>'.$f.'</td>';
                       echo '</tr></table>';
                    // }else if($l != null){
                       //foreach(glob($f) AS $msg){
                    ?>
                   
                   <!--<audio controls="controls" preload="metadata" autoplay>       
                       <source=""  type="">
                       Your browser does not support the audio element.
                     </audio><br>-->
                     
                     <?php// echo $f; ?>
                       
                    <!--<audio src="<?php //echo $voicemessages; ?>"."<br>"  controls width="100px" height="100px">
                       Your browser does not support the audio element.';
                       </audio><br>-->
                   <?php
                      // }
                    // }
               }
?>
 