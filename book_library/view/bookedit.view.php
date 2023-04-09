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
                <a href="booklist.php"><button type="submit" name="submit" class="btn btn-primary ">BACK TO LIST</button></a>
            </div>
        </div>
    </nav>

    

    <div class="wrapper">
        <div class="form-left">
            <img id="frame" src="<?php echo $row['img_url']; ?>" class="w-100 h-75 " />

            <script>
                function preview() {
                    frame.src = URL.createObjectURL(event.target.files[0]);
                }

                function clearImage() {
                    document.getElementById('formFile').value = null;
                    frame.src = "";
                }
            </script>
        </div>

        <form class="form-right ms-4" action="" method="POST" enctype="multipart/form-data">
            <h2 class="text-uppercase ms-4">EDIT BOOK DETAILS</h2>
            <div class="row">
                <div class="mb-3 ms-4">
                    <label>EDIT AUTHOR NAME</label>
                    <input type="text" id="author_name" name="author_name" class="input-field w-75" required>
                </div>
            </div>
            <div class=" mb-3 ms-4" style="width: 100%;">
                <label>EDIT BOOK NAME</label>
                <input type="text" id="book_name" name="book_name" class="input-field w-75" required>
            </div>
            <div class="row">
                <div class=" mb-3 ms-4">
                    <label>EDIT DESCRIPTION/ABOUT</label>
                    <textarea class="input-field w-75" id="description" name="book_description"></textarea>
                </div>

                <div class="mb-3 ms-4">
                    <label>Change book cover</label>
                    <input type="file" class="input-field w-75" id="book_image" name="uploadfile" onchange="preview()">

                </div>
                <div class="form-field ms-4">
                    <input type="submit" value="SAVE" class="register" name="submit_save">
                </div>
        </form>
    </div>




</body>

</html>