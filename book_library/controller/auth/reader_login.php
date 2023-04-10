<?php
     session_start();
    include "../../conn/connection.php";
    
    if (isset($_POST['reader_submit'])) {
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        
        $sql = "SELECT * From user_registration WHERE user_email = '$user_email'";
        $q = mysqli_query($con,$sql);
        $num = mysqli_num_rows($q);

        if ($num == 1) {
            $data = mysqli_fetch_assoc($q);
            $status = $data['status']; 
            $upass = $data['user_password'];
            $pass = password_verify($user_password, $upass);
            if($pass == true && $status == "verified"){ 
                $_SESSION['success_message'] = 'Login successful';
                header("Location: ../../view/reader.view.php");
                exit();
                
            } else {
                $_SESSION['error_message'] = "Invalid email or password or email not verified";
                header("Location: ../../view/user_login.view.php");
                exit();
            }
        }
    }
    session_destroy();
?>



