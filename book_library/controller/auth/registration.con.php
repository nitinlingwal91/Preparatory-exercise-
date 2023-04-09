<?php

include "../conn/connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if (isset($_POST['register'])) {

    $user_fname = mysqli_real_escape_string($con, $_POST['user_fname']);
    $user_lname = mysqli_real_escape_string($con, $_POST['user_lname']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($con, $_POST['user_password']);
    $cpwd = mysqli_real_escape_string($con, $_POST['cpwd']);

    $user_pass = password_hash($user_password, PASSWORD_BCRYPT);
    $user_cpwd = password_hash($cpwd, PASSWORD_BCRYPT);

    $emailquery = "SELECT * FROM user_registration WHERE user_email = '$user_email' LIMIT 1";
    $query = mysqli_query($con, $emailquery);

    if (mysqli_num_rows($query) > 0) {
?>
        <script>
            alert("Email id already exists");
        </script>
        <?php
        header("Location: ../../view/registration.view.php");
        
    } else {
        if ($user_password === $cpwd) {

            $email_token = md5(uniqid(rand(), true));

            $token_generated_time = time();

            $insert_query = "INSERT INTO user_registration (user_fname, user_lname, user_email, user_password, email_token, status) VALUES ('$user_fname', '$user_lname', '$user_email', '$user_pass', '$email_token', 'unverified') ";
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {

                $verification_link = '<a href="http://localhost/e-library/book_library/view/registration.view.php?email_token=' . $email_token . '&token_time=' . $token_generated_time . '">verify</a>';



                // Sending  verification email using PHPMailer
                $mail = new PHPMailer(true);
                try {
                    
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'nitinlingwal08@gmail.com';
                    $mail->Password   = 'uzukbrnudcpvhdzj';
                    $mail->SMTPSecure = "tls";
                    $mail->Port       = 587;
                    $mail->setFrom('nitinlingwal08@gmail.com', $user_fname);
                    $mail->addAddress($user_email);
                    $mail->isHTML(true);
                    $mail->Subject = 'Verify Your Email';
                    $mail->Body    = "Click the following link to verify your email: $verification_link";

                    $mail->send();
                    echo '<script>alert("An link has been sent to your email address. Please click on the verification link to verify your account.");</script>';
                   
                } catch (Exception $e) {
                    echo '<script>alert("Unable to send verification email. Please try again later. Error: {$mail->ErrorInfo}");</script>';
                }   
            }
        } else {
        echo
            '<script>
                alert("Passwords do not match");
            </script>';

        }
    }
}

if (isset($_GET['email_token'])) {
    $email_token = mysqli_real_escape_string($con, $_GET['email_token']);
    $token_generated_time = mysqli_real_escape_string($con, $_GET['token_time']); 
    $current_time = time();

    if (($current_time - $token_generated_time) > 7200) {
        echo '<script>alert("Verification link has expired. Please generate a new link.");</script>';
        exit;
    }

    $check_query = "SELECT * FROM user_registration WHERE email_token = '$email_token' LIMIT 1";
    $check_result = mysqli_query($con, $check_query);
    

    if (mysqli_num_rows($check_result) == 1) {
        $check_row = mysqli_fetch_assoc($check_result);

        $user_email = $check_row['user_email'];
        $update_query = "UPDATE user_registration SET status = 'verified' WHERE user_email = '$user_email'";
        $check_update_query = mysqli_query($con, $update_query);
    
        if ($check_update_query) {
            // check if the status is updated to verified
            $status_query = "SELECT status FROM user_registration WHERE user_email = '$user_email' LIMIT 1";
            $status_result = mysqli_query($con, $status_query);
            $status_row = mysqli_fetch_assoc($status_result);

            if ($status_row['status'] == 'verified') {
                echo'<script>alert ("your email is verified");</script>';
                header("Location: /e-library/book_library/view/user_login.view.php");


            } else {
                echo '<script>alert("Unable to verify your email.");</script>';
            }
        } else {
            echo '<script>alert("Unable to update status.");</script>';
        }
    } else {
        echo '<script>alert("invalid verification token.");</script>';
    }
}

?>