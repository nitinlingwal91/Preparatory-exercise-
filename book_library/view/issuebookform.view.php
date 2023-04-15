<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../links/link.php" ?>
    <style>
        <?php include "../public/css/bookadd.css" ?>
    </style>
    <title>issue book</title>
</head>

<body>
    <nav class="navbar navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold ms-md-4" href="#">ADMIN PANEL</a>
            <div class="d-flex justify-content-center">
                <a href="../view/issuebook.view.php"><button type="button" name="submit" class="btn btn-primary ">BACK TO LIST</button></a>
            </div>
        </div>
    </nav>


    <?php
include "../conn/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data
  $book_id = $_POST['book_id'];
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $book_name = $_POST['book_name'];
  $issue_date = $_POST['issue_date'];
  $return_date = $_POST['return_date'];


  // Insert data into table
  $sql = "INSERT INTO issue_book (book_id, user_name, user_email, book_name, issue_date, return_date) VALUES ('$book_id', '$user_name', '$user_email', '$book_name', '$issue_date', '$return_date')";

  if ($con->query($sql) === TRUE) {

    echo'<script>alert"New record created successfully";</script>';
    
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

  
}


$sql = "SELECT book_id, book_name FROM create_book";
$result = $con->query($sql);
$books = [];

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $books[] = $row;
  }
} else {
  echo '<script>alert"No books found";</script>';
}


?>


    <div class="wrapper">
  <form class="form-right ms-4" action="" method="POST" enctype="multipart/form-data">
    <h2 class="text-uppercase ms-4">Issue book form</h2>
    <div class="row">
      <div class="mb-3 ms-4">
        <label>BOOK ID</label>
        <select class="input-field w-75" id="book_id" name="book_id" required>
          <?php foreach ($books as $book): ?>
            <option value="<?php echo $book['book_id']; ?>"><?php echo $book['book_id']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3 ms-4">
        <label>Reader Name</label>
        <input type="text" id="user_name" name="user_name" class="input-field w-75" required>
      </div>
    </div>
    <div class=" mb-3 ms-4" style="width: 100%;">
      <label>Email</label>
      <input type="email" id="book_name" name="user_email" class="input-field w-75" required>
    </div>
    <div class="mb-3 ms-4">
        <label>BOOK NAME</label>
        <select class="input-field w-75" id="book_name" name="book_name" required>
          <?php foreach ($books as $book): ?>
            <option value="<?php echo $book['book_name']; ?>"><?php echo $book['book_name']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    <div class="row">
      <div class="mb-3 ms-4">
        <label for="issue_date">Issue Date:</label>
        <input type="datetime-local" id="issue_date" name="issue_date" class="input-field w-75" required>
      </div>
      <div class="mb-3 ms-4">
        <label for="return_date">Return Date</label>
        <input type="datetime-local" id="return_date" name="return_date" class="input-field w-75" required>
      </div>
    </div>
    <div class="form-field ms-4">
      <input type="submit" value="SAVE" class="register" name="submit_save">
    </div>
  </form>
</div>





</body>

</html>