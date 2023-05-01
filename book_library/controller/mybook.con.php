<?php
include "../conn/connection.php";

$user_email = $_SESSION['user_email'];
$sql = "SELECT cb.book_id, cb.book_name, cb.author_name, cb.book_description, cb.img_url, ib.status 
        FROM create_book cb 
        JOIN issue_book ib ON cb.book_id = ib.book_id 
        WHERE ib.status = 'approved' AND ib.user_email = '$user_email'";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['book_id'];
?>
        <div class="col md-4 mb-4">
            <div class="card">
                <img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="image" style="max-width: 100%; max-height: 300px;">
                <div class="card-body bg-light book-card" style="width: 348x; height: 200px;">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title"><?php echo $row['book_name']; ?></h5>
                        <p class="card-text"><?php echo $row['author_name']; ?></p>
                    </div>

                    <div class="d-flex justify-content-end ">
                        <a href="../view/book_details.view.php?book_id=<?php echo $row['book_id']; ?>" class="btn btn-danger mr-2">Read Book</a>
                        <form method="POST" id="returnForm">
                            <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                            <button type="submit" class="btn btn-primary">Return Book</button>
                        </form>

                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $book_id = $_POST['book_id'];

                            $sql_update = "UPDATE issue_book SET status = 'returned' WHERE book_id = '$book_id' AND user_email = '$user_email' AND status = 'approved'";
                            if (mysqli_query($con, $sql_update)) {
                                echo '<script>alert("Book returned successfully.");</script>';
                            } else {

                                echo '<script>alert("Error returning book. Please try again later.");</script>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo "No books found.";
}
?>