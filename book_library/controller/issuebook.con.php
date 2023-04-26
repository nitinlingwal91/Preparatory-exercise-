<?php

include "../conn/connection.php";

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sort_option = "";
if (isset($_GET['sort_alphabet'])) {
    if ($_GET['sort_alphabet'] == "a-z") {
        $sort_option = "ASC";
    } elseif ($_GET['sort_alphabet'] == "z-a") {
        $sort_option = "DESC";
    }
}

$sql = "SELECT issue_book.book_id, issue_book.user_name, issue_book.user_email, issue_book.book_name, issue_book.issue_date, issue_book.return_date, issue_book.status, create_book.copies_available, create_book.img_url 
        FROM issue_book 
        JOIN create_book 
        ON issue_book.book_id = create_book.book_id
        WHERE issue_book.book_name LIKE '%$search%' OR issue_book.book_id LIKE '%$search%' OR issue_book.user_name LIKE '%$search%'";
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
        $return_date_timestamp = strtotime($row['return_date']);
        $current_timestamp = time();
        $status = $row['status'];

        if ($return_date_timestamp <= $current_timestamp && $status == 'approved') {
            $sql_update = "UPDATE issue_book SET status='pending' WHERE book_id = '{$row['book_id']}' AND user_email = '{$row['user_email']}' AND status = 'approved'";
            mysqli_query($con, $sql_update);
            continue;
        }
?>
        <tr>
            <td><img src="<?= $row['img_url'] ?>" height="100px"></td>
            <td><?php echo $row['book_id']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['user_email']; ?></td>
            <td><?php echo $row['book_name']; ?></td>
            <td><?php echo $row['issue_date']; ?></td>
            <td><?php echo $row['return_date']; ?></td>
            <td><?php echo $row['status']; ?></td>

            <td>
                <form action="../controller/bookrequest.con.php" method="POST">
                    <input type="hidden" name="book_request_id" value="<?php echo $row['book_id']; ?>">
                    <select name="status" class="btn btn-primary" onchange="this.form.submit()">
                        <?php
                        $status = $row['status'];
                        if ($status == 'approved') {
                            $book_id = $row['book_id'];
                            $copies_available = $row['copies_available'];

                            if ($copies_available > 0) {
                                $copies_available -= 1;
                            }

                            $update_create_book_sql = "UPDATE create_book SET copies_available = '$copies_available' WHERE book_id = '$book_id'";
                            mysqli_query($con, $update_create_book_sql);

                            echo '<option value="approved" selected>Approved</option>';
                            echo '<option value="rejected">Rejected</option>';
                        } elseif ($status == 'rejected') {
                            $book_id = $row['book_id'];
                            $copies_available = $row['copies_available'];

                            if ($copies_available == 0 && $copies_available <= 1) {
                                $copies_available += 1;
                            }

                            $update_create_book_sql = "UPDATE create_book SET copies_available = '$copies_available' WHERE book_id = '$book_id'";
                            mysqli_query($con, $update_create_book_sql);

                            echo '<option value="approved">Approved</option>';
                            echo '<option value="rejected" selected>Rejected</option>';
                        } elseif ($status == 'pending') {

                            $book_id = $row['book_id'];
                            $copies_available = $row['copies_available'];

                            $update_create_book_sql = "UPDATE create_book SET copies_available = '$copies_available' WHERE book_id = '$book_id'";
                            mysqli_query($con, $update_create_book_sql);


                            echo '<option value="" disabled selected>Select status</option>';
                            echo '<option value="approved">Approved</option>';
                            echo '<option value="rejected">Rejected</option>';
                        } else {
                            if ($status == 'returned') {
                                $book_id = $row['book_id'];
                                $copies_available = $row['copies_available'];

                                if ($copies_available == 0 && $copies_available <= 1) {
                                    $copies_available += 1;
                                }

                                $update_create_book_sql = "UPDATE create_book SET copies_available = '$copies_available' WHERE book_id = '$book_id'";
                                mysqli_query($con, $update_create_book_sql);

                                echo '<option value="" disabled selected>Select status</option>';
                            echo '<option value="approved">Approved</option>';
                            echo '<option value="rejected">Rejected</option>';
                            }
                        }
                        ?>
                    </select>
                </form>


            </td>

            <td><button type="button" class="btn btn-danger deletebtn" data-id="<?php echo $row['book_id']; ?>">DELETE</button></td>
        </tr>

<?php
    }
}
?>