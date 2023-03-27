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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid align-item-center">
            <a href="#" class="navbar-brand fw-bold ms-md-4"></a>
            <form class="form-inline ml-auto" method="GET" action="book_details.php">
            <?php
            include "conn/connection.php";

            if (isset($_GET['submit_search'])) {
                $search = mysqli_real_escape_string($con, $_GET['search_query']);
                $sql = "SELECT * FROM book_data WHERE book_name LIKE '%$search%' or author_name LIKE '%$search%'";
                $res = mysqli_query($con, $sql);
                
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        if(mysqli_num_rows($res)>0){
                            while($row = mysqli_fetch_assoc($res)){
                                ;


                               
                                
                               
                                
                            }
                        }else{
                            echo "no data found";
                        }
                        
                        
                    }
                } else {
                    echo "No data found";
                }
            }

            ?>

                <div class="input-group mx-auto d-flex justify-content-center">
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

                <?php

                include "conn/connection.php";

                $query = "SELECT * FROM book_data";
                $query_run = mysqli_query($con, $query);

                $check_faculty = mysqli_num_rows($query_run) > 0;

                if ($check_faculty) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        $id = $row['id'];
                    }
                } else {
                    echo "no record found";
                }

                ?>
                <!-- Existing book cards -->
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
                $query = "SELECT * FROM book_data ORDER BY book_name $sort_option";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {

                ?>
                        <div class="col mb-4">
                            <div class="card">
                                <img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="image" style="max-width: 100%; max-height: 300px;">

                                <div class="card-body bg-light">
                                    <h5 class="card-title"><?php echo $row['book_name']; ?></h5>
                                    <p class="card-text"><?php echo $row['author_name']; ?></p>
                                    <a href="book_details.php?id=<?php echo $row['id']; ?> "><button name="details" class="btn btn-primary">Read More</button></a>
                                </div>
                            </div>
                        </div>
                <?php

                    }
                } else {
                    echo "no record found";
                }

                ?>

            </div>
        </div>
        <?php
        // Define the total number of pages and the current page

        $records_per_page = 3;
        $total_pages = 3;

        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start_record = ($current_page - 1) * $records_per_page;
        $end_record = $start_record + $records_per_page - 1;

        ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php echo ($current_page == 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" tabindex="-1">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>
                <li class="page-item <?php echo ($current_page == $total_pages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a>
                </li>
            </ul>
        </nav>


    </main>


</body>

</html>