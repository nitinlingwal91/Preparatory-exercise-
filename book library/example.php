<?php



include "conn/connection.php";

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

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

           if($insery_query_run){

            
            $subject = "Email Verification ";
            $body = "hi, $user_fname .click here to verify email
            http://localhost/e-library/book%20library/registration.php?token=$email_token";
            $sender_email = "From: nitinlingwal08@gmail.com";

            if(mail($user_email, $subject, $body , $sender_email)){
                $_SESSION['msg'] = "check you mail to activate your account $user_email";
                header("location: login.php");
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
