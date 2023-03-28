<!DOCTYPE html>
<html>
<head>
	<title>Product Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Product Details</h1>

		<?php
		// Connect to database
		$config = parse_ini_file('../../../private/db-config.ini');
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Check if product ID is set in URL parameter
		if(isset($_GET['productId'])) {
			// Prepare statement and bind parameters
			$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
			$stmt->bind_param("i", $productId);

			// Set parameter values and execute statement
			$productId = $_GET['productId'];
			$stmt->execute();

			// Get result and display product details
			$result = $stmt->get_result();

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$productName = $row['name'];
				$productPrice = $row['price'];
				$productImage = $row['image'];
				$productCategory = $row['category'];
				$productStock = $row['stock'];
				$productDescription = $row['description'];

				// Display product details
				echo '<div class="card mt-3">';
				echo '<img class="card-img-top product-image" src="' . $productImage . '" alt="' . $productName . '">';
				echo '<div class="card-body">';
				echo '<h2 class="card-title product-title">' . $productName . '</h2>';
				echo '<p class="card-text product-description">' . $productDescription . '</p>';
				echo '<div class="product-details">';
				echo '<ul class="list-group list-group-flush">';
				echo '<li class="list-group-item"><strong>Category:</strong> ' . $productCategory . '</li>';
				echo '<li class="list-group-item"><strong>Price:</strong> $' . $productPrice . '</li>';
				echo '<li class="list-group-item"><strong>Stock:</strong> ' . $productStock . '</li>';
				echo '</ul>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			} else {
				echo '<div class="alert alert-danger mt-3" role="alert">Product not found!</div>';
			}

			$stmt->close();
		} else {
			echo '<div class="alert alert-danger mt-3" role="alert">Product ID not specified in URL parameter.</div>';
		}

		$conn->close();
		?>

	</div>
</body>
</html>
