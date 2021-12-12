<?php

//fetch.php

require '../../commons/config.php';
$column = array("dept_id", "dept_name", "course_id", "course_name", "instructor_id", "instructor_name", "total");

$query = "SELECT * FROM Report1 ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE dept_id LIKE "%'.$_POST["search"]["value"].'%"
 OR dept_name LIKE "%'.$_POST["search"]["value"].'%"
 OR course_id LIKE "%'.$_POST["search"]["value"].'%"
 OR course_name LIKE "%'.$_POST["search"]["value"].'%"
 OR instructor_id LIKE "%'.$_POST["search"]["value"].'%"
 OR instructor_name LIKE "%'.$_POST["search"]["value"].'%"
 OR total LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = $row['dept_id'];
 $sub_array[] = $row['dept_name'];
 $sub_array[] = $row['course_id'];
 $sub_array[] = $row['course_name'];
 $sub_array[] = $row['instructor_id'];
 $sub_array[] = $row['instructor_name'];
 $sub_array[] = $row['total'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM Report1";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>