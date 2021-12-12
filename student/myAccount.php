<?php include '../commons/mainPage.php' ?>

<?php startblock('title') ?>
   My Account
<?php endblock() ?>

<?php startblock('content') ?>
   <div class="container">
        <div class="row" id="messageRow" style="display: none;">
            <div class="col-md-12">
                <div class="alert fade show" role="alert" id="alertBox">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong id="message"></strong>
                </div>
            </div>
        </div>
        <br>
    
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
    </div>

        <?php 
            require '../php/student/p_myAccount.php';
            global $refStudent;
        ?>

        <form action="../php/student/p_myAccount.php" method="POST">
            <div class="row">
                <div class="col-md-3">
                    <label for="emailId">Email ID:</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" 
                        name="emailId" id="emailId" 
                        value="<?php echo htmlspecialchars($refStudent->email_id) ?>" disabled>
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="fname">First Name:</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="fname" id="fname" minlength="2"
                        value="<?php echo htmlspecialchars($refStudent->fname) ?>">
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="mname">Middle Name:</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="mname" id="mname" minlength="2"
                        value="<?php echo htmlspecialchars($refStudent->mname) ?>">
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="lname">Last Name:</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="lname" id="lname" minlength="2"
                        value="<?php echo htmlspecialchars($refStudent->lname) ?>">
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 row">
                    <div class="col-md-5 row">
                        <div class="col-md-4">
                            <label for="country">Country code:</label>
                        </div>
                        <div class="col-md-5">
                            <select name="countryCodeDrpdwn" id="countryCodeDrpdwn" class="form-control" required>
                                <option value="">-- Select a country code --</option>
                                <option value="United States (+1)">United States (+1)</option>
                                <option value="Nigeria (+234)">Nigeria (+234)</option>
                                <option value="India (+91)">India (+91)</option>
                                <option value="Philippines (+63)">Philippines (+63)</option>
                                <option value="Malaysia (+60)">Malaysia (+60)</option>
                                <option value="Spain (+34)">Spain (+34)</option>
                            </select>
                            <script>
                                $('#countryCodeDrpdwn').val("<?php echo $refStudent->country_code?>");
                            </script>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    
                    <div class="col-md-7 row">
                        <div class="col-md-3">
                            <label for="phoneNumber">Phone Number:</label>
                        </div>
                        <div class="col-md-8">
                            <!-- <input type="hidden" name="hdnPhoneNo" value="<?php echo htmlspecialchars($refStudent->phone_number) ?>"> -->
                            <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" minlength="10"
                                maxlength="10"
                                value="<?php echo htmlspecialchars($refStudent->phone_number) ?>">
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <button class="btn btn-primary" type="submit" name="submit">Update</button>
                </div>
            </div>
        </form>
    </div>

    <script src="../static/js/app/student/myAccount.js"></script>
    <?php 
        if(isset($_SESSION['myAccountUpdate'])){
            echo "<script> displayMessage(".$_SESSION['myAccountUpdate'].")</script>";
            unset($_SESSION['myAccountUpdate']);
        }
    ?>

    <script>
        $('#mainNavBar #myAccount').addClass('active');
    </script>
<?php endblock() ?>