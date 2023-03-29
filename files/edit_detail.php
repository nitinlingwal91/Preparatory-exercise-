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
                                <h2 class="text-uppercase text-center mb-4">Edit Book Details</h2>
                                <?php
                                // Include database connection
                                include 'conn/connection.php';

                                // Check if form is submitted
                                if (isset($_POST['submit'])) {

                                    // Get form data
                                    $id = $_GET['id'];
                                    $book_name = $_POST['book_name'];
                                    $author_name = $_POST['author_name'];
                                    $description = $_POST['book_description'];
                                    $filename = $_FILES["img_url"]["name"];
                                    $tempname = $_FILES["img_url"]["tmp_name"];
                                    $folder = "images/" . $filename;
                                   


                                    // Check if image is uploaded
                                    if ($_FILES["img_url"]["name"] != "") {
                                        // Upload image to server
                                        move_uploaded_file($tempname, $folder);
                                    }

                                    // Update book details in database
                                    $query = "UPDATE book_data SET book_name='$book_name', author_name='$author_name', book_description='$description', img_url='$folder' WHERE id='$id'";
                                    $result = mysqli_query($con, $query);
                                    

                                    if ($result) {
                                        // Redirect to book details page
                                        header("Location: index.php?id=$id");
                                    } else {
                                        // Display error message
                                        echo "Error updating book details";
                                    }
                                }

                                // Get book ID from URL parameter
                                $id = $_GET['id'];

                                // Retrieve book details from database
                                $query = "SELECT * FROM book_data WHERE id='$id'";
                                $result = mysqli_query($con, $query);
                                $row = mysqli_fetch_assoc($result);

                                // Display book details form
                                ?>

                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="container col-md-12">
                                        <img id="frame" src="<?php echo $row['img_url']; ?>" class="w-100 h-50 " />
                                        <div class="mb-2">
                                            <label for="book_image" class="form-label"></label>
                                            <input type="file" class="form-control " id="book_image" name="img_url" onchange="preview()">

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
                                        <label for="author_name" class="form-label">Edit Author Name(Required*)</label>
                                        <input type="text" class="form-control" id="author_name" name="author_name" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="book_name" class="form-label">Edit Book Name(Required*)</label>
                                        <input type="text" class="form-control" id="book_name" name="book_name" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="description" class="form-label">Edit Description/About</label>
                                        <textarea class="form-control" id="description" name="book_description" rows="3"></textarea>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
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