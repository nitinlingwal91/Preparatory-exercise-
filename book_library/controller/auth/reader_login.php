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
            $status = $data['status'];
            $user_role = $data['user_role'];
    
            $upass = $data['user_password'];
            $pass = password_verify($user_password, $upass);
    
            if ($pass == true && $status == "verified") {
                if (strcasecmp($user_role, "Reader") == 0) {
                    $_SESSION['success_message'] = 'Login successful';
                    $_SESSION['user_role'] = 'Reader';
                    header("Location: ../../view/reader.view.php");
                    exit();
                } else if (strcasecmp($user_role, "Admin") == 0) {
                    $_SESSION['success_message'] = 'Login successful';
                    $_SESSION['user_role'] = 'Admin';
                    header("Location: ../../view/admin.view.php");
                    exit();
                } else {
                    $_SESSION['error_message'] = "Invalid email or password or email not verified";
                    header("Location: ../../view/user_login.view.php");
                    exit();
                }
            } else {
                $_SESSION['error_message'] = "Invalid email or password or email not verified";
                header("Location: ../../view/user_login.view.php");
                exit();
            }
            
        }
    }
    
  
    
?>



