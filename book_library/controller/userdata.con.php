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
$sql = "SELECT * FROM user_registration WHERE user_fname LIKE '%$search%' OR user_lname LIKE '%$search%' OR user_email LIKE '%$search%'";
if (!empty($sort_option)) {
    $sql .= " ORDER BY user_fname $sort_option";
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
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['user_fname']; ?></td>
      <td><?php echo $row['user_lname']; ?></td>
      <td><?php echo $row['user_email']; ?></td>
      <td><?php echo $row['user_role']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <td><?php echo $row['registration_time']; ?></td>
      <td><button type="button" name="submit_edit" class="btn btn-success editbtn">Update</button></td>
      <td><button type="button" class="btn btn-danger deletebtn" data-id="<?php echo $row['id']; ?>">DELETE</button></td>
    </tr>
<?php
  }
}
?>



