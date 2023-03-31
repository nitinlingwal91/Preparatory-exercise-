<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "links/link.php" ?>
    <style>
        <?php include "css/customo.css" ?>
    </style>

    <title>window page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-light bg-dark">
        <div class="container-fluid align-item-center">
            <a href="#" class="navbar-brand fw-bold ms-md-4"></a>
            <form class="form-inline ml-auto" method="GET" action="#">
                <div class="input-group . d-flex justify-content-center">
                    <input type="text" class="form-control" name="search_query" placeholder="Search" aria-label="search" aria-describedby="search-addon">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit_search"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarCollapse">
            <div class="d-flex justify-content-end">
                <a href="logout.php"><button type="submit" name="submit" class="btn btn-primary btn-block btn-m gradient-custom-4 text-body">Logout</button></a>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="row align-items-center mb-4 mt-4">
            <div class="col-md-8 d-flex flex-column align-items-center align-items-md-start fw-bold ">
                <h2>Welcome to E-Library</h2>
            </div>

            <div class="col-md-4 d-flex justify-content-end align-items-center">
                <a href="addbook.php"><button type="button" class="btn btn-primary" id="addBookBtn">Add Book</button></a>
            </div>
        </div>


        
        <form action="" method="GET">
            <section>
                <div class="input-group mb-3">
                    <select name="sort_alphabet" class=" input_group_text">
                        <option value="">--select option</option>
                        <option value="a-z" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z") {
                                                echo "selected";
                                            } ?>>A-Z (Ascending order)</option>
                        <option value="z-a" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a") {
                                                echo "selected";
                                            } ?>>Z-A (Descending order)</option>
                    </select>
                    <button type="submit" class="input-group-text" id="basic-addon2">sort</button>
                </div>
            </section>
        </form>

    </div>



    <main>

        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3" id="bookList">
                <!-- sorting and searching -->

                <?php
                include "conn/connection.php";

    
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

               //calculation number of pages
                $results_per_page = 3; 
                $sql = "SELECT COUNT(*) as count FROM book_data";
                if (!empty($search_query)) {
                    $sql .= " WHERE book_name LIKE '%$search_query%' OR author_name LIKE '%$search_query%'";
                }
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $total_results = $row['count'];
                $total_pages = ceil($total_results / $results_per_page);

            
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $starting_limit = ($page - 1) * $results_per_page;
                $ending_limit = $starting_limit + $results_per_page;

                //  search query with limits and execute it
                $sql = "SELECT * FROM book_data";
                if (!empty($search_query)) {
                    $sql .= " WHERE book_name LIKE '%$search_query%' OR author_name LIKE '%$search_query%'";
                }
                if (!empty($sort_option)) {
                    $sql .= " ORDER BY book_name $sort_option";
                }
                $sql .= " LIMIT $starting_limit, $results_per_page";
                $result = mysqli_query($con, $sql);

                //  Display the search results
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                ?>
                        <div class="col md-4 mb-4">
                            <div class="card">
                                <img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="image" style="max-width: 100%; max-height: 300px;">
                                <div class="card-body bg-light">
                                    <h5 class="card-title"><?php echo $row['book_name']; ?></h5>
                                    <p class="card-text"><?php echo $row['author_name']; ?></p>
                                    <a href="book_details.php?id=<?php echo $row['id']; ?> "><button name="details" class="btn btn-primary fw-bold">Read More</button></a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }    
                ?>
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