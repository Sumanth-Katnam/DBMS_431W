<?php

    $parentFolder ="/DBMS_431W/";
    $menuLinks = array(
        "home" => "student/home.php",
        "cart" => "student/cart.php",
        "myAccount" => "student/myAccount.php",
        "myCourses" => "student/myCourses.php",
        "selectCourses" => "student/selectCourses.php",
        "logout" => "logout.php",
        "adminHome" => "admin/adminHome.php",
        "report1" => "admin/studentsPerDept.php",
        "report2" => "admin/vacantSlots.php",
        "report3" => "admin/instructorAvailability.php",
        "report4" => "admin/cartEntriesPerCourse.php",
    );

    function getLink($linkName) {
        global $parentFolder, $menuLinks;
        echo $parentFolder.$menuLinks[$linkName];
    }
    
?>