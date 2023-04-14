<?php
include "../conn/connection.php";

// check if the form was submitted
if (isset($_POST['saveuserdetails'])) {
  
  // get the variables from the form
  $id = $_POST['id'];
  $user_fname = $_POST['user_fname'];
  $user_lname = $_POST['user_lname'];
  $user_email = $_POST['user_email'];
  $user_role = $_POST['user_role'];

  // retrieve the user details based on the ID
  $sql = "SELECT * FROM user_registration WHERE id='$id'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);

  // update the user details
  $sql = "UPDATE user_registration SET user_fname='$user_fname', user_lname='$user_lname', user_email='$user_email', user_role='$user_role' WHERE id='$id'";
  $result = mysqli_query($con, $sql);

  // check if the update was successful
  if ($result) {
    // User details updated successfully
    echo "<script>alert('User details updated successfully')</script>";
    echo "<script>window.location.href='../view/userdata.view.php'</script>";
  } else {
    // Error updating user details
    echo "<script>alert('Error updating user details')</script>";
  }
}
?>

  
  



