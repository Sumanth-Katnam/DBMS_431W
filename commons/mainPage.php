<?php session_start(); ?>
<?php require_once '../static/php/ti/ti.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../static/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="../static/css/jquery-ui.css" media="screen">
    <link rel="stylesheet" href="../static/css/app/application.css" media="screen">
    <link rel="stylesheet" href="../static/datatables/datatables.min.css" media="screen" />
    <link rel="stylesheet" href="../static/datatables/Buttons-2.0.1/css/buttons.dataTables.min.css" media="screen" />

    <script src="../static/js/jquery-3.6.0.min.js"></script>
    <script src="../static/js/jquery-ui.min.js"></script>
    <script src="../static/js/bootstrap.min.js"></script>
    <script src="../static/js/app/application.js"></script>
    <script src="../static/js/app/common.js"></script>
    <script src="../static/datatables/datatables.min.js"></script>
    <script src="../static/datatables/Buttons-2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="../static/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>


    <!-- Font Awesome icons (free version) -->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />


    <title>
        <?php startblock('title') ?>
        <?php endblock() ?> - Course Registration
    </title>
</head>

<body>
    <?php startblock('menu') ?>
        <?php
            if (!$_SESSION['is_admin']) {
              include '../commons/studentMenuBar.php';
            } else {
                include '../commons/adminMenuBar.php';
            }
        ?>
        
    <?php endblock() ?>
    <br>
    <?php startblock('content') ?>
    <?php endblock() ?>
</body>

</html>