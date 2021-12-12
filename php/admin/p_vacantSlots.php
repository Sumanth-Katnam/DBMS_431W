<?php

//fetch.php

require '../../commons/config.php';
$column = array("room_name", "occurrence", "start_time", "end_time");

$query = "SELECT * FROM Report1 ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE room_name LIKE "%'.$_POST["search"]["value"].'%"
 OR occurrence LIKE "%'.$_POST["search"]["value"].'%"
 OR start_time LIKE "%'.$_POST["search"]["value"].'%"
 OR end_time LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $con->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $con->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['room_name'];
 $sub_array[] = $row['occurrence'];
 $sub_array[] = $row['start_time'];
 $sub_array[] = $row['end_time'];
 $data[] = $sub_array;
}

function count_all_data($con)
{
 $query = "SELECT * FROM Report1";
 $statement = $con->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($con),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>