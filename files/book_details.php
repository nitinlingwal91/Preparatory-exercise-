<!DOCTYPE html>
<html lang="en">

<head>
	
	<?php include "links/link.php" ?>
	<style>
		<?php include "css/custom.css" ?>
	</style>
	<title>Book Detail</title>
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">E-LIBRARY</a>
			</div>

		</div>
	</nav>
	<div class="container">

		<?php

		include "conn/connection.php";

		$id = $_GET['id'];
		

		$sql = "SELECT * FROM book_data WHERE id = '$id' ";

		// Execute the query and store the result in a variable
		$result = mysqli_query($con, $sql);

		// Check if the query returned any results
		if (mysqli_num_rows($result) > 0) {
			// Fetch the details from the result and store them in variables
			$row = mysqli_fetch_assoc($result);
			$id = $row['id'];
			$folder = $row['img_url'];
			$name = $row['book_name'];
			$author = $row['author_name'];
			$description = $row['description'];
			
			

			// Display the details on the page using HTML and PHP code
			?>
			<img src="<?php echo $row['img_url']; ?>" class="card-img-top" alt="image" style="max-width: 70%; max-height: 400px;"><?php
			
			
			echo "<p>book Name: $name</p>";
			echo "<p>author Name: $author</p>";
			echo "<p>Description: $description</p>";
		} else {
			// Handle the case where no product was found with the specified ID
			?>
			<script>
				alert ("No details found");
			</script>
			<?php
		}


		?>
		
		<a href="edit_detail.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-info">Edit</button></a>
		<button type="button" class="btn btn-danger">Delete</button>
	</div>
</body>

</html>