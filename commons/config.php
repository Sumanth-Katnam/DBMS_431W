<?php
  if(!isset($_SESSION)) { 
    session_start(); 
  } 

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $db = "mmb7103_431W_project";
  $servername = "localhost";
  $mysql_username = "mmb7103";
  $mysql_password = "CMPSC431W";

  try {
    $con = mysqli_connect($servername, $mysql_username, $mysql_password);
    mysqli_select_db($con, $db);
  } catch (mysqli_sql_exception $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
  }
  
?>