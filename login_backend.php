<?php
session_start();
require_once('connection.php');
// if (isset($_POST['"login-submit"']))
// {
    $email=$_POST['login-email'];
    $password=$_POST['login-password'];

//to prevent mysql injection

$email= stripcslashes ($email);
$password= stripcslashes ($password);



$sql="SELECT * from register where email='$email' and status = 'active'";
$row = $conn->query($sql);


if ($row->num_rows == 1)
{    
    $result = mysqli_fetch_assoc($row);
    $db_pass = $result['password'];
    $decode_pass = password_verify($password, $db_pass);
    if ($decode_pass){
        // echo "<script> window.alert('Logged In!'); </script>";
        $_SESSION['user_loggedin'] = "OK";
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_name'] = $result['full_name'];
        header("location:index.php");
    } 
 }
//   exit();
else
{
    echo '<script> window.alert("Invalid Email or Password.!"); </script>';
    header("location:login_signup.php");
}

?>