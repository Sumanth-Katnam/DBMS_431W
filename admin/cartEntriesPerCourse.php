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
                    This report gives the count of current cart entries for each course. 
                    This helps the admin to take decision on adding new sections.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2>Course current cart entries report:</h2>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th scope="col">Course ID</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Instructor ID</th>
                        <th scope="col">Instructor name</th>
                        <th scope="col">Occurrence</th>
                        <th scope="col">Start time</th>
                        <th scope="col">End time</th>
                        <th scope="col">Current cart entries count</th>
                        <th scope="col">availability</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td> 
                        <td>Database Management System</td> 
                        <td>13</td> 
                        <td>Thomas Wayne</td> 
                        <td>Mon, Wed, Fri</td> 
                        <td>9:05 AM</td> 
                        <td>9:55 AM</td> 
                        <td>81</td> 
                        <td>21 seats left</td>
                    </tr>
                    <tr>
                        <td>2</td> 
                        <td>Operating System</td> 
                        <td>22</td> 
                        <td>Martha Wayne</td> 
                        <td>Tue, Thu</td> 
                        <td>3:05 PM</td> 
                        <td>4:20 PM</td> 
                        <td>41</td> 
                        <td>53 seats left</td>
                    </tr>
                    <tr>
                        <td>3</td> 
                        <td>Cloud computing</td> 
                        <td>26</td> 
                        <td>Leslie Thompkins</td> 
                        <td>Mon, Wed, Fri</td> 
                        <td>4:35 PM</td> 
                        <td>5:50 PM</td> 
                        <td>16</td> 
                        <td>Class full</td> 
                    </tr>
                    <tr>
                        <td>4</td> 
                        <td>Computer Security</td> 
                        <td>8</td> 
                        <td>Bob Kane</td> 
                        <td>Mon, Wed, Fri</td> 
                        <td>4:35 PM</td> 
                        <td>5:50 PM</td> 
                        <td>16</td> 
                        <td>14 seats left</td> 
                    </tr>
                    <tr>
                        <td>5</td> 
                        <td>Algorithms and Data structures</td> 
                        <td>17</td> 
                        <td>Bill Finger</td> 
                        <td>Tue, Thu</td> 
                        <td>4:35 PM</td> 
                        <td>5:50 PM</td> 
                        <td>86</td> 
                        <td>Class full</td> 
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    
    <script>
        $('#mainNavBar #report4').addClass('active');
        $(document).ready(function(){
            $('table').dataTable();
        });
    </script>
<?php endblock() ?>