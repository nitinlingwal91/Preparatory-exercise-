<?php include "../conn/session.php"?>
<?php 
if($_SESSION['user_role'] != "Admin" && $_SESSION['user_role'] != "SuperAdmin" )  {
    header('Location: ../view/403.php');
    exit();
}
?>
<?php
include "../conn/connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../links/link.php" ?>
  <style>
    <?php include "../public/css/admin.css" ?>
  </style>
  <title>user list</title>
</head>

<body>

  <!-- delete Modal -->
  <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Book Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="../controller/delete.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" class="delete_user_id">
            <p>Are you sure you want to delete this data?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="deleteuserbtn" class="btn btn-primary ">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid fw-bold">
      <a class="navbar-brand fw-bold" href="#">Admin Panel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Book List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Admin List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Reader List</a>
          </li>
          <li class="d-flex align-items-center ms-lg-4">
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-primary" type="submit">Search</button>
            </form>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown me-lg-4"></li>
          <li class="text-align-center mt-2 align-items-center"><?php include "../controller/profile.con.php"?></li>
          <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="col-md-6 col-lg-8 d-flex justify-content-end align-items-center">
      <button type="button" class="btn btn-primary mx-2 mt-2 mt-md-0" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addBookBtn">Add Users</button>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD USERS</h5>
              <<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <div class="table-responsive">
    <table class="table table-bordered mt-4">
      <thead>
        <tr>
          <th>Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email Address</th>
          <th>Email Verification Status</th>
          <th>Registration time</th>
          <th>EDIT</th>
          <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        <?php include "../controller/userdata.con.php"?>
      </tbody>
    </table>
  </div>




  <script src="../public/js/delete.js"></script>
</body>

</html>