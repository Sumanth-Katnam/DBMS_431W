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
                        <th scope="col">Slot Occurrence</th>
                        <th scope="col">Slot Start time</th>
                        <th scope="col">slot End time</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    
    <script>
        $('#mainNavBar #report2').addClass('active');
        $(document).ready(function(){
            var dataTable = $('#table').dataTable({
                "processing" : true,
                "serverSide" : true,
                "order" : [],
                "ajax" : {
                    url : "../php/admin/p_vacantSlots.php",
                    type : "POST"
                    }
                }
            );
        });
    </script>
<?php endblock() ?>