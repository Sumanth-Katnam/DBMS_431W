<?php
    require '../../commons/config.php';

    $column = array("dept_id", "dept_name", "course_id", "course_name", "instructor_id", "instructor_name", "total");

    $query = "SELECT * FROM report1 ";

    if(isset($_POST["search"]["value"])) {
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

    if(isset($_POST["order"])) {
        $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
    } else {
        $query .= 'ORDER BY dept_id DESC ';
    }

    $query1 = '';

    if($_POST["length"] != -1) {
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $allQuery = mysqli_query($con, $query);
    $number_filter_row = mysqli_num_rows($allQuery);

    $pageQuery = mysqli_query($con, $query.$query1);

    $data = array();
    while ($row = mysqli_fetch_assoc($pageQuery)) {
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

    function count_all_data() {
        global $con;
        $countQuery = "SELECT COUNT(*) FROM report1";
        $result = mysqli_query($con, $countQuery);
        $count = mysqli_fetch_assoc($result);
        return $count['COUNT(*)'];
    }

    $output = array(
        'draw'   => intval($_POST['draw']),
        'recordsTotal' => count_all_data(),
        'recordsFiltered' => $number_filter_row,
        'data'   => $data
    );

    echo json_encode($output);
?>