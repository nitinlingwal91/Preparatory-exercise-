<?php
include "../conn/connection.php";

if(isset($_POST['deleteuserbtn']))
{
    $user_id = $_POST['delete_id'];

    $query = "DELETE FROM user_registration WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        echo '<script>alert("User Deleted Successfully");</script>';
        header("Location: ../view/userdata.view.php");
    }
    else{
        echo '<script>alert("Something Went Wrong");</script>'; 
    }
}
?>
<?php
if(isset($_POST['deleteuserbtn1']))
{
    $user_id = $_POST['delete_id'];

    $query = "DELETE FROM create_book WHERE book_id='$user_id'";
    $query_run = mysqli_query($con, $query);
    

    if($query_run)
    {
        echo '<script>alert("User Deleted Successfully");</script>';
        header("Location: ../view/booklist.view.php");
    }
    else{
        echo '<script>alert("Something Went Wrong");</script>'; 
    }
}

?>
<?php
if(isset($_POST['deleteuserbtn2']))
{
    $user_id = $_POST['delete_id'];

    $query = "DELETE FROM issue_book WHERE book_id='$user_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);
    

    if($query_run)
    {
        $affected_rows = mysqli_affected_rows($con);
        if ($affected_rows > 0) {
            echo '<script>alert("User Deleted Successfully");</script>';
        } else {
            echo '<script>alert("No rows were deleted");</script>';
        }
        header("Location: ../view/issuebook.view.php");
    }
    else{
        echo '<script>alert("Something Went Wrong");</script>'; 
    }
}
?>
