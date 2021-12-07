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
                    <strong id="messageType">Info:</strong>
                    This report gives the count of students per department and course.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2>Total Students per course report:</h2>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th scope="col">Department ID</th>
                        <th scope="col">Department name</th>
                        <th scope="col">Course ID</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Instructor ID</th>
                        <th scope="col">Instructor name</th>
                        <th scope="col">Total enrollment</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td> 
                        <td>Computer Science</td> 
                        <td>13</td> 
                        <td>Database Management System</td> 
                        <td>13</td> 
                        <td>Thomas Wayne</td> 
                        <td>81</td> 
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Computer Engineering</td>
                        <td>2</td> 
                        <td>Operating System</td> 
                        <td>22</td> 
                        <td>Martha Wayne</td> 
                        <td>41</td> 
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Electrical Engineering</td>
                        <td>3</td> 
                        <td>Cloud computing</td> 
                        <td>26</td> 
                        <td>Leslie Thompkins</td>
                        <td>16</td>
                    </tr>
                    <tr>
                        <td>1</td> 
                        <td>Computer Science</td> 
                        <td>4</td> 
                        <td>Computer Security</td> 
                        <td>8</td> 
                        <td>Bob Kane</td> 
                        <td>16</td> 
                    </tr>
                    <tr>
                        <td>1</td> 
                        <td>Computer Science</td> 
                        <td>13</td>
                        <td>Algorithms and Data structures</td> 
                        <td>17</td> 
                        <td>Bill Finger</td> 
                        <td>86</td> 
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Computer Engineering</td>
                        <td>9</td>
                        <td>Computer Architecture</td> 
                        <td>17</td> 
                        <td>Michael Keaton</td> 
                        <td>86</td> 
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    
    <script>
        $('#mainNavBar #report1').addClass('active');
        $(document).ready(function(){
            $('table').dataTable();
        });
    </script>
<?php endblock() ?>