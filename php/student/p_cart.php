<?php 
    if(isset($_POST['func'])) {
        if($_POST['func'] === "retrieveCartEntries"){
            retrieveCartEntries();
        }elseif($_POST['func'] === "retrieveCourses"){
            retrieveCourses($_POST);
        } elseif($_POST['func'] === "retrieveOfferings"){
            retrieveOfferings($_POST);
        } elseif($_POST['func'] === "addToCart"){
            addToCart($_POST);
        }
    }

    function retrieveCartEntries() {
        require '../../commons/config.php';
        include '../../models/CourseCartEntry.php';

        $id = $_SESSION['user_id'];
        $select_query=  "SELECT CE.cart_entry_id, C.course_name, 
            CONCAT(I.fname, ' ', I.mname, ' ', I.lname) AS instructor_name, 
            S.occurrence, CONCAT(S.start_time, ' - ', S.end_time) AS schedule_time, R.room_name
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
                WHERE CE.student_id = '$id';";

        if(!$cartEntries = mysqli_query($con, $select_query)) {
            echo "Failed to retrieve cartEntries";
        } else {
            $entriesArr = [];
            while($entry = mysqli_fetch_assoc($cartEntries)){
                $cartObj = new CourseCartEntry($entry['cart_entry_id'], $entry['course_name'], 
                    $entry['instructor_name'], $entry['occurrence'], 
                    $entry['schedule_time'], $entry['room_name'], '');
                array_push($entriesArr, $cartObj);
            }
            echo json_encode($entriesArr);
        }
    }
?>