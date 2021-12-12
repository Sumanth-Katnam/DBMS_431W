<?php include '../commons/mainPage.php' ?>

<?php startblock('title') ?>
   Cart
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
                    <strong id="messageType">Info:</strong>
                    Please make sure all cart selections are good before you finish enrolling.
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <span id="enrollError" style="display:none; color:red;">Please make sure all cart selections are good before you finish enrolling.</span>
                <table class="table table-striped table-bordered" id="cartEntriesTable">
                    <thead>
                        <tr>
                            <th scope="col">Sno</th> 
                            <th scope="col">Course Name</th> 
                            <th scope="col">Instructor name</th> 
                            <th scope="col">Occurrence</th> 
                            <th scope="col">Schedule</th> 
                            <th scope="col">Room no</th> 
                            <th scope="col">Status</th> 
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-2" style="text-align: right;">
                <button class="btn btn-primary" id="finishEnrollBtn">Finish Enrollment</button>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <script src="../static/js/app/student/cart.js"></script>
    <?php 
        if(isset($_SESSION['dropCartStatus'])){
            echo "<script> displayMessage('dropCart', '".$_SESSION['dropCartStatus']."')</script>";
            unset($_SESSION['dropCartStatus']);
        } elseif(isset($_SESSION['enrollmentStatus'])){
            echo "<script> displayMessage('enrollment', '".$_SESSION['enrollmentStatus']."')</script>";
            unset($_SESSION['enrollmentStatus']);
        }
    ?>
    <script>
        $('#mainNavBar #cart').addClass('active');
    </script>
<?php endblock() ?>