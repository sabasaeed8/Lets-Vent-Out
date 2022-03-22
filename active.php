<?php

session_start();
include 'connection.php';

if (isset($_GET['token'])){
    $token = $_GET['token'];

    $update = "update register set status = 'active' where token = '$token'";
    $query = $conn->query($update);

    if($query){
        header('location:login_signup.php');
    }
}


?>