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
    
    $sql = "SELECT * FROM `book_data` where `id` = '$id' ";
    $result = mysqli_query($con,$sql);

    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    
    

    if($num >0){
        {
           if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $author = $_POST['author_name'];
        $book_name = $_POST['book_name'];
        $description = $_POST['description'];
        
       
        
        $sql = "UPDATE `book_data` SET author_name='$author', book_name='$book_name', description='$description' WHERE id='$id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
          ?>
          <script>
            alert ('data updated successful');
          </script>
          <?php
        } else {
          echo "Error updating details: ";
        }
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
                                <h2 class="text-uppercase text-center mb-4">Edit Book Details</h2>

                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="container col-md-12">
                                        <img id="frame"  src="<?php echo $folder?>" class="w-100 h-50 " />
                                        <div class="mb-2">
                                            <label for="book_image" class="form-label">change image</label>
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
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="mb-2">
                                        <label for="author_name" class="form-label">Edit Author Name(Required*)</label>
                                        <input type="text" class="form-control" id="author_name" value="" name="author_name" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="book_name" class="form-label">Edit Book Name(Required*)</label>
                                        <input type="text" class="form-control" id="book_name" value="" name="book_name" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="description" class="form-label">Description/About</label>
                                        <textarea class="form-control" id="description" name="description"> </textarea>
                                    </div>

                                    <a href=""><button type="submit" name="update" class="btn btn-primary">Save</button></a>

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