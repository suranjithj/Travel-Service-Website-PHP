<?php

include('../config.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>HOTELS AND RESTAURANTS</title>

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

            .section-title { margin-bottom: 15px; }

            .gallery { padding-block: 60px; }
    
            .gallery-list {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }
            
            .gallery-image {
                width: 100%;
                height: 100%;
                border-radius: 15px;
                overflow: hidden;
            }
            
            .gallery-item:nth-child(3) { grid-area: 1 / 2 / 3 / 3; }
            
            .gallery-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            
            .gallery .btn{
                margin-top: 35px;
                margin-inline: auto; 
            }
        </style>

    </head>
    <body>
        <div class="container">

            <h2>Photo Gallery</h2>
            <a href="../index.html"><button class="btn btn-secondary">Back to Home</button></a>
                    
            <?php
                    $ret=mysqli_query($conn,"select * from tblgallery");
                    $cnt=1;
                    $row=mysqli_num_rows($ret);
                    if($row>0){
                    while ($row=mysqli_fetch_array($ret)) {
            ?>
            <ul class="gallery-list">
            
                <li class="gallery-item">
                <figure class="gallery-image">
                    <img src="galleryImages/<?php  echo $row['galleryPic'];?>" width="400" height="100%">
                </figure>
                </li>

            </ul>

            <?php 
                $cnt=$cnt+1;
            } } else {?>
                
            <?php } ?>

        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>