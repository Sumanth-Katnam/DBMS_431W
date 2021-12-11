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