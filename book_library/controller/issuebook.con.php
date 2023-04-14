<?php
include "../conn/connection.php";

$search = isset($_GET['search']) ? $_GET['search'] : '';

// Determine sorting option
$sort_option = "";
if (isset($_GET['sort_alphabet'])) {
    if ($_GET['sort_alphabet'] == "a-z") {
        $sort_option = "ASC";
    } elseif ($_GET['sort_alphabet'] == "z-a") {
        $sort_option = "DESC";
    }
}

// Build SQL query with search and sort options
$sql = "SELECT issue_book.book_id, issue_book.user_name, issue_book.user_email, issue_book.book_name, issue_book.issue_date, issue_book.return_date, create_book.img_url 
        FROM issue_book 
        JOIN create_book 
        ON issue_book.book_id = create_book.book_id
        WHERE issue_book.book_name LIKE '%$search%' OR issue_book.user_email LIKE '%$search%' OR issue_book.user_name LIKE '%$search%'";
if (!empty($sort_option)) {
    $sql .= " ORDER BY issue_book.book_name $sort_option";
}
$result = mysqli_query($con, $sql);

// Pagination
$total_records = mysqli_num_rows($result);
$records_per_page = 6;
$total_pages = ceil($total_records / $records_per_page);
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;
$query = $sql . " LIMIT $offset, $records_per_page";
$query_run = mysqli_query($con, $query);

if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
?>
        <tr>
            <td><img src="<?= $row['img_url'] ?>" height="100px"></td>
            <td class=""><?php echo $row['book_id']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['user_email']; ?></td>
            <td><?php echo $row['book_name']; ?></td>
            <td><?php echo $row['issue_date']; ?></td>
            <td><?php echo $row['return_date']; ?></td>
            <td><button type="button" class="btn btn-danger deletebtn" data-id="<?php echo $row['book_id']; ?>">DELETE</button></td>
        </tr>

<?php
    }
}
?>
