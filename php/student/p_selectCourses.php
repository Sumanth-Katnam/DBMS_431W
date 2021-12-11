<?php 
    $refStudent;
    
    if(isset($_POST['submit'])){
        submitForm($_POST);
    } elseif(isset($_POST['func'])) {
        if($_POST['func'] === "retrieveCourses"){
            retrieveCourses($_POST);
        } elseif($_POST['func'] === "retrieveOfferings"){
            retrieveOfferings($_POST);
        }
    }

    function submitForm($postData){
        require '../../commons/config.php';
        include '../../models/RefStudent.php';
        $id = $_SESSION['user_id'];
        $refStudent = new RefStudent($postData['student_id'], $postData['fname'], 
            $postData['mname'], $postData['lname'], 
            $postData['email_id'], $postData['last_logged_in'], 
            $postData['countryCodeDrpdwn'], $postData['phoneNumber']);
        
        $update = "UPDATE ref_students 
            SET fname='$refStudent->fname',
            mname='$refStudent->mname',
            lname='$refStudent->lname',
            country_code='$refStudent->country_code',
            phone_number='$refStudent->phone_number'
            WHERE student_id='$id' ";

        $con->query($update);
        $_SESSION['myAccountUpdate']  = $con->affected_rows === 1;
        
        // Updating session variables for display
        $_SESSION['fname']  = $refStudent->fname;
        $_SESSION['mname']  = $refStudent->mname;
        $_SESSION['lname']  = $refStudent->lname;
        header("location: ../../student/myAccount.php");
    }

    function utf8ize($d) {
        if (is_array($d)) {
            foreach ($d as $k => $v) {
                $d[$k] = utf8ize($v);
            }
        } else if (is_string ($d)) {
            return utf8_encode($d);
        }
        return $d;
    }

    function retrieveCourses($postData) {
        require '../../commons/config.php';
        include '../../models/RefCourse.php';

        $deptId = $postData['deptId'];
        $select_query=  "SELECT C.course_id, C.course_name, D.dept_id
            FROM ref_courses C 
            JOIN ref_department D 
            ON C.dept_id = D.dept_id 
            WHERE D.dept_id = '$deptId'";

        if(!$courses = mysqli_query($con, $select_query)) {
            echo "Failed to retrieve courses";
        } else {
            $coursesArr = [];
            while($course = mysqli_fetch_assoc($courses)){
                $courseObj = new RefCourse($course['course_id'], $course['course_name'], $course['dept_id']);
                array_push($coursesArr, $courseObj);
            }
            echo json_encode($coursesArr);
        }
    }

    

    function retrieveOfferings() {

    }

?>