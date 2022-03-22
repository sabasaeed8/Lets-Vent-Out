 <!-- *******Registration Backend****** -->
<?php
$msg="";
require_once('connection.php');
if (isset($_POST['register-verify']))
{
   
        $fullName=$_POST['register-name'];
        $email=$_POST['register-email'];
        $password=$_POST['register-password'];
        $cpassword=$_POST['register-con-pass'];
        $dob=$_POST['register-dob'];
        $gender=$_POST['register-gender'];
        
        // To encrypr password
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $token = bin2hex(random_bytes(15));
        

        // check if email id already exists
        $sql1="SELECT * from register where email='$email'";
        $row = $conn->query($sql1);
        
        if($row->num_rows > 0){
            echo "<script> window.alert('Email already exists!'); </script>";
        }
        
        // if pass and confirm pass does not match
        else if($password != $cpassword){
            echo "<script> window.alert('Password does not match !'); </script>";
        }
        
        else
        {
           $sql="INSERT INTO register (full_name, email, password, c_password, dob, gender,token,status) value ('$fullName', '$email',  
          '$pass', '$cpass', '$dob', '$gender','$token','inactive')";

           $res = $conn->query($sql);

           if ($res)
        {   
            $to_email = "$email";
            $subject = "Email Activation";
            $body = "Hi, $fullName. Click here to activate your account.
            http://localhost/DSA_2/active.php?token=$token";
            $sender = "From: letsventout0@gmail.com";
            if (mail($to_email, $subject, $body, $sender)) {
                    $msg = "We've just sent a verification link to <strong> $email </strong> .Please check your inbox and click on the
                    link to get started.If you can't find this email,just request a new one here.";
            } else {
                    echo "Email sending failed...";
            }
           
        }
           else 
        {
            echo "<script> window.alert('Error Occurred!'); </script>";
        } 

        }
    }
      
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>letsventout</title>
</head>
<body>
    <?php include 'header.php'?>
    <!-- company log here -->
    <img class="logo_pic" src="imgs/logolight.png">
    <!-- image -->
    <img class="login_pic" src="imgs/pic.png" >

    <div id="login-form" class="login-page">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" onclick="login()" class="toggle-btn"> Login </button>
                <button type="button" onclick="register()" class="toggle-btn"> Register </button>
            </div>
        
            <!-- Creating login form -->
            <form id="login" class="login-input-group" method="post" action="login_backend.php">
                <input type="text" name = "login-email" class="login-input-field" placeholder="Email"  required>
                <input type="password" name = "login-password" class="login-input-field" placeholder="Password" required>
                <!-- <a class="forgot-pass" href="#">Forgot Password?</a> -->
                <button type="submit" name = "login-submit" class="submit-btn" >LOGIN</button>
                <div class="message">
                <?php
                  echo $msg;
                ?>
                </div>
            </form>
                <!-- Creating the registeration form -->
           <form id="register" class="register-input-group" method="post" action = "<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
                <input type="text" name = "register-name" class="register-input-field" placeholder="Full Name"  required>
                <input type="email" name ="register-email" class="register-input-field" placeholder="Email" required>
                <input type="password" name = "register-password" class="register-input-field" placeholder="Password" required>
                <input type="password" name = "register-con-pass" class="register-input-field" placeholder="Confirm Password" required>
                <input type="date" name ="register-dob" class="register-input-field" placeholder="Birth Month" required>
                <span class=gender >Gender:</span> <input type="radio" class=gender name="register-gender" value="Male" required /> <span class=gender >Male</span>
                <input type="radio" class=gender name="register-gender" value="Female" required/> <span class=gender >Female</span>
                <button type="submit" name = "register-verify" class="verify-btn">Register</button>
                
                
                <!-- <input type="text" name = "verify-code" class="verify-input-field" placeholder="Verification Code" required> -->
                <!-- <button type="submit" name = "register-submit" value="submit" class="register-btn">REGISTER</button> -->
            </form>
        </div>
    </div> 

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");
        function login(){
           x.style.left = "50px";
           y.style.left = "450px";
           z.style.left = "0px";
        }
        function register(){
         x.style.left = "-450px";
         y.style.left = "0px";
         z.style.left = "110px";
        }     
    </script> 

    <!-- *******Registration Backend****** -->

      



</body>
</html>