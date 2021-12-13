<!-- Navigation-->
<?php include 'menuLinks.php'?>
<nav class="navbar navbar-dark bg-dark" id="mainNavBar">
    <div class="navbar-header" style="font-style:italic; font: size 25px;">
        <a class="navbar-brand" href=<?php getLink("home")?>>
            <b>Course Registration Portal</b> 
        </a>
    </div>
    <a class="navbar-brand" href=<?php getLink("home")?> id="home">
        Home
    </a>
    <a class="navbar-brand" href=<?php getLink("myCourses")?> id="myCourses">
        My Courses
    </a>
    <a class="navbar-brand" href=<?php getLink("selectCourses")?> id="selectCourses">
        Courses Selection
    </a>
    <a class="navbar-brand" href=<?php getLink("cart")?> id="cart">
        Cart
    </a>
    <a class="navbar-brand" href=<?php getLink("myAccount")?> id="myAccount">
        My account
    </a>
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