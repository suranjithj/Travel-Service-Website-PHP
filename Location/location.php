<?php

include('../config.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Tour Packages</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>

            *, *::before, *::after {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            * {
                font-family: "Poppins", sans-serif;
                scroll-behavior: smooth;
                
            }
                
            li { list-style: none; }
            
            a { text-decoration: none; }

            ion-icon { pointer-events: none; }
    
            body { 
                background: white; 
            }

            .container { padding-inline: 15px; }

            .section-title { margin-bottom: 15px; }

            h2, h3{
                font-weight: bold;
                font-family: "Poppins";
                text-transform: uppercase;
                color: rgb(8, 57, 95);
            }

            h2{
                padding-top: 75px;
                padding-bottom: 25px;
                font-size: 70px;
            }

            .btn-back{
                width: 150px;
                outline: none;
                height: 40px;
                color: white;
                border: none;
                background: #3b79c9;
                font-weight: bold;
                border-radius: 25px;
                margin-bottom: 30px;
            }

            .btn-back:hover{
                background: rgb(59, 121, 201, 0.5); 
                color: black; 
                outline: none;
                border: 1px solid rgb(59, 121, 201);
            }
                
            .btn-secondary:is(:hover, :focus) { 
                background: rgb(59, 121, 201, 0.5); 
                color: black; 
            }

            .card-text {
                color: black;
                font-size: 15px;
            }

            .popular { 
                padding-block: var(--section-padding); 
                
            }
            
            .popular-list,
            .popular-list > li:not(:last-child) { margin-bottom: 30px; }

            .popular-list {
                display: grid;
                gap: 30px;
                margin-bottom: 50px;
            }
            
            .popular-card {
                position: relative;
                overflow: hidden;
                border-radius: 25px;
                height: 430px;
            }
            
            .popular-card .card-img { height: 100%; }
            
            .popular-card .card-img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            .popular-card .card-content {
                position: absolute;
                bottom: 20px;
                left: 20px;
                right: 20px;
                background: white;
                border-radius: 25px;
                padding: 20px;
            }
            
            
            .popular-card .card-rating {
                background: rgb(8, 57, 95);
                color: white;
                position: absolute;
                top: 0;
                right: 25px;
                display: flex;
                align-items: center;
                gap: 1px;
                transform: translateY(-50%);
                padding: 6px 10px;
                border-radius: 20px;
                font-size: 14px;
            }
            
            .popular-card .card-subtitle {
                color: #0084b8;
                font-size: 13px;
                text-transform: uppercase;
                margin-bottom: 8px;
            }
            
            .popular-card .card-title { margin-bottom: 5px; }
            
            .popular-card :is(.card-subtitle, .card-title) > a { color: inherit; }
            
            .popular .btn { 
                margin-inline: auto; 
                border-radius: 50px;
                background-color: #808080;
                outline: none;
                border: 1px solid #808080;
                font-weight: 600;
            }

            .popular .btn:hover{
                background-color: #184c91;
                border: 1px solid #184c91;
            }
        </style>

    </head>
    <body>
        
        <?php

        $sql = "SELECT * FROM tbllocation";

        // Execute the query
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            // Output the section structure
            echo '<section class="popular" id="location">';
            echo '<div class="container">';
            echo '<h2 class="h2 section-title">Tour Packages</h2>';
            echo '<a href="../index.php"><button class="btn-back">Back to Home</button></a>';
            echo '<ul class="popular-list">';
            
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Output the card structure for each location
                echo '<li>';
                echo '<div class="popular-card">';
                echo '<figure class="card-img">';
                echo '<img src="../Images/locationImages/' . $row["lpic"] . '" alt="' . $row["title"] . '" loading="lazy">';
                echo '</figure>';
                echo '<div class="card-content">';
                echo '<div class="card-rating">';
                // Assuming rating is stored as an integer (number of stars)
                for ($i = 0; $i < $row["rating"]; $i++) {
                    echo '<ion-icon name="star"></ion-icon>';
                }
                echo '</div>';
                echo '<h3 class="h3 card-title"><a href="#">' . $row["title"] . '</a></h3>';
                echo '<p class="card-text">' . $row["description"] . '</p>';
                echo '<br>';
                echo '<a href="../more.php?id='.$row["id"].'"><button type="button" class="btn btn-primary">View Package Details</button></a>';
                echo '</div>';
                echo '</div>';
                echo '</li>';
            }
            
            // Close the HTML elements
            echo '</ul>';
            
            echo '</div>';
            echo '</section>';
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>