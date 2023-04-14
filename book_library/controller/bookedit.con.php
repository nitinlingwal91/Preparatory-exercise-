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
$id = $row['id'];
?>

<div class="wrapper">
    <div class="form-left">
        <img id="frame" src="<?php echo $row['img_url']; ?>" class="w-100 h-75 " />

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
        <h2 class="text-uppercase ms-4">EDIT BOOK DETAILS</h2>
        <div class="row">
            <div class="mb-3 ms-4">
                <label>EDIT AUTHOR NAME</label>
                <input type="text" id="author_name" value="<?php echo $row['author_name'] ?>" name="author_name" class="input-field w-75" required>
            </div>
        </div>
        <div class=" mb-3 ms-4" style="width: 100%;">
            <label>EDIT BOOK NAME</label>
            <input type="text" id="book_name" value="<?php echo $row['book_name'] ?>" name="book_name" class="input-field w-75" required>
        </div>
        <div class="row">
            <div class=" mb-3 ms-4">
                <label>EDIT DESCRIPTION/ABOUT</label>
                <textarea class="input-field w-75" id="description" name="book_description"><?php echo $row['book_description'] ?></textarea>
            </div>

            <div class="mb-3 ms-4">
                <label>Change book cover</label>
                <input type="file" class="input-field w-75" id="book_image" value="<?php echo $row['img_url'];?>" name="uploadfile" onchange="preview()">
            </div>
            <div class="form-field ms-4">
                <input type="submit" value="SAVE" class="register" name="submit_save">
            </div>
        </div>
    </form>
</div>

</div>