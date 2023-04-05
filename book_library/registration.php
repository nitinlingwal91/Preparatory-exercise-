<?php

include "conn/connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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
    } else {
        if ($user_password === $cpwd) {

            $email_token = md5(uniqid(rand(), true));

            $insert_query = "INSERT INTO user_registration (user_fname, user_lname, user_email, user_password, email_token, status) VALUES ('$user_fname', '$user_lname', '$user_email', '$user_pass', '$email_token', 'unverified') ";
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {

                $verification_link = '<a href="http://localhost/e-library/book_library/registration.php?email_token=' . $email_token . '">verify</a>';


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
                    echo "An email has been sent to your email address. Please click on the verification link to verify your account.";
                } catch (Exception $e) {
                    echo "Unable to send verification email. Please try again later. Error: {$mail->ErrorInfo}";
                }   
            }
        } else {
        ?>
            <script>
                alert("Passwords do not match");
            </script>
<?php
        }
    }
}

if (isset($_GET['email_token'])) {
    $email_token = mysqli_real_escape_string($con, $_GET['email_token']);

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
                ?>
                <script>
                    alert ("your email is verified");
                </script>
                <?php
                header("location: reader.php");
                
                exit;
            } else {
                echo "Unable to verify your email.";
            }
        } else {
            echo "Unable to update status.";
        }
    } else {
        echo "Invalid verification token.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "links/link.php"
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
                <a href="user_login.php"><input type="submit" class="account" value="Have an Account?"></a>
            </div>
        </div>
        <form class="form-right" action="" method="POST" enctype="">
            <h2 class="text-uppercase">Registration form</h2>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>First Name</label>
                    <input type="text" id="user_fname" name="user_fname" class="input-field">
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" id="user_lname" name="user_lname" class="input-field">
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
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="form-field">
                <input type="submit" value="Register" class="register" name="register">
            </div>
        </form>
    </div>

</body>

</html>