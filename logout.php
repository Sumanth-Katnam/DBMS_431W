<?php
    session_start();

    if(!$_SESSION["is_admin"]){
        require './commons/config.php';
        global $con;

        $date_time = new DateTime('now');
        $date_time->setTimezone(new DateTimeZone('EST'));
        $dt_str = $date_time->format('dS M, Y h:i a');
        $id = $_SESSION['user_id'];

        $sql1 = "UPDATE ref_students SET last_logged_in='$dt_str'
            WHERE student_id='$id' ";
        mysqli_query($con, $sql1);
    }

    session_destroy();
    header("location:login/login.html")
?>