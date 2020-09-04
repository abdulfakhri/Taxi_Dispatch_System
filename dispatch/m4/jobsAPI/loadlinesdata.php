 <?php  
 include('/home/aidifxin/cloud/dispatch/c/api.php');
 
 include('/home/aidifxin/cloud/dispatch/c/c.php');

 include('/home/aidifxin/cloud/dispatch/c/connection.php');
   
 ?> 

<?php
$q = intval($_GET['q']);

$con = mysqli_connect("localhost", "aidifxin_abfa","!@#123qweasdzxc","aidifxin_dispatch");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$key=$_SESSION['id'];
mysqli_select_db($con,"aidifxin_dispatch");
$sql="SELECT * FROM urlSend WHERE Line='".$q."' AND taxi_comp='$key' order by date_reg DESC LIMIT 1";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {
?>

<input type="text-c" class="" placeholder="Phone" id="customer_phone"   value="<?php echo $row['Phone'];?>"   name="customer_phone">
<input type="text-c" class="" placeholder="Name" name="customer_name"  value="<?php echo $row['Name'];?>" id="customer_name">
<select name="vehicle_type" class="selectT">
                                         
                                        <option value="">ANY</option>
                                         <option>SD</option>
                                         
                                         <option>SUBN</option>
                                         <option>Compact</option>
                                         <option>Black cab</option>
                                         <option>SUV</option>
                                         <option>Bus</option>
                                         <option>Minibus</option>
                                         <option>Van</option>
                                         <option>MVN</option>
                                         <option>Limousine</option>
                                         <option>Stretch Limousine</option>
                                         <option> Golf cart</option>
                                         
</select>



<?php
}

mysqli_close($con);
?>

 
 
 