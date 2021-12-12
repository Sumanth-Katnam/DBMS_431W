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
        $select_query = "SELECT CO.offering_id, CONCAT(I.fname, ' ', I.mname, ' ', I.lname) AS instructor_name, S.occurrence, S.start_time, S.end_time
                FROM course_offerings CO 
                JOIN ref_instructors I 
                ON CO.instructor_id = I.instructor_id 
                JOIN ref_schedules S 
                ON CO.schedule_id = S.schedule_id
                WHERE CO.course_id = '$course_id'";

         $select_query = "SELECT CO.offering_id, CONCAT(I.fname, ' ', I.mname, ' ', I.lname) AS instructor_name, S.occurrence, S.start_time, S.end_time, (a2.capacity-a1.filled) as availability
                        FROM ( SELECT count(*) AS filled
                                FROM course_offerings CO, courses_taken CT
                                WHERE CO.offering_id = CT.offering_id
                                AND course_id = '$course_id') a1,
                        (SELECT r.capacity
                            FROM ref_room r, course_offerings c
                            WHERE r.room_id = c.room_id
                            and c.course_id = '$course_id') a2,
                        course_offerings CO
                        JOIN ref_instructors I
                        ON CO.instructor_id = I.instructor_id
                        JOIN ref_schedules S
                        ON CO.schedule_id = S.schedule_id
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

        $query = "SELECT * FROM courses_cart_entry WHERE student_id='$id' AND offering_id='$offering_id'";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);

        if($count > 0){
            $_SESSION['addToCartStatus']  = 'duplicate';
        } else {
            $insert = "INSERT INTO courses_cart_entry (student_id, offering_id)
                VALUES($id, $offering_id)";
            $con->query($insert);
            $_SESSION['addToCartStatus']  = 'success';
        }
    }

?>