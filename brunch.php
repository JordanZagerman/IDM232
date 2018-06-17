<?php
	require "includes/db.php";

	// Our database name is example

	// Step 2: Preform Database Query
	// Projects is the name of our database table
	$table = "projects";
	// Selects all from that table, What you're ordering
    $query = "SELECT * FROM {$table} WHERE tag = 'brunch'";
	// Whatever comes back, the result of the order
	// Takes to parts connection and query
	$result = mysqli_query($connection, $query);

	// Check there are no errors with our SQL statement
	// If no result comes back, die 
	if (!$result) {
			die ("Database query failed.");
	}
?>

	<!DOCTYPE html>
	<html lang="en">
	<head><?php require "header.php";?>
		<title>Brunch</title>
	</head>

	<body>

		<div class="wrapper">
			<!-- HEADER NAVIGATION SEARCH-->
			<?php require "navigation.php";?>
			<!-- Will Use CSS Grid -->
			<div class="grid">


				<?php
				// Whhatever result came back one, row at a time do the following
				while ($row = mysqli_fetch_assoc($result)) {
			?>

					<!-- Each project will inculde a figure image and caption -->
					<div class="homepage-view">
						<!-- Link to single page -->
						<a href="single.php?id=<?php echo $row['id']; ?>">
							<img class="image-home" src="<?php echo $row['title_image']; ?>" alt="<?php echo $row['name']; ?>">
						</a>
						<!-- Caption is the title -->
						<h2 class="home-title" >
							<!-- More Obvious link to single page -->
							<a class=home-link-title href="single.php?id=<?php echo $row['id']; ?>">
								<?php echo $row['title']; ?>
							</a>
						</h2>

						<p class='home-subtitle'>
							<?php echo $row['subtitle']; ?>
						</p>
					</div>

					<?php
				}

				// Step 4: Release Returned Data
				mysqli_free_result($result);

				// Step 5: Close Database Connection
				mysqli_close($connection);
			?>
			</div>
		</div>
	</body>

	</html>