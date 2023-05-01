<?php

include '../conn/connection.php';

$book_id = mysqli_real_escape_string($con, $_POST['book_id']);
$user_email = $_SESSION['user_email'];

$sql_check = "SELECT * FROM issue_book WHERE book_id = '$book_id' AND user_email = '$user_email' AND status = 'returned'";
$result_check = mysqli_query($con, $sql_check);
if (mysqli_num_rows($result_check) > 0) {
    $_SESSION['msg'] = "You have already returned this book.";
    header("Location: ../view/book.view.php");
    exit();
}
$sql_update = "UPDATE issue_book SET status = 'returned' WHERE book_id = '$book_id' AND user_email = '$user_email' AND status = 'approved'";
if (mysqli_query($con, $sql_update)) {
    
    $_SESSION['msg'] = "Book returned successfully.";
} else {
   
    $_SESSION['msg'] = "Error returning book. Please try again later.";
}
header("Location: ../view/mybook.view.php");
exit();
?>