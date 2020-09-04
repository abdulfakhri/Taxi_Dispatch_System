<?php
include('../c/c.php');
session_start();
$databaseHost = 'localhost';
$databaseName = 'aidifxin_dispatch';
$databaseUsername = 'aidifxin_abfa';
$databasePassword = '!@#123qweasdzxc';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

   // if(isset($_POST['but_upload'])){
       $maxsize = 5242880; // 5MB
       $apiKey=$_SESSION['id'];
       $name = $_FILES['audio_data']['name'];
       $target_dir = "upload/";
       $target_file = $target_dir . $_FILES["audio_data"]["name"].".wav";
       $to=$_SESSION['to_chat'];
       $token=$_SESSION['token'];
       $from=$_SESSION['id'];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg","wav","mp3");

       // Check extension
     //  if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['audio_data']['size'] >= $maxsize) || ($_FILES["audio_data"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['audio_data']['tmp_name'],$target_file)){
              // Insert record
             // $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."') ";
              $query ="INSERT INTO chat_message(token,to_user_id,from_user_id,filename,filepath,taxi_comp)  VALUES('$token','$to','$from','".$name."','".$target_file."','$apiKey')";
              mysqli_query($conn,$query);
              echo "Upload successfully.";
            }
          }
       /*
       }else{
          echo "Invalid file extension.";
       }
      */
    // } 
     ?>
 
 <?php //echo $_SESSION['token'];?>
