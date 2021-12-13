<!-- Navigation-->
<?php include 'menuLinks.php'?>
<nav class="navbar navbar-dark bg-dark" id="mainNavBar">
    <div class="navbar-header" style="font-style:italic; font: size 25px;">
        <a class="navbar-brand" href=<?php getLink("adminHome")?>>
            <b>Course Registration Portal</b> 
        </a>
    </div>
    <a class="navbar-brand" href=<?php getLink("adminHome")?> id="home">
        Home
    </a>
    <a class="navbar-brand" href=<?php getLink("report1")?> id="report1">
        Students Per Dept and Course
    </a>
    <a class="navbar-brand" href=<?php getLink("report2")?> id="report2">
        Vacant Slots
    </a>
    <a class="navbar-brand" href=<?php getLink("report3")?> id="report3">
        Instructor Availability
    </a>
    <a class="navbar-brand" href=<?php getLink("report4")?> id="report4">
        Courses Currently in Cart
    </a>
    <a class="navbar-brand" href="#"></a>
    <a class="navbar-brand" href="#"></a>
    <a class="navbar-brand" href="#"></a>
    <a class="navbar-brand" href="#"></a>
    <a class="navbar-brand" href="#"></a>
    <a class="navbar-brand" href="#"></a>
    <a class="navbar-brand" href="#"></a>
    <a class="navbar-brand" href="#">
        <?php echo $_SESSION["fname"].' '.$_SESSION["mname"].' '.$_SESSION["lname"] ?>
    </a>
    <a class="navbar-brand py-3 px-0 px-lg-3 rounded" href=<?php getLink("logout")?>>
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</nav>
<!-- end of Navigation -->