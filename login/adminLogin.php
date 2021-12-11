<?php
require '../commons/config.php';

session_start();

if(isset($_POST['signin'])) {
  login();
}

function login() {
  global $con;

  $username = $_POST["user"];
  $password = $_POST["pwd"];

  $query = "SELECT * FROM ref_instructors WHERE email_id='$username' AND password='$password' LIMIT 1";
  $result = mysqli_query($con, $query);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    $logged_in_user = mysqli_fetch_assoc($result);

    $_SESSION['emailId'] = $logged_in_user['email_id'];
    $_SESSION['user_id'] = $logged_in_user['instructor_id'];
    $_SESSION['fname']  = $logged_in_user['fname'];
    $_SESSION['mname']  = $logged_in_user['mname'];
    $_SESSION['lname']  = $logged_in_user['lname'];
    $_SESSION['is_admin']  = true;
    header("location:../admin/adminHome.php");

  } else if ($count == 0) {
    echo "Invalid username or password";
    header("refresh:3; url=http://localhost/DBMS_431W/login/admin_login.html");
  }
}
?>
