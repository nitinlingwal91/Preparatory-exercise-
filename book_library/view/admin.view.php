<?php include "../conn/session.php" ?>
<?php 
if($_SESSION['user_role'] != "Admin") {
    header('Location: ../view/403.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <?php include "../links/link.php" ?>
    <style>
        <?php include "../public/css/admin.css" ?>
    </style>
    <script src="https://kit.fontawesome.com/2945ccc037.js" crossorigin="anonymous"></script>

    <title>Admin Panel</title>
</head>

<body>
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
                        <a class="nav-link" href="booklist.view.php">Book List</a>
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
                <ul class="navbar-nav me-4">
                    <li class="nav-item dropdown me-4 ">
                    <li class="text-align-center mt-2 align-items-center"><?php include "../controller/profile.con.php"?></li>
                    <li><a class="dropdown-item " href="../controller/auth/logout.php"><button class="btn btn-primary text-align-center d-flex me-6">Logout</button></a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-md-4 mt-4">
                <?php
                include "../conn/connection.php";
                $stmt = 'SELECT COUNT(*) as count FROM create_book';
                $stmt_run = mysqli_query($con, $stmt);
                $result = mysqli_fetch_assoc($stmt_run);

                // Get the book count from the result
                $book_count = $result['count'];
                ?>
                <a href="booklist.view.php">
                    <div class="card text-white bg-primary mb-3 w-75 h-100 mx-4">
                        <div class="card-header text-center"><i class="fa fa-sharp fa-light fa-book fa-flip fa-xl "></i>
                            Book Count</div>
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold"><?php echo $book_count; ?></h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-4">
                <?php
                $stmt = 'SELECT COUNT(*) as count FROM user_registration';
                $stmt_run = mysqli_query($con, $stmt);
                $result = mysqli_fetch_assoc($stmt_run);

                // Get the user count from the result
                $user_count = $result['count'];
                ?>
                <a href="userdata.view.php">
                    <div class="card text-white bg-success mb-3 w-75 h-100 mx-4">
                        <div class="card-header text-center"><i class="fas fa-users"></i> User Count</div>
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold"><?php echo $user_count; ?></h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-4">
                <?php
                $stmt = 'SELECT COUNT(*) as count FROM issue_book';
                $stmt_run = mysqli_query($con, $stmt);
                $result = mysqli_fetch_assoc($stmt_run);

                // Get the issue book count from the result
                $issue_book_count = $result['count'];
                ?>
                <a href="issuebook.view.php">
                    <div class="card text-white bg-danger mb-3 w-75 h-100 mx-4">
                        <div class="card-header text-center"><i class="fas fa-book-open"></i> Issued Book Count</div>
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold"><?php echo $issue_book_count; ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>







</body>

</html>