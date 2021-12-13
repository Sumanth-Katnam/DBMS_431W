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

  $email_id = $_POST["emailId"];
  $password = $_POST["password"];

  $query = "SELECT * FROM ref_students WHERE email_id=? AND password=? LIMIT 1";
  $stmt = mysqli_stmt_init($con);

  if(!mysqli_stmt_prepare($stmt, $query)){
    $_SESSION['loginError'] = "Some error occurred. Please try again later.";
    header("location:../../login/login.php");
  } else {
    mysqli_stmt_bind_param($stmt, 'ss', $email_id, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
      $logged_in_user = mysqli_fetch_assoc($result);

      $_SESSION['emailId'] = $logged_in_user['email_id'];
      $_SESSION['user_id'] = $logged_in_user['student_id'];
      $_SESSION['fname']  = $logged_in_user['fname'];
      $_SESSION['mname']  = $logged_in_user['mname'];
      $_SESSION['lname']  = $logged_in_user['lname'];
      $_SESSION['last_logged_in'] = $logged_in_user['last_logged_in'];
      $_SESSION['is_admin']  = false;
      header("location:../../student/home.php");

    } else if ($count == 0) {
      $_SESSION['loginError'] = "Invalid Email Id or Password";
      header("location:../../login/login.php");
    }
  }
}
?>
