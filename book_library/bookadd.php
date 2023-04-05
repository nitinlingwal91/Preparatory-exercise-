<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "links/link.php" ?>
    <style>
        <?php include "css/bookadd.css" ?>
    </style>
    <title>add book</title>
</head>

<body>
    <?php
    include "conn/connection.php";

    if (isset($_POST['submit_save'])) {
        // Get the form data
        $book_id = mysqli_real_escape_string($con, $_POST['book_id']);
        $author_name = mysqli_real_escape_string($con, $_POST['author_name']);
        $book_name = mysqli_real_escape_string($con, $_POST['book_name']);
        $description = mysqli_real_escape_string($con, $_POST['book_description']);
        // Upload the book image to a directory on your server


        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "upload_images/" . $filename;


        move_uploaded_file($tempname, $folder);

        $num = "SELECT * FROM create_book WHERE book_id = '$book_id' OR book_name = '$book_name' OR author_name = '$author_name' OR img_url = '$folder'";
        $match = mysqli_query($con, $num);



        $bookdetail = mysqli_num_rows($match);



        if ($bookdetail > 0) {
    ?>
            <script>
                alert("book details alredy exists");
            </script>
            <?php
        } else {
            // Insert the book details into the database
            $sql = ("INSERT INTO create_book (book_id, author_name, book_name, img_url, book_description) VALUES ('$book_id', '$author_name', '$book_name', '$folder', '$description')");
            $query = mysqli_query($con, $sql);
            if ($query) {
            ?>
                <script>
                    alert("Book Data inserted successful");
                </script>
            <?php
                header("Location:admin.php");
            } else {
            ?>
                <script>
                    alert("Failed");
                </script>
    <?php
            }
        }
    }
    ?>


    <nav class="navbar navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold ms-md-4" href="#">ADMIN PANEL</a>
            <div class="d-flex justify-content-center">
                <a href="admin.php"><button type="submit" name="submit" class="btn btn-primary ">BACK TO LIST</button></a>
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

        <form class="form-right ms-4" action="" method="POST" enctype="multipart/form-data">
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