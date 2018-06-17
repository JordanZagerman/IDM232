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
		<title>
			<?php echo $item['title'] ?>
		</title>
	</head>

	<body>

		<!-- Different grid class for wider scalable view -->


		<div class="wrapper">
			<!-- HEADER NAVIGATION SEARCH-->
			<?php require "navigation.php";?>

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
						<div class='single-ingredient-caption'>
							<?php echo $item['ingredient_description']; ?>
						</div>

						<!-- DESCRIPTIONS      DESCRIPTIONS      DESCRIPTIONS      DESCRIPTIONS      DESCRIPTIONS      -->
						<h3 class="description-title">Guess What?</h3>

						<p class=item-description>
							<?php echo $item['a_description']; ?>
						</p>

						<!-- INSTRUCTIONS     INSTRUCTIONS     INSTRUCTIONS     INSTRUCTIONS       -->
						<div>
							<ul class="instructions-list">

								<h3 class="steps-title">1</h3>
								<img class="single-image-ingredient" src="<?php echo $item['instructions_image_1']; ?>" alt="<?php echo $row['name']; ?>">
								<li class="instruction-text">
									<?php echo $item['instructions_1']; ?>
									<li>

										<h3 class="steps-title">2</h3>
										<img class="single-image-ingredient" src="<?php echo $item['instructions_image_2']; ?>" alt="<?php echo $row['name']; ?>">
										<li class="instruction-text">
											<?php echo $item['instructions_2']; ?>
											<li>

												<h3 class="steps-title">3</h3>
												<img class="single-image-ingredient" src="<?php echo $item['instructions_image_3']; ?>" alt="<?php echo $row['name']; ?>">
												<li class="instruction-text">
													<?php echo $item['instructions_3']; ?>
													<li>

														<h3 class="steps-title">4</h3>
														<img class="single-image-ingredient" src="<?php echo $item['instructions_image_4']; ?>" alt="<?php echo $row['name']; ?>">
														<li class="instruction-text">
															<?php echo $item['instructions_4']; ?>
															<li>

																<h3 class="steps-title">5</h3>
																<img class="single-image-ingredient" src="<?php echo $item['instructions_image_5']; ?>" alt="<?php echo $row['name']; ?>">
																<li class="instruction-text">
																	<?php echo $item['instructions_5']; ?>
																	<li>

																		<h3 class="steps-title">6</h3>
																		<img class="single-image-ingredient" src="<?php echo $item['instructions_image_6']; ?>" alt="<?php echo $row['name']; ?>">
																		<li class="instruction-text">
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