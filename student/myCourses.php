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
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sno</th> 
                        <th scope="col">Course Name</th> 
                        <th scope="col">Instructor name</th> 
                        <th scope="col">Occurence</th> 
                        <th scope="col">Schedule</th> 
                        <th scope="col">Room no</th> 
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td> 
                        <td>Database Management System</td> 
                        <td>Thomas Wayne</td> 
                        <td>Mon, Wed, Fri</td> 
                        <td>9:05 AM - 9:55 AM</td> 
                        <td>Room 32</td> 
                        <td><button class="btn btn-warning dropClassBtn">Drop class</button></td>
                    </tr>
                    <tr>
                        <td>2</td> 
                        <td>Operating System</td> 
                        <td>Martha Wayne</td> 
                        <td>Tue, Thu</td> 
                        <td>3:05 PM - 4:20 PM</td> 
                        <td>Room 41</td> 
                        <td><button class="btn btn-warning dropClassBtn">Drop class</button></td>
                    </tr>
                    <tr>
                        <td>3</td> 
                        <td>Cloud computing</td> 
                        <td>Leslie Thompkins</td> 
                        <td>Mon, Wed, Fri</td> 
                        <td>4:35 PM - 5:50 PM</td> 
                        <td>Room 16</td> 
                        <td><button class="btn btn-warning dropClassBtn">Drop class</button></td>
                    </tr>
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