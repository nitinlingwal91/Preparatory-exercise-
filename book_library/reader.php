<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "links/link.php" ?>
    <title>reader page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid fw-bold">
            <a class="navbar-brand fw-bold" href="#">E-Library</a>
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
                    <li>
                        <form class="d-flex ms-4">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav me-4">
                    <li class="nav-item dropdown me-4">

                        <a class="nav-link dropdown-toggle me-4" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu me-4 w-25 " aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Reader History</a></li>
                            <li><a class="dropdown-item" href="#"><button type="submit" name="submit" class="btn btn-primary">Logout</button></a></li>
                        </ul>
                    </li>
                </ul>
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



    

</body>

</html>