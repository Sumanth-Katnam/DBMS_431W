<?php include '../commons/mainPage.php' ?>

<?php startblock('title') ?>
   Cart
<?php endblock() ?>

<?php startblock('content') ?>
   <div class="container">
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
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Sno</th> 
                            <th scope="col">Course Name</th> 
                            <th scope="col">Instructor name</th> 
                            <th scope="col">Occurence</th> 
                            <th scope="col">Schedule</th> 
                            <th scope="col">Room no</th> 
                            <th scope="col">Status</th> 
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
                            <td>Good</td> 
                            <td><button class="btn btn-warning"><i class="fas fa-trash"></i> Remove</button></td>
                        </tr>
                        <tr>
                            <td>2</td> 
                            <td>Operating System</td> 
                            <td>Martha Wayne</td> 
                            <td>Tue, Thu</td> 
                            <td>3:05 PM - 4:20 PM</td> 
                            <td>Room 41</td> 
                            <td>Conflicting</td>
                            <td><button class="btn btn-warning"><i class="fas fa-trash"></i> Remove</button></td>
                        </tr>
                        <tr>
                            <td>3</td> 
                            <td>Cloud computing</td> 
                            <td>Leslie Thompkins</td> 
                            <td>Mon, Wed, Fri</td> 
                            <td>3:05 PM - 4:20 PM</td> 
                            <td>Room 16</td> 
                            <td>Conflicting</td>
                            <td><button class="btn btn-warning"><i class="fas fa-trash"></i> Remove</button></td>
                        </tr>
                        <tr>
                            <td>4</td> 
                            <td>Computer Security</td> 
                            <td>Bob Kane</td> 
                            <td>Mon, Wed, Fri</td> 
                            <td>3:05 PM - 4:20 PM</td> 
                            <td>Room 16</td> 
                            <td>Class Full</td>
                            <td><button class="btn btn-warning"><i class="fas fa-trash"></i> Remove</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-2" style="text-align: right;">
                <button class="btn btn-primary">Finish Enrollment</button>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <script>
        $('#mainNavBar #cart').addClass('active');
    </script>
<?php endblock() ?>