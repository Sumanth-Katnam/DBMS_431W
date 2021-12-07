<?php include '../commons/mainPage.php' ?>

<?php startblock('title') ?>
   Select Courses
<?php endblock() ?>

<?php startblock('content') ?>
    <div class="container">
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
   
    <div class="row">
        <div class="col-md-3">
            <label for="stream">Stream:</label>
        </div>
        <div class="col-md-7">
            <select name="streamDrpdwn" id="streamDrpdwn" class="form-control">
                <option value="-1">-- Please select a Stream --</option>
                <option value="1">Computer Science</option>
                <option value="2">Computer Engineering</option>
                <option value="3">Electrical Engineering</option>
                <option value="4">Agriculture Engineering</option>
            </select>
        </div>
        <div class="col-md-2"></div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <label for="courseName">Course Name:</label>
        </div>
        <div class="col-md-7">
            <select name="courseNameDrpdwn" id="courseNameDrpdwn" class="form-control">
                <option value="-1">-- Please select a Course --</option>
                <option value="1">Database Management System</option>
                <option value="2">Operating System</option>
                <option value="3">Comp security</option>
                <option value="4">Cloud computing</option>
            </select>
        </div>
        <div class="col-md-2"></div>
    </div>
    <br><br>
    <div id="offeringsDiv">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8"><h3>Course Offerings:</h3></div>
            <div class="col-md-2"></div>
        </div>
        
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
                <table class="table table-striped table-bordered">
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
                        <tr>
                            <td>
                                <input type="radio" name="offeringRadio" id="offering_1" value="1">
                            </td> 
                            <td>Thomas Wayne</td> 
                            <td>Mon, Wed, Fri</td> 
                            <td>9:05 AM</td> 
                            <td>9:55 AM</td> 
                            <td>5 seats left</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="radio" name="offeringRadio" id="offering_2" value="2">
                            </td> 
                            <td>Marth Wayne</td> 
                            <td>Tue, Thu</td> 
                            <td>3:05 PM</td> 
                            <td>4:20 PM</td> 
                            <td>18 seats left</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="radio" name="offeringRadio" id="offering_3" value="3">
                            </td> 
                            <td>Leslie Thompkins</td> 
                            <td>Tue, Thu</td> 
                            <td>4:35 PM</td> 
                            <td>5:50 PM</td> 
                            <td>None</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-1" style="text-align: center;">
                <button class="btn btn-primary">Add to cart</button>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <script>
        $('#mainNavBar #selectCourses').addClass('active');
    </script>
<?php endblock() ?>