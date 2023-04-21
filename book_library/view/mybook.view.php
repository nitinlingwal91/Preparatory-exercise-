<?php include "../conn/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../conn/connection.php" ?>
    <?php include "../links/link.php" ?>
    <style>
        <?php include "../public/css/custom.css" ?>
    </style>

    <title>mybook</title>
</head>

<body>


    <!-- issue book modal -->


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid fw-bold">
            <a class="navbar-brand fw-bold" href="#">E-LIBRARY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="reader.view.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="wishlist.view.php">wishlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="">my books</a>
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




    <div class="container">
        <div class="row align-items-center mb-4 mt-4">
            <div class="col-md-8 d-flex flex-column align-items-center align-items-md-start fw-bold">
                <h2>Welcome to E-Library</h2>
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




    <main>

        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3" id="bookList">
                <!-- sorting and searching -->

                <?php include "../controller/mybook.con.php"?>
            </div>
        </div>

    </main>

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