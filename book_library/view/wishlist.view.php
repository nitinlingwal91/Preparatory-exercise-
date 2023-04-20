<?php include "../conn/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../links/link.php" ?>
    <style>
        <?php include "../public/css/custom.css" ?>
    </style>

    <title>action</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid fw-bold">
            <a class="navbar-brand fw-bold" href="#">E-LIBRARY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../view/reader.view.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../view/mybook.view.php">my books</a>
                    </li>

                    <li class="d-flex align-items-center ms-lg-4">
                        <form class="d-flex" method="GET">
                            <input class="form-control me-2" name="search_query" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-primary" name="submit_search" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown me-lg-4">
                    <li><a class="dropdown-item " href="../controller/auth/logout.php"><button class="btn btn-primary text-align-center d-flex me-6">Logout</button></a></li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
include "../conn/connection.php";


$id = $_GET['id'];
$book_id = $_GET['book_id'];

if(isset($_SESSION['user_email'])){

}else{
    echo "not_login";
}



if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['id'];
?>
        <div class="col md-4 mb-4">
            <div class="card">
                <img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="image" style="max-width: 100%; max-height: 300px;">
                <div class="card-body bg-light book-card" style="width: 348x; height: 200px;">
                    <h5 class="card-title"><?php echo $row['book_name']; ?></h5>
                    <p class="card-text"><?php echo $row['author_name']; ?></p>
                </div>
            </div>
        </div>
<?php
    }
}
?>

    <ul class="pagination d-flex justify-content-center ">
        <?php

        if ($total_pages > 1) {
            $prev_page = ($page > 1) ? $page - 1 : 1;
            $next_page = ($page < $total_pages) ? $page + 1 : $total_pages;
            echo '<li class="page-item ' . ($page == 1 ? 'disabled' : '') . '"><a class="page-link" href="?page=' . $prev_page . '">Previous</a></li>';
            for ($i = 1; $i <= $total_pages; $i++) {
                echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
            }
            echo '<li class="page-item ' . ($page == $total_pages ? 'disabled' : '') . '"><a class="page-link" href="?page=' . $next_page . '">Next</a></li>';
        }
        echo '</ul>';

        ?>

</body>
<script src="../public/js/markasread.js"></script>

</html>