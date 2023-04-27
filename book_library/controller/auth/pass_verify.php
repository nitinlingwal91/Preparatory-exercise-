<?php
include "../../conn/connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

function send_password_reset($get_fname, $get_email, $email_token)
{
    $mail = new PHPMailer(true);
    try {
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nitinlingwal08@gmail.com';
        $mail->Password   = 'qpgafvwtcprrmxfd';
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->setFrom('nitinlingwal08@gmail.com', $get_fname);
        $mail->addAddress($get_email);
        $mail->isHTML(true);
        $mail->Subject = 'Reset password link';
        $mail->Body = "Click here to reset your password: <a href='http://localhost/e-library/book_library/view/change_password.view.php?email_token=$email_token&user_email=$get_email'>verify</a>";
        $mail->send();
        echo "<script>alert('An email has been sent to your email address. Please click on the verification link to verify your account');window.location.href='../../view/change_password.view.php';</script>";

        exit();
    } catch (Exception $e) {
        echo "Unable to send verification email. Please try again later. Error: {$mail->ErrorInfo}";
        exit();
    }
}



if (isset($_POST['submit'])) {
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $email_token = md5(uniqid(rand(), true));

    $emailquery = "SELECT * FROM user_registration WHERE user_email = '$user_email' LIMIT 1";
    $query = mysqli_query($con, $emailquery);

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);

        $get_fname = $row['user_fname'];
        $get_email = $row['user_email'];

        $update_token = "UPDATE user_registration SET email_token='$email_token' where user_email = '$get_email' LIMIT 1";

        $update_token_run = mysqli_query($con, $update_token);


        if ($update_token_run) {
            send_password_reset($get_fname, $get_email, $email_token);
            echo "<script>alert('we e-mailed you a password reset link'); window.location.href='../../view/change_password.view.php'; </script>";
            header("Location: ../../view/change_password.view.php");
            exit();
        } else {
            echo "<script>alert('something went wrong');</script>";
        }
    } else {
        echo "<script>alert('email not found');</script>";
        header('Location: ../../view/user_login.view.php');
        exit();
    }
}

if (isset($_POST['pass_submit'])) {
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($con, $_POST['user_password']);
    $cpwd = mysqli_real_escape_string($con, $_POST['cpwd']);
    $pass_token = mysqli_real_escape_string($con, $_POST['pass_token']);

    $user_pass = password_hash($user_password, PASSWORD_BCRYPT);
    $user_cpwd = password_hash($cpwd, PASSWORD_BCRYPT);

    if (!empty($pass_token)) {
        if (!empty($user_email) && !empty($user_password) && !empty($cpwd)) {
            $check_token = "SELECT email_token FROM user_registration WHERE email_token='$pass_token' LIMIT 1";
            $check_token_run = mysqli_query($con, $check_token);
            if (mysqli_num_rows($check_token_run) > 0) {
                if ($user_password == $cpwd) {
                    $update_password = "UPDATE user_registration SET user_password = '$user_pass' WHERE email_token='$pass_token' LIMIT 1";
                    $update_password_run = mysqli_query($con, $update_password);
                    if ($update_password_run) {

                        echo "<script>alert('New password successfully updated');</script>";
                        header("Location: ../../view/user_login.view.php");
                        exit();
                    } else {
                        echo "<script>alert('did not update password something went wrong!');</script>";
                        header("Location: ../../view/user_login.view.php");
                        exit();
                    }
                } else {
                    echo "<script>alert('Password and Confirm Password do not match');</script>";

                    header("location: ../../view/change_password.view.php");
                    exit();
                }
            } else {
                echo "<script>alert('invalid token');</script>";
                header("Location: ../../view/user_login.view.php");
                exit();
            }
        } else {
            echo "<script>alert('All fields are Mandatory');</script>";
            header("Location: ../../view/change_password.view.php?email_token=$pass_token&user_email=$email");
            exit();
        }
    } else {
        echo "<script>alert('No token Available');</script>";
        header("Location: ../../view/user_login.view.php");
        exit();
    }
}
