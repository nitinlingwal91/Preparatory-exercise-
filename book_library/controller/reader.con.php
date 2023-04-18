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

//calculation number of pages
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

//  search query with limits and execute it
$sql = "SELECT * FROM create_book";
if (!empty($search_query)) {
    $sql .= " WHERE book_name LIKE '%$search_query%' OR author_name LIKE '%$search_query%'";
}
if (!empty($sort_option)) {
    $sql .= " ORDER BY book_name $sort_option";
}
$sql .= " LIMIT $starting_limit, $results_per_page";
$result = mysqli_query($con, $sql);

//  Display the search results
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
?>
        <div class="col md-4 mb-4">
            <div class="card">
                <img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="image" style="max-width: 100%; max-height: 300px;">
                <div class="card-body bg-light book-card" style="width: 348x; height: 200px;">
                    <h5 class="card-title"><?php echo $row['book_name']; ?></h5>
                    <p class="card-text"><?php echo $row['author_name']; ?></p>
                    <p class="card-text">Book Id--<?php echo $row['book_id']; ?></p>
                    <a href="wishlist.con.php?id=<?php echo $id; ?>" class="btn btn-primary ">Add to Wishlist</a>
                </div>

            </div>
        </div>
<?php
    }
}
?>