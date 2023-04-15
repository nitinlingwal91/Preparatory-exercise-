<?php
session_start();

include "../../conn/connection.php";

if (isset($_POST['reader_submit'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $sql = "SELECT * From user_registration WHERE user_email = '$user_email'";
    $q = mysqli_query($con, $sql);
    $num = mysqli_num_rows($q);

    if ($num == 1) {
        $data = mysqli_fetch_assoc($q);
        $user_data = array($data['user_role'], $data['user_email'], $data['user_password']);
        $_SESSION["user_data"] = $user_data;
        $status = $data['status'];
        $user_role = $data['user_role'];

        $upass = $data['user_password'];
        $pass = password_verify($user_password, $upass);

        if ($pass == true && $status == "verified") {
            if (strcasecmp($user_role, "Reader") == 0) {
                $_SESSION['user_role'] = 'Reader';
                echo '<script>alert("Login successfull"); window.location.href="../../view/reader.view.php";</script>';
                

                
                exit();
            } else if (strcasecmp($user_role, "Admin") == 0) {
                $_SESSION['user_role'] = 'Admin';
                echo '<script>alert"Login successfull";</script>';
                
                echo '<script>window.location="../../view/admin.view.php";</script>';
                exit();
            } else {
                echo '<script>alert"Invalid email or password or email not verified";</script>';
                echo '<script>window.location="../../view/user_login.view.php";</script>';
                exit();
            }
        } else {
            echo '<script>alert"Invalid email or password or email not verified"; </script>';
            echo '<script>window.location="../../view/user_login.view.php";</script>';
            exit();
        }
    }
}
