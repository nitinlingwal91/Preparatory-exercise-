<?php

include "../conn/connection.php";

if (isset($_POST['saveuserdetails'])) {
  
  $id = $_POST['id'];
  $user_fname = $_POST['user_fname'];
  $user_lname = $_POST['user_lname'];
  $user_email = $_POST['user_email'];
  $user_role = $_POST['user_role'];
  
  $sql = "SELECT * FROM user_registration WHERE id='$id'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);

  $sql = "UPDATE user_registration SET user_fname='$user_fname', user_lname='$user_lname', user_email='$user_email', user_role='$user_role' WHERE id='$id'";
  $result = mysqli_query($con, $sql);

 
  if ($result) {
    
    echo "<script>alert('User details updated successfully')</script>";
    echo "<script>window.location.href='../view/userdata.view.php'</script>";
  } else {
    
    echo "<script>alert('Error updating user details')</script>";
  }
}
?> 
 











