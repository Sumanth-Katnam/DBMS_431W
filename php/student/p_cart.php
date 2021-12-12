<?php 
    if(isset($_POST['func'])) {
        if($_POST['func'] === "retrieveCartEntries") {
            retrieveCartEntries();
        } elseif($_POST['func'] === "dropCartCourse") {
            dropCartCourse($_POST);
        } elseif($_POST['func'] === "finishEnrollment") {
            finishEnrollment();
        }
    }
    

    function retrieveCartEntries() {
        require '../../commons/config.php';
        include '../../models/CourseCartEntry.php';

        $id = $_SESSION['user_id'];
        $select_query=  "SELECT BASE.cart_entry_id,BASE.course_name,BASE.instructor_name,BASE.schedule_time,BASE.room_name,
                           CASE
                             WHEN BASE.schedule_id IN(
                                     SELECT CO.schedule_id
                                     FROM courses_cart_entry CE, course_offerings CO
                                     WHERE CE.offering_id = CO.offering_id
                                     AND CE.student_id = '.$id.'
                                     GROUP BY CO.schedule_id
                                     HAVING count(*)>1) THEN 'CONFLICT'
                             WHEN BASE.availablity = 0 THEN 'FILLED'
                             ELSE BASE.availablity
                           END AS status
                             FROM (SELECT CE.cart_entry_id, C.course_name,
                                 CONCAT(I.fname, ' ', I.mname, ' ', I.lname) AS instructor_name,
                                 S.occurrence, CONCAT(S.start_time, ' - ', S.end_time) AS schedule_time, R.room_name, a3.availablity, S.schedule_id
                                   FROM courses_cart_entry CE
                                   JOIN course_offerings CO
                                   ON CE.offering_id = CO.offering_id
                                   JOIN ref_courses C
                                   ON CO.course_id = C.course_id
                                   JOIN ref_instructors I
                                   ON CO.instructor_id = I.instructor_id
                                   JOIN ref_schedules S
                                   ON CO.schedule_id = S.schedule_id
                                   JOIN ref_room R
                                   ON CO.room_id = R.room_id
                                   JOIN (SELECT a1.offering_id, (a2.capacity - a1.filled) as availablity
                                         FROM ( SELECT CT.offering_id,count(*) AS filled
                                               FROM course_offerings CO, courses_taken CT
                                               WHERE CO.offering_id = CT.offering_id
                                               GROUP BY CT.offering_id) a1
                                         JOIN (SELECT r.capacity, c.offering_id
                                               FROM ref_room r, course_offerings c
                                               WHERE r.room_id = c.room_id) a2
                                         ON a1.offering_id = a2.offering_id) a3
                                   ON CE.offering_id = a3.offering_id
                                   WHERE CE.student_id = $id) BASE;";

        if(!$cartEntries = mysqli_query($con, $select_query)) {
            echo "Failed to retrieve Cart Entries";
        } else {
            $entriesArr = [];
            while($entry = mysqli_fetch_assoc($cartEntries)){
                $cartObj = new CourseCartEntry($entry['cart_entry_id'], $entry['course_name'], 
                    $entry['instructor_name'], $entry['occurrence'], 
                    $entry['schedule_time'], $entry['room_name'], $entry['status']);
                array_push($entriesArr, $cartObj);
            }
            echo json_encode($entriesArr);
        }
    }

    function dropCartCourse($postData) {
        require '../../commons/config.php';

        $entry_id = $postData['entry_id'];
        $delete = "DELETE FROM courses_cart_entry WHERE cart_entry_id='$entry_id' ";
        $_SESSION['dropCartStatus'] = $con->query($delete);
        echo true;
    }


    function finishEnrollment() {
        require '../../commons/config.php';

        try{
            $id = $_SESSION['user_id'];
            
            $con->begin_transaction();

            $insertTakenQuery = "INSERT INTO courses_taken (student_id, offering_id)
                SELECT student_id, offering_id
                FROM courses_cart_entry
                WHERE student_id='$id'";
            if($con->query($insertTakenQuery)) {
                $deleteCartStatement = "DELETE FROM courses_cart_entry WHERE student_id='$id'";
                if($con->query($deleteCartStatement)) {
                    $_SESSION['enrollmentStatus']  = 'success';
                    $con->commit();
                }
            } else {
                $_SESSION['enrollmentStatus']  = 'error';
                $con->rollback();
            }
        } catch (Exception $ex) {
            $_SESSION['enrollmentStatus']  = 'error';
            $con->rollback();
        }
    }
?>