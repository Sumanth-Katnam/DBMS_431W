<?php
require '../commons/config.php';

session_start();

if(isset($_POST['signin'])) {
  login();
}

function login() {
  global $con;

  $email_id = $_POST["emailId"];
  $password = $_POST["password"];

  $query = "SELECT * FROM ref_students WHERE email_id='$email_id' AND password='$password' LIMIT 1";
  $result = mysqli_query($con, $query);
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
    header("location:../student/home.php");

  } else if ($count == 0) {
    echo "Invalid Email Id or Password";
    header("refresh:3; url=http://localhost:8012/DBMS_431W/login/login.html");
  }
}
?>
