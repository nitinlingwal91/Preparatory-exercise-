<?php
    include "../conn/connection.php";

    if (isset($_POST['submit_save'])) {
        $book_id = mysqli_real_escape_string($con, $_POST['book_id']);
        $author_name = mysqli_real_escape_string($con, $_POST['author_name']);
        $book_name = mysqli_real_escape_string($con, $_POST['book_name']);
        $description = mysqli_real_escape_string($con, $_POST['book_description']);

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../upload_images/" . $filename;

        move_uploaded_file($tempname, $folder);

        $num = "SELECT * FROM create_book WHERE book_id = '$book_id' OR book_name = '$book_name' OR author_name = '$author_name' OR img_url = '$folder'";
        $match = mysqli_query($con, $num);

        $bookdetail = mysqli_num_rows($match);

        if ($bookdetail > 0) {
            echo'<script>alert("book details alredy exists");</script>';
           
            header("Location: ../view/booklist.view.php");
        } else {
            $sql = ("INSERT INTO create_book (book_id, author_name, book_name, img_url, book_description) VALUES ('$book_id', '$author_name', '$book_name', '$folder', '$description')");
            $query = mysqli_query($con, $sql);
            if ($query) {
            echo '<script>alert"Book Data Inserted Successfully"window.location.href= "../view/booklist.view.php"';
                header("Location: ../view/booklist.view.php");
            } else {
                echo '<script>alert"failed";</script>';
                header("Location: ../controller/bookadd.con.php");
            }
        }
    }
    ?>
