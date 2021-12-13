<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="../static/js/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="../static/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="../static/css/app/application.css" media="screen">
    <link rel="stylesheet" href="../static/css/app/login.css" media="screen">
    <script src="../static/js/bootstrap.min.js"></script>

    <title>Login</title>
</head>

<body>
    <div class="container">
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center; padding-top: 15px;">
            Course Registration Portal
        </h1>
        <br>
        <form action="../php/student/p_login.php" method="post">
            <div class="form-group">
                <label>Email ID</label>
                <input type="email" name="emailId" class="form-control" placeholder="Email ID" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group" style="display: none;" id="errorDiv">
                <span id="enrollError" style="color:red;"> <?php echo $_SESSION["loginError"] ?></span>
            </div>
            <?php 
                if(isset($_SESSION['loginError'])){
                    echo "<script> $('#errorDiv').toggle(true);</script>";
                    unset($_SESSION['loginError']);
                }
            ?>
            <div id="signInBtnDiv">
                <button type="submit" name="signin" class="btn btn-dark">Sign in</button><br /><br />
            </div>
            <div class="form-group">
                <div class="col-md-12 control">
                    <div id="otherPageLink">
                        <a href="admin_login.php">
                            Admin Login
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>