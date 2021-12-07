<?php
// require '../commons/config.php';

session_start();
if(isset($_POST['signin'])) {
  login();
}

function login() {
  global $con;

  $username = $_POST["user"];
  $password = $_POST["pwd"];

//   $query = "SELECT * FROM user_registration WHERE username='$username' AND password='$password' LIMIT 1";
//   $result = mysqli_query($con, $query);
//   $count = mysqli_num_rows($result);
    $count = 1;

  if ($count == 1) {
    // $logged_in_user = mysqli_fetch_assoc($result);

    // $_SESSION['user'] = $logged_in_user;
    $_SESSION['success']  = "You are now logged in";
    $_SESSION['fname']  = "Bruce";
    $_SESSION['lname']  = "Wayne";
    $_SESSION['is_admin']  = "Yes";
    header("location:../admin/adminHome.php");

  } else if ($count == 0) {
    echo "Invalid username or password";
    header("refresh:3; url=http://localhost/DBMS_431W/login/admin_login.html");
  }
}
?>
