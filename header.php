<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
    <title>letsventout</title>
</head>
<body>
    <div id = "he" class="header">
    <nav>
    <!-- company log here -->
    <img class="logo_header" src="imgs/logodark.png" alt="letsventoutlogo">
    <label for="menu"> &#9776 </label>
    <input type="checkbox" id="menu">
    <ul>
        <li><a href="index.php">home</a></li>
        <!-- <li><a href="#">Stories of Hope</a></li> -->
        <li><a href="videogallery.php">Video Gallery</a></li>
        <li><a href="cc.php">Care Corner</a></li>
        <li><a href="aboutUs.php">About us</a></li>
        <?php
        if(!isset($_SESSION['user_loggedin'])){
            echo "<li><a href='login_signup.php'>Login</a></li>";
          }
        else{
            echo "<li><a href='profile.php'>Dashboard</a></li>";
            echo "<li><a href='logout.php'>Logout</a></li>";
        }
    
        ?>
    </ul>
    
   
</nav>
</div>
</body>
</html>

