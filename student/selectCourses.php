<?php include '../commons/mainPage.php' ?>

<?php startblock('title') ?>
   Select Courses
<?php endblock() ?>

<?php startblock('content') ?>
    <div class="container">
        <div class="row" id="messageRow" style="display: none;">
            <div class="col-md-12">
                <div class="alert fade show" role="alert" id="alertBox">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong id="message"></strong>
                </div>
            </div>
        </div>
        <br>

        <div class="row" id="infoRow">
            <div class="col-md-12">
                <div class="alert alert-primary alert-dismissible fade show" role="alert" id="alertBox">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong id="messageType">Note:</strong>
                    You can even add classes that are full to your cart.
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <?php 
        require '../php/student/p_selectCourses.php';
    ?>
    <div class="row" id="streamDrpdwnDiv">
        <div class="col-md-3">
            <label for="stream">Stream:</label>
        </div>
        <div class="col-md-7">
            <select name="streamDrpdwn" id="streamDrpdwn" class="form-control" required></select>
        </div>
        <div class="col-md-2"></div>
    </div>
    <br>
    <div class="row" id="courseDrpdwnDiv" style="display: none;">
        <div class="col-md-3">
            <label for="courseName">Course Name:</label>
        </div>
        <div class="col-md-7">
            <select name="courseNameDrpdwn" id="courseNameDrpdwn" class="form-control" required></select>
        </div>
        <div class="col-md-2"></div>
    </div>
    <br><br>
    <div id="offeringsDiv" style="display: none;">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8"><h3>Course Offerings:</h3></div>
            <div class="col-md-2"></div>
        </div>
        
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
                <span id="radioError" style="display:none; color:red;">Please select atleast one offering.</span>
                <table class="table table-striped table-bordered" id="coursesOfferingTable">
                    <thead>
                        <tr>
                            <th scope="col">Select</th> 
                            <th scope="col">Instructor</th> 
                            <th scope="col">Occurence</th> 
                            <th scope="col">Start Time</th> 
                            <th scope="col">End Time</th> 
                            <th scope="col">Availability</th> 
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-1" style="text-align: center;">
                <button class="btn btn-primary" type="submit" id="addToCartBtn">Add to cart</button>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <script src="../static/js/app/student/selectCourses.js"></script>
    <?php 
        if(isset($_SESSION['addToCartStatus'])){
            echo "<script> displayMessage('".$_SESSION['addToCartStatus']."')</script>";
            unset($_SESSION['addToCartStatus']);
        }
    ?>
    <script>
        $('#mainNavBar #selectCourses').addClass('active');
    </script>
<?php endblock() ?>