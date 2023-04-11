<?php
    include "../conn/connection.php";
    
    if(isset($_POST['saveuserrole'])) {
        // $id = $_POST['id'];
        $user_fname = $_POST['user_fname'];
        $user_lname = $_POST['user_lname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];

        
        
        // Update the user_role for the given user ID
        $query = "UPDATE user_registration SET user_role = '$user_role' WHERE user_email = '$user_email'";
        $query_run = mysqli_query($con, $query);
        
      

        if($query_run) {
            echo '<script>alert"user role updated successfully";</script>';
            header("Location: ../view/userdata.view.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }


    if(isset($_GET['id'])) {
        $user_email = $_GET['user_email'];
        $query = "SELECT * FROM user_registration WHERE user_email = $user_email";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0) {
            $row = mysqli_fetch_assoc($query_run);
            $user_fname = $row['user_fname'];
            $user_lname = $row['user_lname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
        } else {
            echo "No record found";
        }
    } else {
        echo "User ID not provided";
    }
?>

