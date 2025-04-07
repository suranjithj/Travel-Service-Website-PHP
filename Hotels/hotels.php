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

            .hotel { padding-block: 60px; }
    
            .hotel-list { margin-bottom: 40px; }
            
            .hotel-list > li:not(:last-child) { margin-bottom: 30px; }
            
            .hotel-card {
                background: rgb(1, 33, 60, 0.1);
                box-shadow: 0 0 5px hsla(0, 0%, 0%, 0.15);
                overflow: hidden;
                border-radius: 15px;
            }
            
            .hotel-card .card-banner { height: 400px; }
            
            .hotel-card .card-banner img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            .hotel-card .card-content { padding: 30px 20px; }
            
            .hotel-card .card-title { margin-bottom: 15px; }
            
            .hotel-card .card-text {
                line-height: 1.6;
                margin-bottom: 20px;
            }
            
            .card-meta-list {
                background: white;
                max-width: max-content;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                padding: 8px;
                box-shadow: 0 0 5px hsla(0, 0%, 0%, 0.15);
                border-radius: 50px;
            }
            
            .card-meta-item { position: relative; }
            
            .card-meta-item:not(:last-child)::after {
                content: "";
                position: absolute;
                top: 4px;
                right: -1px;
                bottom: 4px;
                width: 1px;
                background: hsla(0, 0%, 0%, 0.3);
            }
            
            .meta-box {
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                gap: 5px;
                padding-inline: 9px;
                color: #636774;
                font-size: var(--fs-8);
            }

            .meta-box .text{
                margin-top: 15px;
            }
            
            .meta-box > ion-icon {
                color: rgb(8, 57, 95);
                font-size: 13px;
            }
        
            .hotel-card .card-price {
                background: rgb(8, 57, 95);
                color: white;
                padding: 25px 20px;
                text-align: center;
            }
            
            .hotel-card .card-price .wrapper {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                gap: 5px 15px;
                margin-bottom: 10px;
            }

            .wrapper .reviews{
                margin-top: 15px;
            }
            
            .hotel-card .card-price .reviews { font-size: 14px; }
            
            .hotel-card .card-rating {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 1px;
                font-size: 14px;
            }
            
            .hotel-card .card-rating ion-icon:last-child { color: hsl(0, 0%, 80%); }
            
            .hotel-card .price {
                font-size: calc(18px + 1.6vw);;
                font-family: var("Montserrat");
                font-weight: var(800);
                margin-bottom: 20px;
            }
            
            .hotel-card .price span {
                font-size: var(--fs-7);
                font-weight: initial;
            }
            
            .hotel-list .btn { 
                margin-inline: auto;
                border-radius: 100px;
            }
        </style>

    </head>
    <body>
        <div class="container">

            <h2>HOTELS AND RESTAURANTS</h2>
            <a href="../index.php"><button class="btn btn-secondary">Back to Home</button></a>
                    
            <?php
                    $ret=mysqli_query($conn,"select * from tblhotel");
                    $cnt=1;
                    $row=mysqli_num_rows($ret);
                    if($row>0){
                    while ($row=mysqli_fetch_array($ret)) {
            ?>
            <ul class="hotel-list">
                <li>
                    <div class="hotel-card">
        
                        <figure class="card-banner">
                        <img src="../Images/hotelImages/<?php  echo $row['hotelpic'];?>" width="400" height="100%">
                        </figure>
        
                        <div class="card-content">
        
                            <h3 class="h3 card-title"><?php  echo $row['title'];?></h3>
        
                            <p class="card-text">
                                <?php  echo $row['description'];?>
                            </p>
        
                            <ul class="card-meta-list">
        
                                <li class="card-meta-item">
                                <div class="meta-box">
                                    <ion-icon name="time"></ion-icon>
            
                                    <p class="text"><?php  echo $row['hCondition'];?></p>
                                </div>
                                </li>
            
                                <li class="card-meta-item">
                                <div class="meta-box">            
                                    <p class="text"><?php  echo $row['type'];?></p>
                                </div>
                                </li>
            
                                <li class="card-meta-item">
                                <div class="meta-box">
                                    <ion-icon name="location"></ion-icon>
            
                                    <p class="text"><?php  echo $row['location'];?></p>
                                </div>
                                </li>
        
                            </ul>
        
                        </div>
        
                        <div class="card-price">
        
                            <div class="wrapper">
            
                                <p class="reviews">(<?php  echo $row['reviewsCount'];?>)</p>
            
                                <div class="card-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>
            
                            </div>
        
                            <p class="price">
                            <?php  echo $row['price'];?>
                                <span>/ per person</span>
                            </p>
        
                            <a href="<?php  echo $row['offerURL'];?>"><button class="btn btn-secondary">Check Offers</button></a>
        
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