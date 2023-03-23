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

    $id = $_GET['id'];



    $sql = "SELECT * FROM book_data WHERE id = '$id' ";

    // Execute the query and store the result in a variable
    $result = mysqli_query($con, $sql);

    // Check if the query returned any results
    if (mysqli_num_rows($result) > 0) {
        // Fetch the details from the result and store them in variables
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $folder = $row['img_url'];
        $name = $row['book_name'];
        $author = $row['author_name'];
        $description = $row['description'];
    } else {
           echo "error";
        }

        if (isset($_POST['submit_save'])) {
            $id = $_POST['id'];
            $name = $_POST['book_name'];
            $folder = $row['img_url'];
            $author = $_POST['author_name'];
            $description = $row['description'];
            $sql = "UPDATE book_data SET book_name='$name', author_name='$author', img_url = '$folder', description = '$description', WHERE $id'";
            if (mysqli_query($con, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($con);
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
                                <h2 class="text-uppercase text-center mb-4">Edit Book Details</h2>

                                <form action="" method="GET" enctype="multipart/form-data">
                                    <div class="container col-md-12">
                                        <img id="frame" src="<?php echo $folder; ?>" class="w-100 h-50 " />
                                        <div class="mb-2">
                                            <label for="book_image" class="form-label">change image</label>
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
                                        <label for="author_name" class="form-label">Edit Author Name(Required*)</label>
                                        <input type="text" class="form-control" id="author_name" value="<?php echo "$author" ?>" name="author_name" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="book_name" class="form-label">Edit Book Name(Required*)</label>
                                        <input type="text" class="form-control" id="book_name" value="<?php echo "$name" ?>" name="book_name" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="description" class="form-label">Description/About</label>
                                        <textarea class="form-control" id="description" name="description"><?php echo "$description" ;?><rows="3"></textarea>
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