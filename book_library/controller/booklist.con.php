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
$sql = "SELECT * FROM create_book WHERE author_name LIKE '%$search%' OR book_name LIKE '%$search%'";
if (!empty($sort_option)) {
    $sql .= " ORDER BY book_name $sort_option";
}
$result = mysqli_query($con, $sql);

// Pagination
$total_records = mysqli_num_rows($result);
$records_per_page = 5;
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
            <td><?php echo $row['book_id']; ?></td>
            <td><?php echo $row['author_name']; ?></td>
            <td><?php echo $row['book_name']; ?></td>
            <td>
                <?php
                $book_description = $row['book_description'];
                if (strlen($book_description) > 100) {
                    $book_description = substr($book_description, 0, 100) . '...';
                    echo $book_description;
                    echo '<a href="#" data-toggle="modal" data-target="#bookDescriptionModal' . $row['id'] . '">Read More</a>';
                } else {
                    echo $book_description;
                }
                ?>
            </td>
            <td><?php echo $row['img_url']; ?></td>
            <td><a href="../view/bookedit.view.php?id=<?php echo $row['id'] ?>"><button type="submit_edit" class="btn btn-success">EDIT</button></a></td>
            <td><button type="button" class="btn btn-danger deletebtn" data-id="<?php echo $row['book_id']; ?>">DELETE</button></td>
        </tr>

        <!-- description modal start -->
        <div class="modal fade " id="bookDescriptionModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="bookDescriptionModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookDescriptionModalLabel<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo $row['book_description']; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- description modal end -->

<?php
    }
}
?>