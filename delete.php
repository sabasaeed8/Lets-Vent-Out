<?php
session_start();
require_once('connection.php');
include  'header.php';
// check user login
if(!isset($_SESSION['user_loggedin'])){
  header("location:login_signup.php");
}

if(isset($_GET['q_id'])){
  $id = $_GET['q_id'];
  $sql = "delete from questions where id='$id'";
  mysqli_query($conn , $sql);
  header("location:index.php");
  die();
}
?>
