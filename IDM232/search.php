<?php
    require "includes/db.php";
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require "header.php";?>
        <title>Off White Apron</title>
    </head>

    <body>
        <!-- PUT A NAV / HEADER HERE -->
        <?php require "navigation.php";?>
        <h1 class="search-title">Findings</h1>

        <!-- All Search Results appear here -->
        <div class="grid">

            <?php

            if (isset($_POST['submit-search'])) {
                $table = "projects";
                $search_text = $_POST['search'];

                // All text entered to lowercase, because the search is case sensitive to uppercase
                $search_text = strtolower($search_text);

                        
                $sql = "SELECT * FROM $table
                WHERE title LIKE '%$search_text%'
                OR subtitle LIKE '%$search_text%'
                OR a_description LIKE '%$search_text%'
                OR ingredient_description LIKE '%$search_text%'
                OR instructions_1 LIKE '%$search_text%'
                OR instructions_2 LIKE '%$search_text%'
                OR instructions_3 LIKE '%$search_text%'
                OR instructions_4 LIKE '%$search_text%'
                OR instructions_5 LIKE '%$search_text%'
                OR instructions_6 LIKE '%$search_text%'
                OR tag LIKE '%$search_text%'
                ";
    
                $result = mysqli_query($connection, $sql);

                $queryResult = mysqli_num_rows($result);

                // If there are any Results
                if ($queryResult > 0) {
                    while ($row=mysqli_fetch_assoc($result)) {
                        ?>

                <div class="homepage-view">
                    <!-- Link to single page -->
                    <a href="single.php?id=<?php echo $row['id']; ?>">
                        <img class="image-home" src="<?php echo $row['title_image']; ?>" alt="<?php echo $row['name']; ?>">
                    </a>
                    <!-- Caption is the title -->
                    <h2 class="home-title">
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

                    // No Results
                } else {
                    echo "There are no results for your search.";
                }
            }

                        ?>


        </div>
    </body>

    </html>