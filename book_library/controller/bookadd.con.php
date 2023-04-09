<?php
    include "../conn/connection.php";

    if (isset($_POST['submit_save'])) {
        // Get the form data
        $book_id = mysqli_real_escape_string($con, $_POST['book_id']);
        $author_name = mysqli_real_escape_string($con, $_POST['author_name']);
        $book_name = mysqli_real_escape_string($con, $_POST['book_name']);
        $description = mysqli_real_escape_string($con, $_POST['book_description']);
        // Upload the book image to a directory on your server


        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../upload_images/" . $filename;


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
                header("Location:booklist.php");
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
