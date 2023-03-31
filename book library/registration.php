<?php



include "conn/connection.php";



if(isset($_POST['register'])){

    $user_fname = mysqli_real_escape_string($con, $_POST['user_fname']);
    $user_lname = mysqli_real_escape_string($con, $_POST['user_lname']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($con, $_POST['user_password']);
    $cpwd = mysqli_real_escape_string($con, $_POST['cpwd']);

    $user_pass = password_hash($user_password, PASSWORD_BCRYPT);
    $user_cpwd = password_hash($cpwd, PASSWORD_BCRYPT);

    $email_token = bin2hex(random_bytes(15));

    $emailquery = "SELECT * FROM user_registration WHERE user_email = '$user_email' LIMIT 1";
    $query = mysqli_query($con, $emailquery);

    if(mysqli_num_rows($query)>0)
    {
        echo "Email id already Exists";

    }
    else
    {
        if($user_password === $cpwd){

          
    
            $insert_query = "INSERT INTO user_registration (user_fname, user_lname, user_email, user_password, email_token, status) VALUES ('$user_fname', '$user_lname', '$user_email', '$user_pass', '$email_token', 'inactive') "; 
            $insert_query_run = mysqli_query($con, $insert_query);

           if($insert_query_run){

            
            $subject = "Email Verification ";
            $body = "hi, $user_fname .click here to verify email
            http://localhost/e-library/book%20library/registration.php?token=$email_token";
            $sender_email = "From: nitinlingwal08@gmail.com";

            if(mail($user_email, $subject, $body , $sender_email)){
                echo  "check you mail to activate your account $user_email";
                
            }else{
                echo "email sending failed";
            }
           }else{
            ?>
            <script>
                alert("failed");
            </script>
            <?php
           }
            
    
    }else
    {
       echo "Passwords do not match."; 
    }

}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "links/upperlink.php"
    ?>
    <style>
        <?php include "css/registration.css" ?>
    </style>
    <title>user Registration</title>
</head>

<body>
    <div class="wrapper">
        <div class="form-left">
            <h2 class="text-uppercase">E-library</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.
            </p>
            <p class="text">
                <span>Sub Head:</span>
                Vitae auctor eu augudsf ut. Malesuada nunc vel risus commodo viverra. Praesent elementum facilisis leo vel.
            </p>
            <div class="form-field">
                <input type="submit" class="account" value="Have an Account?">
            </div>
        </div>
        <form class="form-right" action="" method="POST" enctype="">
            <h2 class="text-uppercase">Registration form</h2>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>First Name</label>
                    <input type="text"  id="user_fname" name="user_fname" class="input-field">
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Last Name</label>
                    <input type="text"  id="user_lname" name="user_lname" class="input-field">
                </div>
            </div>
            <div class="mb-3">
                <label>Your Email</label>
                <input type="email" class="input-field" name="user_email" required>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Password</label>
                    <input type="password" name="user_password" id="pwd" class="input-field">
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Current Password</label>
                    <input type="password" name="cpwd" id="cpwd" class="input-field">
                </div>
            </div>
            <div class="mb-3">
                <label class="option">I agree to the <a href="#">Terms and Conditions</a>
                    <input type="checkbox" checked>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="form-field">
                <input type="submit" value="Register" class="register" name="register">
            </div>
        </form>
    </div>
</body>





<?php
include "links/lowerlink.php"
?>

</html>