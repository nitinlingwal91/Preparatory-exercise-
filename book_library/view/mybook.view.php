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
                    <li class="nav-item">
                        <a class="nav-link " href="history.view.php">History</a>
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

    <main>
        <div class="container">
            <div class="row align-items-center mb-4 mt-4">
                <div class="col-md-8 d-flex flex-column align-items-center align-items-md-start fw-bold">
                    <h2>Welcome to E-Library</h2>
                </div>


            </div>
        </div>    
    </main>   

        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3" id="bookList">
                <!-- sorting and searching -->

                <?php include "../controller/mybook.con.php" ?>
            </div>
        </div>

    </main>
    <footer><?php include "footer.php"?></footer>
    
</body>
<script>
    document.getElementById("returnForm").addEventListener("submit", function(event) {
        if (!confirm("Are you sure you want to return this book?")) {
            event.preventDefault();
        }
    });
</script>

</html>