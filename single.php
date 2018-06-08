<?php 
	require_once 'includes/db.php';
  // Get the `id` from the URL parameter.
  $id = isset($_GET['id']) ? $_GET['id'] : null;

  // If no parameter is provided, redirect to the home page.
  if (!$id) redirect_to('index.php');
  else {
    // Parameter is provided.
    // Look for a matching ID in the database.
    $query = 'SELECT * ';
    $query .= 'FROM projects ';
    $query .= "WHERE id = '{$id}' ";
    $query .= 'LIMIT 1';

    $result = mysqli_query($connection, $query);

		if (!$result) {
		die('Database query failed.');
		}
	}
?>

<?php
	
	while ($item = mysqli_fetch_assoc($result))
	{
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php require "header.php";?>
		<title><?php echo $item['title'] ?></title>
	</head>

	<body>

		<!-- Different grid class for wider scalable view -->


		<div class="wrapper">
			<ul class="navigation">
				<li>
					<a href="index.php">HOME</a>
				</li>
				
				<li>
					<a class=help-link href="help.php">HELP</a>
				</li>
			</ul>

			<form class="search-bar" action="search.php" method="POST">
				<input type="text" name="search" placeholder="Search....">
				<button type="submit" name="submit-search">Search</button>
			</form>

			<div class="single-wrapper">
				<!--   DISH TITLE      DISH TITLE      DISH TITLE      DISH TITLE      DISH TITLE   -->
				<h1 class='single-caption'>
					<?php echo $item['title']; ?>
				</h1>


				<!--  TITLE IMAGE    TITLE IMAGE    TITLE IMAGE    TITLE IMAGE    TITLE IMAGE    TITLE IMAGE  -->
				<img class="single-title-image" src="<?php echo $item['title_image']; ?>" alt="<?php echo $row['name']; ?>">


				<!-- SUB TITLE    SUB TITLE    SUB TITLE    SUB TITLE    SUB TITLE    SUB TITLE     -->
				<h2 class='single-caption-subtitle'>
					<?php echo $item['subtitle']; ?>
				</h2>
				<break>
					<break>
						<!-- center wrapper div -->
						<div>
							<h3 class="ingredients-title">Ingredients</h3>

							<!-- INGREDIENT IMAGE     INGREDIENT IMAGE     INGREDIENT IMAGE     INGREDIENT IMAGE     -->
							<img class="single-image-ingredient" src="<?php echo $item['ingredient_image']; ?>" alt="<?php echo $row['name']; ?>">

						</div>
						<!--      INGREDIENTS CAPTION     INGREDIENTS CAPTION     INGREDIENTS CAPTION     INGREDIENTS CAPTION    -->
						<p class='single-ingredient-caption'>
							<?php echo $item['ingredient_description']; ?>
						</p>

						<!-- DESCRIPTIONS      DESCRIPTIONS      DESCRIPTIONS      DESCRIPTIONS      DESCRIPTIONS      -->
						<p class=item-description>
							<?php echo $item['a_description']; ?>
						</p>

						<!-- INSTRUCTIONS     INSTRUCTIONS     INSTRUCTIONS     INSTRUCTIONS       -->
						<div>
							<ul class="instructions-list">
								<li>
									<?php echo $item['instructions_1']; ?>
									<li>
										<li>
											<?php echo $item['instructions_2']; ?>
											<li>
												<li>
													<?php echo $item['instructions_3']; ?>
													<li>
														<li>
															<?php echo $item['instructions_4']; ?>
															<li>
																<li>
																	<?php echo $item['instructions_5']; ?>
																	<li>
																		<li>
																			<?php echo $item['instructions_6']; ?>
																			<li>
							</ul>
						</div>

			</div>

			<?php
			}
			mysqli_free_result($result);

			mysqli_close($connection);
		?>
		</div>
	</body>

	</html>