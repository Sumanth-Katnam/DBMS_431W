<?php 
    if(isset($_POST['func'])) {
        if($_POST['func'] === "retrieveDepartments"){
            retrieveDepartments();
        }elseif($_POST['func'] === "retrieveCourses"){
            retrieveCourses($_POST);
        } elseif($_POST['func'] === "retrieveOfferings"){
            retrieveOfferings($_POST);
        } elseif($_POST['func'] === "addToCart"){
            addToCart($_POST);
        }
    }

    function retrieveDepartments() {
        require '../../commons/config.php';
        include '../../models/RefDepartment.php';

        $refDepartments = [];
        $select_query=  "SELECT * from ref_department";

        if(!$departments = mysqli_query($con, $select_query)) {
            echo "Failed to retrieve departments";
        } else {
            while($dept = mysqli_fetch_assoc($departments)){
                $deptObj = new RefDepartment($dept['dept_id'], $dept['dept_name']);
                array_push($refDepartments, $deptObj);
            }
            echo json_encode($refDepartments);
        }
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

    function retrieveOfferings($postData) {
        require '../../commons/config.php';
        include '../../models/CourseOffering.php';

        $course_id = $postData['course_id'];

         $select_query = "SELECT CO.offering_id, CONCAT(I.fname, ' ', I.mname, ' ', I.lname) AS instructor_name, S.occurrence, S.start_time, S.end_time, a3.availability
                                FROM course_offerings CO
                                JOIN ref_instructors I
                                ON CO.instructor_id = I.instructor_id
                                JOIN ref_schedules S
                                ON CO.schedule_id = S.schedule_id
                                JOIN (SELECT a1.offering_id, (a2.capacity - a1.filled) as availability
                                      FROM ( SELECT CO.offering_id, count(CT.offering_id) AS filled
                                              FROM course_offerings CO
                                              LEFT JOIN courses_taken CT
                                              ON CO.offering_id = CT.offering_id
                                              AND CO.course_id = '$course_id'
                                              GROUP BY CO.offering_id) a1
                                          JOIN (SELECT r.capacity, CO.offering_id
                                              FROM ref_room r, course_offerings CO
                                              WHERE r.room_id = CO.room_id
                                              AND CO.course_id = '$course_id') a2
                                          ON a1.offering_id = a2.offering_id) a3
                                ON CO.offering_id = a3.offering_id
                                WHERE CO.course_id = '$course_id'";

        if(!$courseOfferings = mysqli_query($con, $select_query)) {
            echo "Failed to retrieve course offerings";
        } else {
            $offeringsArr = [];
            while($offering = mysqli_fetch_assoc($courseOfferings)){
                $offeringObj = new CourseOffering($offering['offering_id'], $offering['instructor_name'], 
                    $offering['occurrence'], $offering['start_time'], $offering['end_time'], $offering['availability']);
                array_push($offeringsArr, $offeringObj);
            }
            echo json_encode($offeringsArr);
        }
    }

    function addToCart($postData){
        require '../../commons/config.php';
        
        $id = $_SESSION['user_id'];
        $offering_id = $postData['offering_id'];

        $cartQuery = "SELECT * FROM courses_cart_entry WHERE student_id='$id' AND offering_id='$offering_id'";
        $cartResult = mysqli_query($con, $cartQuery);
        $cartCount = mysqli_num_rows($cartResult);

        $takenQuery = "SELECT * FROM courses_taken WHERE student_id='$id' AND offering_id='$offering_id'";
        $takenResult = mysqli_query($con, $takenQuery);
        $takenCount = mysqli_num_rows($takenResult);

        if($cartCount > 0){
            $_SESSION['addToCartStatus']  = 'duplicateCart';
        } elseif($takenCount > 0){
            $_SESSION['addToCartStatus']  = 'duplicateTaken';
        } else {
            try{
                $insert = "INSERT INTO courses_cart_entry (student_id, offering_id)
                    VALUES($id, $offering_id)";
                $con->query($insert);
                $_SESSION['addToCartStatus']  = 'success';
            } catch(Exception $e){
                $_SESSION['addToCartStatus']  = 'error';
            }
        }
    }

?>