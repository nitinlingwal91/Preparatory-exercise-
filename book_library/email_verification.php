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

            $insert_query = "INSERT INTO user_registration (user_fname, user_lname, user_email, user_password, email_token) VALUES ('$user_fname', '$user_lname', '$user_email', '$user_pass', '$email_token') ";
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {

                $verification_link = '<a href="http://localhost/e-library/book_library/registration.php?email_token=' . $email_token . '">verify</a>';




                // Send verification email using PHPMailer
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'nitinlingwal08@gmail.com';
                    $mail->Password   = 'qnezrguqfymzycoh';
                    $mail->SMTPSecure = "tls";
                    $mail->Port       = 587;

                    //Recipients
                    $mail->setFrom('nitinlingwal08@gmail.com', $user_fname);
                    $mail->addAddress($user_email);

                    //Content
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

        // $user_id = $check_row['id'];
        $update_query = "UPDATE user_registration SET status = 'verified' WHERE user_email = '$user_email'";
        $check_update_query = mysqli_query($con, $update_query);
    


        echo "Your email has been verified.";
        header("location: http://localhost/e-library/book_library/registration.php?verified");
        exit;
    } else {

        
        echo "Invalid verification token.";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include "links/link.php"
    ?>
    <title>verify email</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6 ">
                <img src="https://img.icons8.com/clouds/100/000000/handshake.png" class="img-fluid mx-auto d-block w-50 " alt="handshake icon">
            </div>
            <div class="col-12 col-md-10 text-center">
                <p class="h3 mb-4">click this button to send link for email verification</p>
                <a href="http://localhost/e-library/book_library/registration.php?email_token=$email_token" class="btn btn-primary"><button type="button" name="verify" class="btn btn-primary btn-sm ">send</button></a>


                <p class="h6 mt-4">The link will be valid for the next 2 hours.</p>
            </div>

        </div>
    </div>


</body>

</html>