<?php //session_start();?>
<?php  
 $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 
   

$q = intval($_GET['q']);

$key=$_SESSION['id'];
mysqli_select_db($conn,"jorrog3_dispatch");
$sql="SELECT * FROM urlSend WHERE Line='".$q."' AND taxi_comp='$api_key' order by date_reg DESC LIMIT 1";
$result = mysqli_query($conn,$sql);
if($result!=null){
while($row = mysqli_fetch_array($result)) {

?>
<table>
              <tr>
              <td>
              <label for="state">Passenger Phone</label>
               
              </td>
              <td width="200">
              <label for="zip">Passenger Name</label>
              </td>
              
              </tr>
              <br>
             
             <tr>   
             <td>
                <input type="text-c" class="" placeholder="Phone" id="customer_phone"   value="<?php echo $row['Phone'];?>"  name="customer_phone">
                </td>
               <td width="200"> 
                <input type="text-c" class="" placeholder="Name" name="customer_name"  value="<?php echo $row['Name'];?>" id="customer_name">
                </td>
                
             </tr>
             </table>






<?php
}
}else{
?>
<table>
              <tr>
              <td width="200">
              <label for="zip">Passenger Name</label>
              </td>
              <td>
              <label for="state">Passenger Phone</label>
               
              </td>
              </tr>
              <br>
             
             <tr>   
             
               <td width="200"> 
                <input type="text-c" class="" placeholder="Name" name="customer_name"  id="customer_name">
                </td>
                <td>
                <input type="text-c" class="" placeholder="Phone" id="customer_phone"     name="customer_phone">
                </td>
             </tr>
             </table>

<?php
 
}
mysqli_close($conn);
?>