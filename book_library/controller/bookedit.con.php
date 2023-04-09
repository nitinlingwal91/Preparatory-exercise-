<?php
    include "../conn/connection.php";

    if (isset($_POST['submit_save'])) {
        // Get the form data
        $id = $_GET['id'];
        $author_name = mysqli_real_escape_string($con, $_POST['author_name']);
        $book_name = mysqli_real_escape_string($con, $_POST['book_name']);
        $description = mysqli_real_escape_string($con, $_POST['book_description']);
        // Upload the book image to a directory on your server


        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../upload_images/" . $filename;

        // checking if image is upload
        if ($_FILES["uploadfile"]["name"] != "") {
            move_uploaded_file($tempname, $folder);
        }
        // updating book detail in database
        $query = "UPDATE create_book SET book_name = '$book_name', author_name = '$author_name', book_description = '$description', img_url='$folder' WHERE id='$id'";
        $result = mysqli_query($con, $query);



        if ($result) {
            
            echo '<script>alert("Book Details Edited successfully");</script>';
            
        } else {
            // Display error message
            echo '<script>alert("Error updating book details");</script>';
        }
    }

    $id = $_GET['id'];

    // Retrieve book details from database
    $query = "SELECT * FROM create_book WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    ?>
