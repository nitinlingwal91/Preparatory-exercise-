<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "links/link.php";
    ?>
    <style>
        <?php include "css/custom.css" ?>
    </style>
    <title>Add Book</title>
</head>

<body>

    <?php

    include "conn/connection.php";

    // Check if the form was submitted
    if (isset($_POST['submit_save'])) {
        // Get the form data
        $book_id = mysqli_real_escape_string($con, $_POST['book_id']);
        $author_name = mysqli_real_escape_string($con, $_POST['author_name']);
        $book_name = mysqli_real_escape_string($con, $_POST['book_name']);
        $description = mysqli_real_escape_string($con, $_POST['book_description']);
        // Upload the book image to a directory on your server

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/" . $filename;


        move_uploaded_file($tempname, $folder);

        $num = "SELECT * FROM book_data WHERE img_url = '$folder' OR book_id = '$book_id' OR book_name = '$book_name' OR book_description = '$description' ";
        $match = mysqli_query($con, $num);

        $bookcount = mysqli_num_rows($match);

        if ($bookcount > 0) {
        ?>
            <script>
                alert("book details alredy exists");
            </script>
            <?php
        } else {
            // Insert the book details into the database
            $sql = ("INSERT INTO book_data (book_id, author_name, book_name, img_url, book_description) VALUES ('$book_id', '$author_name', '$book_name', '$folder', '$description')");
            $query = mysqli_query($con, $sql);
            if ($query) {
            ?>
                <script>
                    alert("Book Data inserted successful");
                    header("location:index.php");
                </script>
            <?php
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
    <nav class="navbar navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold ms-md-4" href="#">E-LIBRARY</a>
            <div class="d-flex justify-content-center">
                <a href="index.php"><button type="submit" name="submit" class="btn btn-primary ">BACK TO LIST</button></a>
            </div>


        </div>
    </nav>
    <main>
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">

                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="container col-md-12">
                                        <img id="frame" src="" class="w-100 h-50 " />
                                        <div class="mb-2">
                                            <label for="book_image" class="form-label"></label>
                                            <input type="file" class="form-control " id="book_image" name="uploadfile" onchange="preview()">

                                        </div>
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
                                    <div class="mb-2">
                                        <label for="book_id" class="form-label">Enter Book Id (Required*)</label>
                                        <input type="text" class="form-control" id="book_id" name="book_id" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="author_name" class="form-label">Enter Author Name(Required*)</label>
                                        <input type="text" class="form-control" id="author_name" name="author_name" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="book_name" class="form-label">Enter Book Name(Required*)</label>
                                        <input type="text" class="form-control" id="book_name" name="book_name" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="description" class="form-label">Description/About</label>
                                        <textarea class="form-control" id="description" name="book_description" rows="3"></textarea>
                                    </div>

                                    <button type="submit" name="submit_save" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


</body>

</html>