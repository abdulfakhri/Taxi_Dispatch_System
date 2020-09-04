<?php  
 $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 
   

$q = intval($_GET['q']);


$key=$_SESSION['id'];
mysqli_select_db($conn,"jorrog3_dispatch");
$sql="SELECT * FROM urlSend WHERE Line='".$q."' AND taxi_comp='$api_key' order by date_reg DESC LIMIT 1";
$result = mysqli_query($conn,$sql);



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

mysqli_close($conn);
?>