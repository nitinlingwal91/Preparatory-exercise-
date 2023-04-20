<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<?php
include "../conn/connection.php";


$sort_option = "";
if (isset($_GET['sort_alphabet'])) {
    if ($_GET['sort_alphabet'] == "a-z") {
        $sort_option = "ASC";
    } elseif ($_GET['sort_alphabet'] == "z-a") {
        $sort_option = "DESC";
    }
}

$search_query = "";
if (isset($_GET['submit_search'])) {
    $search_query = $_GET['search_query'];
}


$results_per_page = 6;
$sql = "SELECT COUNT(*) as count FROM create_book";
if (!empty($search_query)) {
    $sql .= " WHERE book_name LIKE '%$search_query%' OR author_name LIKE '%$search_query%'";
}
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$total_results = $row['count'];
$total_pages = ceil($total_results / $results_per_page);


$page = isset($_GET['page']) ? $_GET['page'] : 1;
$starting_limit = ($page - 1) * $results_per_page;
$ending_limit = $starting_limit + $results_per_page;

$sql = "SELECT * FROM create_book";
if (!empty($search_query)) {
    $sql .= " WHERE book_name LIKE '%$search_query%' OR author_name LIKE '%$search_query%'";
}
if (!empty($sort_option)) {
    $sql .= " ORDER BY book_name $sort_option";
}
$sql .= " LIMIT $starting_limit, $results_per_page";
$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
?>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
            <div class="card">
                <img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="image" style="max-width: 100%; max-height: 300px;">
                <div class="card-body bg-light book-card" style="height: 200px;">
                    <h5 class="card-title text-center"><?php echo $row['book_name']; ?></h5>
                    <p class="card-text text-center"><?php echo $row['author_name']; ?></p>
                    <p class="card-text text-center">Book Id--<?php echo $row['book_id']; ?></p>
                    <div class="d-flex flex-column justify-content-between">
                        <div class=" text-center ">
                            <a href="../view/wishlist.view.php?id=<?php echo $id; ?>" class="btn btn-primary add-wishlist btn-sm float-left" onclick="wishlist('<?php $row['book_id'] ?>','add')" id="left" style="color:white" data-id="<?php echo $id; ?>"><i class="fas fa-heart"></i> Add to Wishlist</a>
                            
                            <a href="javascript:void(0)?id=<?php echo $id; ?>" class="btn btn-success add-wishlist btn-sm float-right" id="right" style="color: white" onclick="mark_as_read('<?php $row['book_id'] ?>','add')" data-id="<?php echo $id; ?>"><i class="fas fa-check"></i> Mark as Read</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
    }
}
?>