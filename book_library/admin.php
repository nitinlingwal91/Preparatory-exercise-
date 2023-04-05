<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "links/link.php" ?>
    <style>
        <?php include "css/admin.css" ?>
    </style>
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
                        <a class="nav-link" href="#">Book List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Admin List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reader List</a>
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
                            <li><a class="dropdown-item" href="#">Update Profile</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>