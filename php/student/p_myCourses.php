<?php 
    if(isset($_POST['func'])) {
        if($_POST['func'] === "retrieveMyCourses"){
            retrieveMyCourses();
        } elseif($_POST['func'] === "dropCourse"){
            dropCourse($_POST);
        }
    }

    function retrieveMyCourses() {
        require '../../commons/config.php';
        include '../../models/CourseTaken.php';

        $id = $_SESSION['user_id'];
        $select_query=  "SELECT CT.taken_id, C.course_name, 
            CONCAT(I.fname, ' ', I.mname, ' ', I.lname) AS instructor_name, 
            S.occurrence, CONCAT(S.start_time, ' - ', S.end_time) AS schedule_time, R.room_name
                FROM courses_taken CT 
                JOIN course_offerings CO 
                ON CT.offering_id = CO.offering_id
                JOIN ref_courses C
                ON CO.course_id = C.course_id
                JOIN ref_instructors I
                ON CO.instructor_id = I.instructor_id
                JOIN ref_schedules S
                ON CO.schedule_id = S.schedule_id
                JOIN ref_room R
                ON CO.room_id = R.room_id
                WHERE CT.student_id = '$id';";

        if(!$myCourses = mysqli_query($con, $select_query)) {
            echo "Failed to retrieve My Courses";
        } else {
            $coursesArr = [];
            while($course = mysqli_fetch_assoc($myCourses)){
                $courseObj = new CourseTaken($course['taken_id'], $course['course_name'], 
                    $course['instructor_name'], $course['occurrence'], 
                    $course['schedule_time'], $course['room_name']);
                array_push($coursesArr, $courseObj);
            }
            echo json_encode($coursesArr);
        }
    }

    function dropCourse($postData) {
        require '../../commons/config.php';

        $taken_id = $postData['taken_id'];
        $delete = "DELETE FROM courses_taken WHERE taken_id='$taken_id' ";
        echo $con->query($delete);
    }
?>