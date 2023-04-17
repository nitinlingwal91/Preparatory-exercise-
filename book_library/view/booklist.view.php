<?php


// Check if the user is logged in and has the correct role
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'reader') {
    // Check if the requested URL contains "admin.view.php"
    if(strpos($_SERVER['REQUEST_URI'], "admin.view.php") !== false) {
        http_response_code(403);
        header("Location: page_403.php");
        exit();
    }
}
?>
<?php include "../conn/session.php"?>
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
                        <button type="submit" name="deleteuserbtn1" class="btn btn-primary ">Delete</button>
                    </div>
                </form>
            </div>
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
                        <a class="nav-link " aria-current="page" href="admin.view.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="booklist.view.php">Book List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="issuebook.view.php">Issue Book Management</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="adminlist.view.php">Admin List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userdata.view.php">User List</a>
                    </li>
                    
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown me-lg-4">
                    <li><a class="dropdown-item " href="../controller/auth/logout.php"><button class="btn btn-primary text-align-center d-flex me-6">Logout</button></a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row mt-3 mx-4">
        <div class="col-md-6 col-lg-4">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search by book/author Name" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 col-lg-8 d-flex justify-content-end align-items-center">
            <a href="../view/bookadd.view.php"><button type="button" class="btn btn-primary mx-2 mt-2 mt-md-0" id="addBookBtn">Add Book</button></a>
        </div>
    </div>

    <form action="" method="GET">
    <section>
      <div class="input-group mt-3 mx-4">
        <select name="sort_alphabet" class=" input_group_text mx-4">
          <option value="">--select option</option>
          <option value="a-z" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z") {
                                echo "selected";
                              } ?>>A-Z (Ascending order)</option>
          <option value="z-a" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a") {
                                echo "selected";
                              } ?>>Z-A (Descending order)</option>
        </select>
        <button type="submit" name="sort" class="input-group-text " id="basic-addon2">sort</button>
      </div>
    </section>
  </form>

    <div class="table-responsive">
        
        <table class="table table-bordered mt-4 text-center text-uppercase">
            <thead>
                <tr>
                    <th >Book Image</th>
                    <th>Book Id</th>
                    <th>Author Name</th>
                    <th>Book Name</th>
                    <th class="w-25">Description/About</th>
                    <th>image path</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php include "../controller/booklist.con.php" ?>
            </tbody>
        </table>
    </div>

    <!-- pagination  -->
    <?php

    echo '<nav aria-label="Page navigation example">';
    echo '<ul class="pagination justify-content-center mt-4">';

    if ($current_page > 1) {
        $prev_page = $current_page - 1;
        echo '<li class="page-item"><a class="page-link" href="?search=' . $search . '&page=' . $prev_page . '">Previous</a></li>';
    } else {
        echo '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>';
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            echo '<li class="page-item"><a class="page-link" href="?search=' . $search . '&page=' . $i . '">' . $i . '</a></li>';
        }
    }

    if ($current_page < $total_pages) {
        $next_page = $current_page + 1;
        echo '<li class="page-item"><a class="page-link" href="?search=' . $search . '&page=' . $next_page . '">Next</a></li>';
    } else {
        echo '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Next</a></li>';
    }

    echo '</ul>';
    echo '</nav>';
    ?>





    <script src="../public/js/delete.js"></script>
</body>

</html>