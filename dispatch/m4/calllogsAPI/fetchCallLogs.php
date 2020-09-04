<?php 

include('../api.php');


$output = '';
if(isset($_POST["query"])){
$api_key=$_SESSION['id'];
    //$api_key="14";
    //AND date_reg='$date'
    $date=date("Y-m-d");
$Key=mysqli_real_escape_string($conn, $_POST["query"]);
$query ="SELECT * FROM urlSend WHERE taxi_comp='$api_key' AND Time LIKE '%".$Key."%' OR Line LIKE '%".$Key."%' OR Phone LIKE '%".$Key."%' OR Line LIKE '%".$Key."%' OR Duration LIKE '%".$Key."%' OR Name LIKE '%".$Key."%'";
}else{
     $query = "SELECT * FROM urlSend WHERE taxi_comp='$api_key'  ORDER BY date_reg DESC LIMIT 4";
    
 //$query = "SELECT * FROM urlSend WHERE taxi_comp='$api_key' AND SE='Start' AND(RingNumber='0' OR Duration='0' AND Line='1') ORDER BY ID DESC LIMIT 4";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
 $output .= '
             
  <div class="table-responsive-clg text-nowrap">
           <table class="table">
             <tr>
             <th>Time</th>
              <th>Ln</th>
               <th>Phone#</th>
              <th>Name</th>
             </tr>
 ';
 while($res2 = mysqli_fetch_array($result)){
  $output .= '
   <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"> 
    <td>'.$res2['Time'].'</td>;
    <td>'.$res2['Line'].'</td>;
    <td>'.$res2['Phone'].'</td>;
	<td>'.$res2['Name'].'</td>;
    
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
?> 