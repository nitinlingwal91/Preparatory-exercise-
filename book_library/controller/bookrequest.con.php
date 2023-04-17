<?php
include "../conn/connection.php";

if (isset($_POST['submit_save'])) {

  $id = $_GET['id'];
  $book_id = $_POST['book_id'];
  $book_name = $_POST['book_name'];
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $issue_date = $_POST['issue_date'];
  $return_date = $_POST['return_date'];

  // Insert the data into the database
  $status = 'pending'; 
  $sql = "INSERT INTO issue_book (book_id, book_name, user_name, user_email, issue_date, return_date, status) VALUES ('$book_id', '$book_name', '$user_name', '$user_email', '$issue_date', '$return_date', '$status')";
  if (mysqli_query($con, $sql)) {
   
    echo '<script>alert("book request send to admin");window.location.href="../view/reader.view.php";</script>';

    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
  
 
}
?>


<?php
include "../conn/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data
  $book_request_id = $_POST['book_request_id'];
  $status = $_POST['status'];

  // Update status in database
  $sql = "UPDATE issue_book SET status = '$status' WHERE book_id = $book_request_id";
  if (mysqli_query($con, $sql)) {
    echo '<script>alert("Status updated successfully");</script>';
    header("Location: ../view/issuebook.view.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }

}

?>

