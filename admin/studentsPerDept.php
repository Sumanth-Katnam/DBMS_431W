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
                <tbody></tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    
    <script type="text/javascript" language="javascript" >
        $('#mainNavBar #report1').addClass('active');
        $(document).ready(function(){
            var dataTable = $('#table').DataTable({
            "processing" : true,
            "serverSide" : true,
            "order" : [],
            "ajax" : {
                url : "../php/admin/p_studentsPerDept.php",
                type : "POST"
                }
            });
        });
    </script>
<?php endblock() ?>