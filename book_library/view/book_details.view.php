<?php include "../conn/session.php" ?>
<?php include "../conn/connection.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<?php include "../links/link.php" ?>
	<style>
		<?php include "../public/css/custom.css" ?>
	</style>
	<title>Book Detail</title>
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">E-LIBRARY</a>
			</div>
			<div class="d-flex justify-content-center">
				<a href="../view/mybook.view.php"><button type="submit" name="submit" class="btn btn-primary ">BACK TO LIST</button></a>
			</div>

		</div>
	</nav>
	<div class="container">
		<?php
		$book_id = $_GET['book_id'];
		$sql = "SELECT * FROM create_book WHERE book_id = '$book_id' ";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$book_id = $row['book_id'];
			$folder = $row['img_url'];
			$name = $row['book_name'];
			$author = $row['author_name'];
			$description = $row['book_description'];
		?>
			<div class="row">
				<div class="col-md-4">
					<img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="image" name="img_url" style="max-width: 100%; max-height: 600px;">
				</div>
				<div class="col-md-8">
					<p><span class='fw-bolder text-capitalize fs-3'>book Name</span>: <span class='text-capitalize fs-4 fst-normal'><?php echo $name; ?></span></p>
					<p><span class='fw-bolder text-capitalize fs-3'>author Name</span>: <span class='text-capitalize fs-4 fst-normal'><?php echo $author; ?></span></p>
					<p><span class='fw-bolder text-capitalize fs-3'>book_Description</span>: <span class='text-capitalize fs-4 fst-normal'><?php echo $description; ?></span></p>
				</div>
			</div>
		<?php
		} else {
		?>
			<script>
				alert("No details found");
			</script>
		<?php
		}
		?>
	</div>

	<?php include "footer.php"?>
</body>

</html>