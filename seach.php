<?php

include('config.php');

?>

<!-- This assigns the value of the 'search' parameter to the variable $search, allowing you to use PHP code-->
<?php $search = $_GET['search'] ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Travel Location</title>

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
                font-size: 30px;
            }

            .btn-secondary { 
                border-color: white; 
                background: #3b79c9;
                font-weight: bold;
                border-radius: 25px;
                margin-bottom: 30px;
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
            
            .popular .btn { margin-inline: auto; }
        </style>

    </head>
    <body>
        <div class="container">

            <h2>TRAVEL LOCATIONS</h2>
            <a href="index.php"><button class="btn btn-secondary">Back to Home</button></a>
                    
            <!-- select all columns contains the search term specified by the $search variable -->
            <?php
                    $ret=mysqli_query($conn,"select * from tbllocation WHERE title LIKE '%$search%' OR location LIKE '%$search%' OR description LIKE '%$search%'");
                    $cnt=1;
                    // counts the number of rows returned by the SQL query and stores the count in the variable $row
                    $row=mysqli_num_rows($ret);
                    if($row>0){
                    while ($row=mysqli_fetch_array($ret)) {
            ?>
            <ul class="popular-list">
            <li>
                <div class="popular-card">            
                    <figure class="card-img">
                    <img src="Images/locationImages/<?php  echo $row['lpic'];?>" width="80" height="80">
                    </figure>            
                    <div class="card-content">
                    <div class="card-rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                    <h3 class="h3 card-title">
                        <a href="#"><?php  echo $row['title'];?></a>
                    </h3> 
                    <p class="card-text"><?php  echo $row['location'];?></p>            
                    <p class="card-text"><?php  echo $row['description'];?></p>   
                    <?php echo '<a href="more.php?id='.$row["id"].'"><button type="button" class="btn btn-primary">More</button></a>'; ?>         
                    </div>

                </div>
                </li>
            </ul>

            <?php 
                $cnt=$cnt+1;
            } } else {?>
                <tr>
                    <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                </tr>
            <?php } ?>

        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>