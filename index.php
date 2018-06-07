<?php
	require "includes/db.php";

	// Our database name is example

	// Step 2: Preform Database Query
	// Projects is the name of our database table
	$table = "projects";
	// Selects all from that table, What you're ordering
	$query = "SELECT * FROM {$table}";
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
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Black Apron</title>
	<link rel="stylesheet" href="screen.css">
</head>
<body>

	<!-- PUT A NAV / HEADER HERE -->
	<nav>
		<a href="index.php">HOME</a>
		<break>
  		<a href="help.php">HELP</a>
		<form class="search-bar" action="search.php" method="POST">
			<input type="text" name="search" placeholder="Search....">
			<button type="submit" name="submit-search">Search</button>
		</form>
	</nav>

	<!-- Will Use CSS Grid -->
	<div class="grid">

		
		<?php
			// Whhatever result came back one, row at a time do the following
			while ($row = mysqli_fetch_assoc($result)) {
		?>

			<!-- Each project will inculde a figure image and caption -->
			<div class="homepage-view">

				<!-- Using php to echo rows, alt tag is the name-->
				<figure class="figure-home">
					<img src="<?php echo $row['title_image']; ?>" alt="<?php echo $row['name']; ?>">

					<!-- Caption is the title -->
					<figcaption>
						<?php echo $row['title']; ?>
					</figcaption>
				</figure>

				<p class='home-description'>
					<?php echo $row['a_description']; ?></p>
				<p class=read-more>
					<!-- Grab ID -->
					<a href="single.php?id=<?php echo $row['id']; ?>">Read More&hellip;</a>
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

</body>
</html>