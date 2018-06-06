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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $item['title'] ?></title>
	<link rel="stylesheet" href="screen.css">
</head>
<body>
	
	<!-- Different grid class for wider scalable view -->
	<div class="single">

		<div class="singleview">
		<figure class="single-img" >
				<img src="<?php echo $item['title_image']; ?>" alt="<?php echo $row['name']; ?>">

				<!-- Caption is the title -->
				<figcaption class='single-caption'>
					<?php echo $item['title']; ?>

					<figcaption class='single-caption'>
						<?php echo $item['subtitle']; ?>

				</figcaption>
		</figure>

		<figure class="single-img-ingredient" >
				<img src="<?php echo $item['ingredient_image']; ?>" alt="<?php echo $row['name']; ?>">

				<!-- Caption is the title -->
				<figcaption class='ingredient-caption'>
					<?php echo $item['ingredient_description']; ?>

				</figcaption>
		</figure>
		</div>

		<?php
			}
			mysqli_free_result($result);

			mysqli_close($connection);
		?>
	</div>
</body>
</html>