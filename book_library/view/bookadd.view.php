<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../links/link.php" ?>
    <style>
        <?php include "../public/css/bookadd.css" ?>
    </style>
    <title>add book</title>
</head>

<body>
    <nav class="navbar navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold ms-md-4" href="#">ADMIN PANEL</a>
            <div class="d-flex justify-content-center">
                <a href="../view/booklist.view.php"><button type="button" name="submit" class="btn btn-primary ">BACK TO LIST</button></a>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="form-left">
            <img id="frame" src="" class="w-100 h-75 " />

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

        <form class="form-right ms-4" action="../controller/bookadd.con.php" method="POST" enctype="multipart/form-data">
            <h2 class="text-uppercase ms-4">ADD BOOK FORM</h2>
            <div class="row">
                <div class=" mb-3 ms-4">
                    <label>BOOK ID</label>
                    <input type="text" class="input-field w-75" id="book_id" name="book_id" required>
                </div>
                <div class="mb-3 ms-4">
                    <label>AUTHOR NAME</label>
                    <input type="text" id="author_name" name="author_name" class="input-field w-75" required>
                </div>
            </div>
            <div class=" mb-3 ms-4" style="width: 100%;">
                <label>BOOK NAME</label>
                <input type="text" id="book_name" name="book_name" class="input-field w-75" required>
            </div>
            <div class="row">
                <div class=" mb-3 ms-4">
                    <label>DESCRIPTION/ABOUT</label>
                    <textarea class="input-field w-75" id="description" name="book_description"></textarea>
                </div>

                <div class="mb-3 ms-4">
                    <label>upload image</label>
                    <input type="file" class="input-field w-75" id="book_image" name="uploadfile" onchange="preview()">

                </div>
                <div class="form-field ms-4">
                    <input type="submit" value="SAVE" class="register" name="submit_save">
                </div>
        </form>
    </div>




</body>

</html>