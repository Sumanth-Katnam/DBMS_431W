<?php include '../commons/mainPage.php' ?>

<?php startblock('title') ?>
   Home
<?php endblock() ?>

<?php startblock('content') ?>
   <div class="container">
      <h2>
         Welcome, <?php echo $_SESSION["fname"].' '.$_SESSION["mname"].' '.$_SESSION["lname"] ?>
      </h2>
      <br>
      <b>Go through the links on the menu bar for different reports.</b>
      <br>
      
   </div>

   <script>
      $('#mainNavBar #home').addClass('active');
   </script>
<?php endblock() ?>