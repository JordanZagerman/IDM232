<?php
    require "includes/db.php";
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
<h1>Search Page</h1>

<div class="article-container">
    <?php

        if (isset($_POST['submit-search'])) {
            $table = "projects";
            $search_text = $_POST['search'];

            // $search = mysql_real_escape_string('$search_text'  );
            
            
            $sql = "SELECT * 
            FROM {$table} 
            WHERE title = '$search_text' 
            OR a_description = '$search_text'
            ";
   
            $result = mysqli_query($connection, $sql);

            $queryResult = mysqli_num_rows($result);

            if ($queryResult > 0) {
                while ($row=mysqli_fetch_assoc($result)) {
                   echo "<div class = 'article-box'>
                   <h3>".$row['title']."</h3>
                   <p>".$row['a_description']."</p>
                   <p>".$row['subtitle']."</p>
                   <p>".$row['id']."</p>
                   </div>";
                echo $row['title'];
                }

            } else {
                echo "There are no results for your search.";
            }
        }

    ?>


</div>
</body>
</html>