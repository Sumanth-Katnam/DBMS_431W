<?php include '../commons/mainPage.php' ?>

<?php startblock('title') ?>
   My Courses
<?php endblock() ?>

<?php startblock('content') ?>
   <div class="container">
        <div class="row" id="infoRow">
            <div class="col-md-12">
                <div class="alert alert-primary alert-dismissible fade show" role="alert" id="alertBox">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong id="messageType">Note:</strong>
                    Please make sure not to drop mandatory courses listed in your course plan.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-striped table-bordered" id="coursesTakenTable">
                <thead>
                    <tr>
                        <th scope="col">Sno</th> 
                        <th scope="col">Course Name</th> 
                        <th scope="col">Instructor name</th> 
                        <th scope="col">Occurrence</th> 
                        <th scope="col">Schedule</th> 
                        <th scope="col">Room no</th> 
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    <script src="../static/js/app/student/myCourses.js"></script>
    <script>
        $('#mainNavBar #myCourses').addClass('active');
    </script>
<?php endblock() ?>