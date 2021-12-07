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
                    This report gives all the slots that an Instructor is not scheduled.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2>Instructors Availability Report:</h2>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th scope="col">Instructor ID</th>
                        <th scope="col">Instructor name</th>
                        <th scope="col">Occurence</th>
                        <th scope="col">Start time</th>
                        <th scope="col">End time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>13</td> 
                        <td>Thomas Wayne</td> 
                        <td>Mon, Wed, Fri</td> 
                        <td>9:05 AM</td> 
                        <td>9:55 AM</td> 
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>Martha Wayne</td> 
                        <td>Tue, Thu</td> 
                        <td>3:05 PM</td> 
                        <td>4:20 PM</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Leslie Thompkins</td> 
                        <td>Mon, Wed, Fri</td> 
                        <td>4:35 PM</td> 
                        <td>5:50 PM</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>Bob Kane</td> 
                        <td>Mon, Wed, Fri</td> 
                        <td>4:35 PM</td> 
                        <td>5:50 PM</td>
                    </tr>
                    <tr>
                        <td>7</td> 
                        <td>Bill Finger</td> 
                        <td>Tue, Thu</td> 
                        <td>4:35 PM</td> 
                        <td>5:50 PM</td>
                    </tr>
                    <tr>
                        <td>13</td> 
                        <td>Thomas Wayne</td> 
                        <td>Tue, Thu</td> 
                        <td>3:05 PM</td> 
                        <td>4:20 PM</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    
    <script>
        $('#mainNavBar #report3').addClass('active');
        $(document).ready(function(){
            $('table').dataTable();
        });
    </script>
<?php endblock() ?>