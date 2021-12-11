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
      <ul>
         <li>To view enrolled courses, go to My Courses tab.</li>
         <li>To Register for a course, go to Courses Selection tab.</li>
         <li>To view courses in your cart, go to My Cart tab.</li>
         <li>To update your information, go to My Account tab.</li>
      </ul>
      <br>

      <div style="float: right;">
         <b>You were last logged-in on <?php echo $_SESSION["last_logged_in"] ?>.</b>
      </div>
      
   </div>

   <script>
      $('#mainNavBar #home').addClass('active');
   </script>
<?php endblock() ?>