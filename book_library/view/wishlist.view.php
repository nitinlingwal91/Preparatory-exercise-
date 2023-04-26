<?php include "../conn/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../links/link.php" ?>
    <style>
        <?php include "../public/css/custom.css" ?>
    </style>

    <title>wishlist</title>
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
                        <a class="nav-link " aria-current="page" href="../view/reader.view.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">wishlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../view/mybook.view.php">my books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../view/history.view.php">History</a>
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
                    <li class="text-align-center mt-2 align-items-center"><?php include "../controller/profile.con.php" ?></li>
                    <li><a class="dropdown-item " href="../controller/auth/logout.php"><button class="btn btn-primary text-align-center d-flex me-6">Logout</button></a></li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php

    ?>

    <div class="container">
        <div class="row align-items-center mb-4 mt-4">
            <div class="col-md-8 d-flex flex-column align-items-center align-items-md-start fw-bold">
                <h2 class="text-uppercase">wishlisted books</h2>
            </div>
        </div>
        <form action="" method="GET">
            <div class="input-group mb-3">
                <select name="sort_alphabet" class="input_group_text">
                    <option value="">--select option</option>
                    <option value="a-z" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z") {
                                            echo "selected";
                                        } ?>>A-Z (Ascending order)</option>
                    <option value="z-a" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a") {
                                            echo "selected";
                                        } ?>>Z-A (Descending order)</option>
                </select>
                <button type="submit" class="input-group-text" id="basic-addon2">Sort</button>
            </div>
        </form>
    </div>
    </div>



    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3" id="bookList">

            <?php

            include "../conn/connection.php";

            $user_email = $_SESSION['user_email'];

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $query = "SELECT * FROM create_book WHERE id='$id'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);


                $book_id = $row['book_id'];
                $book_name = $row['book_name'];
                $author_name = $row['author_name'];
                $img_url = $row['img_url'];

                $query = "SELECT * FROM wishlist WHERE book_id='$book_id' AND user_email='$user_email' ";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);

                if ($row) {
                    echo '<script>alert("Book already in wishlist!");window.location.href="../view/reader.view.php";</script>';
                    exit();
                }

                $query = "INSERT INTO wishlist (book_id, book_name, author_name, user_email, img_url, status) VALUES ('$book_id', '$book_name', '$author_name', '$user_email', '$img_url', 'wishlisted')";
                $result = mysqli_query($con, $query);

                if ($result) {
                    echo '<script>alert("Book added to wishlist!");</script>';
                } else {
                    echo '<script>alert("Error adding book to wishlist!");</script>';
                }
            }

            $sort_option = "";
            if (isset($_GET['sort_alphabet'])) {
                if ($_GET['sort_alphabet'] == "a-z") {
                    $sort_option = "ASC";
                } elseif ($_GET['sort_alphabet'] == "z-a") {
                    $sort_option = "DESC";
                }
            }

            $search_query = "";
            if (isset($_GET['submit_search'])) {
                $search_query = $_GET['search_query'];
            }

            $results_per_page = 3;
            $sql = "SELECT COUNT(*) as count FROM wishlist WHERE status = 'wishlisted' AND user_email='$user_email'";
            if (!empty($search_query)) {
                $sql .= " AND (book_name LIKE '%$search_query%' OR author_name LIKE '%$search_query%')";
            }
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $total_results = $row['count'];
            $total_pages = ceil($total_results / $results_per_page);

            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $starting_limit = ($page - 1) * $results_per_page;
            $ending_limit = $starting_limit + $results_per_page;

            $sql = "SELECT * FROM wishlist 
            WHERE status = 'wishlisted' 
            AND user_email='$user_email'";
            if (!empty($search_query)) {
                $sql .= " AND (book_name LIKE '%$search_query%' OR author_name LIKE '%$search_query%')";
            }
            if (!empty($sort_option)) {
                $sql .= " ORDER BY book_name $sort_option";
            }
            $sql .= " LIMIT $starting_limit, $results_per_page";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $book_name = $row['book_name'];
                $author_name = $row['author_name'];
                $img_url = $row['img_url'];


            ?>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="card">
                        <img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="image" style="max-width: 100%; max-height: 300px;">
                        <div class="card-body bg-light book-card" style="height: 200px;">
                            <form class="mb-2" method="post">
                                <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>" />
                                <button type="submit" name="remove_wishlist" class="btn btn-danger btn-block">Remove from Wishlist</button>
                            </form>
                            <h5 class="card-title text-center"><?php echo $row['book_name']; ?></h5>
                            <p class="card-text text-center"><?php echo $row['author_name']; ?></p>
                            <p class="card-text text-center">Book Id--<?php echo $row['book_id']; ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_wishlist'])) {
        $book_id = $_POST['book_id'];
        $user_email = $_SESSION['user_email'];
        $query = "DELETE FROM wishlist WHERE book_id='$book_id' AND user_email='$user_email' AND status='wishlisted'";
        $result = mysqli_query($con, $query);
        if ($result) {
            if (mysqli_affected_rows($con) > 0) {
                echo '<script>alert("Book removed from wishlist!"); window.location.href = window.location.href;</script>';
            } else {
                echo '<script>alert("Book not found in wishlist!");</script>';
            }
        } else {
            echo '<script>alert("Error removing book from wishlist!");</script>';
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
    </ul>









</body>


</html>