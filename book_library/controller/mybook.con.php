<?php
include "../conn/connection.php";

$user_email = $_SESSION['user_email'];


$sql = "SELECT cb.book_id, cb.book_name, cb.author_name, cb.book_description, cb.img_url, ib.status 
        FROM create_book cb 
        JOIN issue_book ib ON cb.book_id = ib.book_id 
        WHERE ib.status = 'approved' AND ib.user_email = '$user_email'";


$sort_option = "";
if (isset($_GET['sort_alphabet'])) {
    if ($_GET['sort_alphabet'] == "a-z") {
        $sort_option = " ORDER BY cb.book_name ASC";
    } elseif ($_GET['sort_alphabet'] == "z-a") {
        $sort_option = " ORDER BY cb.book_name DESC";
    }
}


$search_query = "";
if (isset($_GET['submit_search'])) {
    $search_query = $_GET['search_query'];
    $sql .= " AND (cb.book_name LIKE '%$search_query%' OR cb.author_name LIKE '%$search_query%')";
}


$results_per_page = 6;
$result = mysqli_query($con, $sql);
$total_results = mysqli_num_rows($result);
$total_pages = ceil($total_results / $results_per_page);


$page = isset($_GET['page']) ? $_GET['page'] : 1;
$starting_limit = ($page - 1) * $results_per_page;
$ending_limit = $starting_limit + $results_per_page;
$sql .= $sort_option . " LIMIT $starting_limit, $results_per_page";
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
                        <a href="../view/book_details.view.php?book_id=<?php echo $row['book_id']; ?>" class="btn btn-danger ">Read Book</a>
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