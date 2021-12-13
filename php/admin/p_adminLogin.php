<?php
require '../../commons/config.php';

if(!isset($_SESSION)) { 
  session_start(); 
}

if(isset($_POST['signin'])) {
  login();
}

function login() {
  global $con;

  $username = $_POST["user"];
  $password = $_POST["pwd"];

  $query = "SELECT * FROM ref_instructors WHERE email_id=? AND password=? LIMIT 1";
  $stmt = mysqli_stmt_init($con);

  if(!mysqli_stmt_prepare($stmt, $query)){
    $_SESSION['loginError'] = "Invalid Email Id or Password";
    header("location:../../login/admin_login.php");
  } else {
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $count = mysqli_num_rows($result);
    if ($count == 1) {
    $logged_in_user = mysqli_fetch_assoc($result);

    $_SESSION['emailId'] = $logged_in_user['email_id'];
    $_SESSION['user_id'] = $logged_in_user['instructor_id'];
    $_SESSION['fname']  = $logged_in_user['fname'];
    $_SESSION['mname']  = $logged_in_user['mname'];
    $_SESSION['lname']  = $logged_in_user['lname'];
    $_SESSION['is_admin']  = true;
    header("location:../../admin/adminHome.php");

  } else if ($count == 0) {
    $_SESSION['loginError'] = "Invalid Email Id or Password";
    header("location:../../login/admin_login.php");
  }
  }
}
?>
