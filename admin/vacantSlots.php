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
                    This report gives all the slots that are available to book for a class.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2>Vacant Slots Report:</h2>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th scope="col">Room name</th>
                        <th scope="col">Slot Occurence</th>
                        <th scope="col">Slot Start time</th>
                        <th scope="col">slot End time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Room 11</td> 
                        <td>Mon, Wed, Fri</td> 
                        <td>9:05 AM</td> 
                        <td>9:55 AM</td> 
                    </tr>
                    <tr>
                        <td>Room 22</td> 
                        <td>Tue, Thu</td> 
                        <td>3:05 PM</td> 
                        <td>4:20 PM</td>
                    </tr>
                    <tr>
                        <td>Room 3</td> 
                        <td>Mon, Wed, Fri</td> 
                        <td>4:35 PM</td> 
                        <td>5:50 PM</td>
                    </tr>
                    <tr>
                        <td>Room 16</td>
                        <td>Mon, Wed, Fri</td> 
                        <td>4:35 PM</td> 
                        <td>5:50 PM</td>
                    </tr>
                    <tr>
                        <td>Room 17</td>
                        <td>Tue, Thu</td> 
                        <td>4:35 PM</td> 
                        <td>5:50 PM</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    
    <script>
        $('#mainNavBar #report2').addClass('active');
        $(document).ready(function(){
            $('table').dataTable();
        });
    </script>
<?php endblock() ?>