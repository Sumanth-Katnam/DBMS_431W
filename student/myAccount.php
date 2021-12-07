<?php include '../commons/mainPage.php' ?>

<?php startblock('title') ?>
   My Account
<?php endblock() ?>

<?php startblock('content') ?>
   <div class="container">
        <div class="row" id="infoRow">
            <div class="col-md-12">
                <div class="alert alert-primary alert-dismissible fade show" role="alert" id="alertBox">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong id="messageType">Info:</strong>
                    To change your password, please visit student portal.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="emailId">Email ID:</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="emailId" id="emailId" value="bruce@wayne.com" disabled>
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="fname">First Name:</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="fname" id="fname" value="Bruce">
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="mname">Middle Name:</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="mname" id="mname" value="Thomas">
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="lname">Last Name:</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="lname" id="lname" value="Wayne">
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <button class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>

    <script>
        $('#mainNavBar #myAccount').addClass('active');
    </script>
<?php endblock() ?>