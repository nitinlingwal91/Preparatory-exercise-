<?php include "../conn/session.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../links/link.php" ?>
    <style>
        <?php include "../public/css/bookadd.css" ?>
    </style>
    <title>Edit book</title>
</head>

<body>

    <nav class="navbar navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold ms-md-4" href="#">ADMIN PANEL</a>
            <div class="d-flex justify-content-center">
                <a href="booklist.view.php"><button type="submit" name="submit" class="btn btn-primary ">BACK TO LIST</button></a>
            </div>
        </div>
    </nav>

    <?php include "../controller/bookedit.con.php"?>

  




</body>

</html>