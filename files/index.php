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
            <form class="d-flex justify-content-center align-item-center w-50">
                <div class="input-group d-flex justify-content-end ">

                    <?php
                    include "conn/connection.php";
                    if (isset($_POST['search'])){ 

                    $book_name = $_GET['book_name'];
                    $author_name = $_GET['author_name'];

                    // Query the database for books and authors
                    $mysqli = "SELECT * FROM book_data WHERE book_name LIKE '$book_name' OR author_name LIKE '$author_name'";
                    $result = mysqli_query($con, $mysqli);

                    // Display the search results to the user
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<p>" . $row['book_name'] . " by " . $row['author_name'] . "</p>";
                    }
                }



                    ?>
                    <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="search-addon">
                    <button type="button" name="search" class="btn btn-secondary "><i class="bi-search"></i></button>
                </div>
            </form>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end " id="navbarCollapse">
                <div class="d-flex justify-content-center">
                    <a href="logout.php"><button type="submit" name="submit" class="btn btn-primary btn-block btn-m gradient-custom-4 text-body">Logout</button></a>
                </div>
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
                        $id =$row['id'];

                ?>
                        <!-- Existing book cards -->
                        <div class="col mb-4">
                            <div class="card ">
                                <img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="image" style="max-width: 100%; max-height: 300px;">
                                
                                <div class="card-body bg-light">
                                    <h5 class="card-title"><?php echo $row['book_name']; ?></h5>
                                    <p class="card-text"><?php echo $row['author_name']; ?></p>
                                    <a href="book_details.php?id=<?php echo $id;?> "><button name="details" class="btn btn-primary">Read More</button></a>
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
    </main>


</body>

</html>