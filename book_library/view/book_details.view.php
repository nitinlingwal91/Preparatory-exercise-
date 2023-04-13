<?php include "../conn/session.php"?>
<?php include "../conn/connection.php"?>
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
                <a href="../view/issuebook.view.php"><button type="submit" name="submit" class="btn btn-primary ">BACK TO LIST</button></a>
            </div>

		</div>
	</nav>
	<div class="container">

		<?php

		

		$id = $_GET['id'];
		

		$sql = "SELECT * FROM create_book WHERE id = '$id' ";

		// Execute the query and store the result in a variable
		$result = mysqli_query($con, $sql);

		// Check if the query returned any results
		if (mysqli_num_rows($result) > 0) {
			
			$row = mysqli_fetch_assoc($result);
			$id = $row['id'];
			$folder = $row['img_url'];
			$name = $row['book_name'];
			$author = $row['author_name'];
			$description = $row['book_description'];

			
			?>
			<img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="image" name="img_url" style="max-width: 50%; max-height: 300px;"><?php
			
			
			echo "<p><span class='fw-bolder text-capitalize fs-3'>book Name</span>:   <span class='text-capitalize fs-4 fst-normal'>$name</span></p>";
			echo "<p><span class='fw-bolder text-capitalize fs-3'>author Name</span>: <span class='text-capitalize fs-4 fst-normal'>$author</span></p>";
			echo "<p><span class ='fw-bolder text-capitalize fs-3'>book_Description</span>: <span class='text-capitalize fs-4 fst-normal'>$description</span></p>";
		} else {
			// Handle the case where no product was found with the specified ID
			?>
			<script>
				alert ("No details found");
			</script>
			<?php
		}
		  ?>

		

	</div>
</body>

</html>