<?php
include "../conn/connection.php";

if(isset($_POST['saveuserdetails']) &&  ($_SERVER['REQUEST_METHOD'] === 'POST')){
    $id = $_POST['id'];
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    
    $sql = "UPDATE user_registration SET user_fname='$user_fname', user_lname='$user_lname', user_email='$user_email', user_role='$user_role' WHERE id='$id'";

    if ($con->query($sql) === TRUE) {
        echo '<script>alert"data update successfully";</script>';
        header("Location: ../view/userdata.view.php");
        
        exit;
    } else {
        echo "Error updating record: " . $con->error;
        header("Location: ../view/userdata.view.php");
        
    }    
}

?>



