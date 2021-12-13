<?php 
    $refStudent;
    
    if(isset($_POST['submit'])){
        submitForm($_POST);
    } else {
        retrieveUser();
    }

    function submitForm($postData){
        require '../../commons/config.php';
        include '../../models/RefStudent.php';
        $id = $_SESSION['user_id'];
        $refStudent = new RefStudent(
            mysqli_real_escape_string($con, $postData['student_id']), 
            mysqli_real_escape_string($con, $postData['fname']), 
            mysqli_real_escape_string($con, $postData['mname']), 
            mysqli_real_escape_string($con, $postData['lname']), 
            mysqli_real_escape_string($con, $postData['email_id']), 
            mysqli_real_escape_string($con, $postData['last_logged_in']), 
            mysqli_real_escape_string($con, $postData['countryCodeDrpdwn']), 
            mysqli_real_escape_string($con, $postData['phoneNumber']));
        
        $update = "UPDATE ref_students 
            SET fname=?,
            mname=?,
            lname=?,
            country_code=?,
            phone_number=?
            WHERE student_id=? ";

        $stmt = mysqli_stmt_init($con);

        if(!mysqli_stmt_prepare($stmt, $update)){
            $_SESSION['myAccountUpdate'] = 0;
            header("location: ../../student/myAccount.php");
        } else {
            mysqli_stmt_bind_param($stmt, 
                'ssssii', 
                $refStudent->fname, $refStudent->mname, 
                $refStudent->lname, $refStudent->country_code, 
                $refStudent->phone_number, $id);

            mysqli_stmt_execute($stmt);
            $_SESSION['myAccountUpdate']  = $con->affected_rows === 1;
        
            // Updating session variables for display
            $_SESSION['fname']  = $refStudent->fname;
            $_SESSION['mname']  = $refStudent->mname;
            $_SESSION['lname']  = $refStudent->lname;
            header("location: ../../student/myAccount.php");
        }
    }

    function retrieveUser(){
        require '../commons/config.php';
        include '../models/RefStudent.php';

        global $refStudent;
        $id = $_SESSION['user_id'];
        $select_query=  "SELECT * from ref_students WHERE student_id = '$id' LIMIT 1";

        if(!$user = mysqli_query($con, $select_query)) {
            echo "Failed to retrieve user";
        } else {
            $fetch = mysqli_fetch_assoc($user);
            $refStudent = new RefStudent($fetch['student_id'], $fetch['fname'], 
                $fetch['mname'], $fetch['lname'], 
                $fetch['email_id'], $fetch['last_logged_in'], 
                $fetch['country_code'], $fetch['phone_number']);
        }
    }

?>