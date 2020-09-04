<?php 
include ($dbc);
//fetching data in descending order (lastest entry first)

$assign_car=$_SESSION['id'];
$taxi_comp=$_SESSION['taxi_comp'];
$resul = mysqli_query($conn,"SELECT * FROM drivers_busy WHERE status='away' AND assign_car='$assign_car' ORDER BY date_reg ASC");
while($res2 = mysqli_fetch_array($resul)) {
echo "<tr>";
echo "<td>".$res2[1]."</td>";
echo "<td>".$res2[2]."</td>";
echo "<td>".$res2['duration']."</td>";
echo "<td>".$res2['status']."</td>";
echo "</tr>";
}



?>
