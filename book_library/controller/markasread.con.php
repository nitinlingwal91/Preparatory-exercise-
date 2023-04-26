<?php
include "../conn/connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mark_as_read'])) {
    $book_id = $_POST['book_id'];
    $user_email = $_SESSION['user_email'];

    $query = "SELECT * FROM create_book WHERE id='$book_id'";
    $result = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $author = $row['author'];
        $publisher = $row['publisher'];
        $genre = $row['genre'];
        $description = $row['description'];
        $image = $row['image'];

        $query = "SELECT * FROM book_read WHERE book_id='$book_id' AND user_email='$user_email'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {
            $read_status = $row['read_status'];
            if ($read_status == 'read') {
                $new_read_status = 'unread';
            } else {
                $new_read_status = 'read';

                $query = "INSERT INTO book_read (user_email, book_id, title, author, publisher, genre, description, image) VALUES ('$user_email', '$book_id', '$title', '$author', '$publisher', '$genre', '$description', '$image')";
                $result = mysqli_query($con, $query);
                if (!$result) {
                    echo '<script>alert("Error inserting data into book_read table!");</script>';
                }
            }
            $query = "UPDATE book_read SET read_status='$new_read_status' WHERE book_id='$book_id' AND user_email='$user_email'";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo '<script>alert("Book marked as ' . $new_read_status . '!"); window.location.href = window.location.href;</script>';
            } else {
                echo '<script>alert("Error marking book as ' . $new_read_status . '!");</script>';
            }
        } else {
            echo '<script>alert("Book not found in wishlist!");</script>';
        }
    } else {
        echo '<script>alert("Book not found!");</script>';
    }
}
?>

    
    