<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
header('Location: /dispatch/index.php');
}

$kId=$_SESSION['id'];

$connect = new PDO("mysql:host=localhost;dbname=aidifxin_dispatch","aidifxin_abfa","!@#123qweasdzxc");

$column = array('date_reg','job_id','src_addr','ptime','dtime','dest_addr','assign_car','driver_license','driver_license');

$query="SELECT * FROM jobs  WHERE taxi_comp='$kId'";

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

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{

 $sub_array = array();
//'date_reg','job_id','src_addr','ptime','dtime','dest_addr','assign_car','driver_license','driver_license'
 $sub_array[] = $row['date_reg'];
 $sub_array[] = $row['job_id'];
 $sub_array[] = $row['src_addr'];
 $sub_array[] = $row['ptime'];
 $sub_array[] = $row['dtime'];
 $sub_array[] = $row['dest_addr'];
 $sub_array[] = $row['assign_car'];
 $sub_array[] = $row['driver_license'];
 $sub_array[] = $row['driver_license'];
 
 $data[] = $sub_array;
}

function count_all_data($connect){
    $query="SELECT * FROM jobs  WHERE taxi_comp='$kId'";
/*
 $query="SELECT * FROM jobs WHERE taxi_comp='$kId'
UNION
SELECT * FROM taxi_drivers WHERE taxi_comp='$kId'";
*/
 $statement = $connect->prepare($query);
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