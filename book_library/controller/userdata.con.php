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

$sql = "SELECT * FROM user_registration WHERE user_fname LIKE '%$search%' OR user_lname LIKE '%$search%' OR user_email LIKE '%$search%' OR user_role LIKE '%$search%'";
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
      <td class=" text-center"><?php echo $row['user_role']; ?></td>
      <td class=" text-center"><?php echo $row['status']; ?></td>
      <td class=" text-center"><?php echo $row['registration_time']; ?></td>
      <td>
        <button type="button" class="btn btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="<?= $row['id']; ?>">Update</button>
      </td>
      <td>
        <button type="button" class="btn btn-danger deletebtn" data-id="<?php echo $row['id']; ?>">DELETE</button>
      </td>
    </tr>
<?php
  }
}
?>
<?php
include "../controller/update.con.php"
?>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../controller/update.con.php" method="POST">
        <div class="modal-body">
          <label for="edit_fname" class="form-label mb-2">Id</label>
          <input type="text" name="id" value="<?= $row['id']; ?>">
          <div class="mb-3">
            <label for="edit_fname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="edit_fname" name="user_fname" value="<?php echo $row['user_fname']; ?>">
          </div>
          <div class="mb-3">
            <label for="edit_lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="edit_lname" name="user_lname" value="<?= $row['user_lname']; ?>">
          </div>
          <div class="mb-3">
            <label for="edit_email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="edit_email" name="user_email" value="<?= $row['user_email']; ?>">
          </div>
          <div class="mb-3">
            <label for="user_role" class="form-label">Role</label>
            <select class="form-select" id="role" name="user_role">
              <option value="">--Select Role--</option>
              <option value="Admin" <?= ($row['user_role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
              <option value="Reader" <?= ($row['user_role'] == 'Reader') ? 'selected' : ''; ?>>Reader</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="saveuserdetails" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>