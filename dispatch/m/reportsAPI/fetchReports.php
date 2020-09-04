<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
//include "$rootDir/c.php"; 

$kId=$_SESSION['id'];
//$databaseName = 'bnsznyem_ice';
//$databaseUsername = 'bnsznyem_abfa';
//$databasePassword = '!@#123qweasdzxc';

$connPDO = new PDO("mysql:host=localhost;dbname=bnsznyem_ice","bnsznyem_abfa","!@#123qweasdzxc");

$column = array('date_reg','job_id','src_addr','ptime','dtime','dest_addr','assign_car','flight_no','vehicle_type');

/*
 $sub_array[] = $row['date_reg'];
 $sub_array[] = $row['job_id'];
 $sub_array[] = $row['src_addr'];
 $sub_array[] = $row['ptime'];
 $sub_array[] = $row['dtime'];
 $sub_array[] = $row['dest_addr'];
 $sub_array[] = $row['assign_car'];
 $sub_array[] = $row['flight_no'];
 $sub_array[] = $row['vehicle_type '];
*/
      /*
      <th>Customer Name</th>
       <th>Gender</th>
       <th>Address</th>
       
       <th>City</th>
       <th>Postal Code</th>
       <th>Country</th>

select * from mp3 where baslik like '%$search%'
UNION 
select * from HABERLER where baslik like '%$search%'
*/

$query="SELECT * FROM jobs";

/*
UNION
SELECT * FROM taxi_drivers WHERE taxi_comp='$kId'
*/

if(isset($_POST['search']['value'])){
 $query .= '
 
 
 WHERE date_reg LIKE "%'.$_POST['search']['value'].'%" 
 OR job_id LIKE "%'.$_POST['search']['value'].'%" 
 OR src_addr LIKE "%'.$_POST['search']['value'].'%" 
 OR ptime LIKE "%'.$_POST['search']['value'].'%" 
 OR dest_addr LIKE "%'.$_POST['search']['value'].'%" 
 OR assign_car LIKE "%'.$_POST['search']['value'].'%" 
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY job_id DESC';
}

$query1 = '';

if($_POST['length'] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connPDO->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connPDO->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
/*    
driver_id
driver_name
driver_email
home_address
driver_phone
driving_license
dlevel
operator_license
username
password
driver_license
number
call_sign
passenger
wheelchair
pbag
type
color
last_job
cm
license_plate
taxi_comp
date_reg
*/
 $sub_array = array();
 /*
 <th>Date</th>  
       <th>Job#</th>
       <th>Pickup</th>
       <th>C/Pick Time</th>
       <th>D/Drop Time</th>
       <th>Drop Off</th>
       <th>Driver</th>
       <th>Driver Hach Lic</th>
       <th>Driver Lic Plate</th>
        	driving_license
        	license_plate
 */
 
 $sub_array[] = $row['date_reg'];
 $sub_array[] = $row['job_id'];
 $sub_array[] = $row['src_addr'];
 $sub_array[] = $row['ptime'];
 $sub_array[] = $row['dtime'];
 $sub_array[] = $row['dest_addr'];
 $sub_array[] = $row['assign_car'];
 $sub_array[] = $row['flight_no'];
 $sub_array[] = $row['vehicle_type'];
 
 $data[] = $sub_array;
}

function count_all_data($connPDO){
    $query="SELECT * FROM jobs";
/*
 $query="SELECT * FROM jobs WHERE taxi_comp='$kId'
UNION
SELECT * FROM taxi_drivers WHERE taxi_comp='$kId'";
*/
 $statement = $connPDO->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'    => intval($_POST['draw']),
 'recordsTotal'  => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data
);

echo json_encode($output);

?>