<?php
include "../conn/connection.php";

$search = isset($_POST['search']) ? $_POST['search'] : '';

// Determine sorting option
$sort_option = "";
if (isset($_POST['sort_alphabet'])) {
  if ($_POST['sort_alphabet'] == "a-z") {
    $sort_option = "ASC";
  } elseif ($_POST['sort_alphabet'] == "z-a") {
    $sort_option = "DESC";
  }
}

// Select only admin users
$sql = "SELECT * FROM user_registration WHERE (user_fname LIKE '%$search%' OR user_lname LIKE '%$search%' OR user_email LIKE '%$search%') AND user_role = 'admin'";

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
      <td class="fw-bold"><?php echo $row['id']; ?></td>
      <td class=" text-center"><?php echo $row['user_fname']; ?></td>
      <td class=" text-center"><?php echo $row['user_lname']; ?></td>
      <td class=" text-center"><?php echo $row['user_email']; ?></td>
      <td class=" text-center"><?php echo $row['status']; ?></td>
      <td class=" text-center"><?php echo $row['registration_time']; ?></td>
      <td>
        <?php
        if ($_SESSION['user_role'] == 'SuperAdmin' && $_SESSION['user_email'] != $row['user_email']) {
        ?>
          <button type="button" class="btn btn-danger deletebtn" data-id="<?php echo $row['id']; ?>">DELETE</button>
        <?php
        }
        ?>
      </td>






    </tr>
<?php
  }
}
?>