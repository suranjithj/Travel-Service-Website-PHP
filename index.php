<!DOCTYPE html>

    <?php 
    session_start(); 

    // Check if the user is already logged in
    if(isset($_SESSION['email'])) {
        // Redirect to respective dashboard based on user type
    }

    $emailErr = $passwordErr = "";

    ?>

<html lang="en">
    <head> 

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wonderscape of Sri Lanka</title>
        <link rel="stylesheet" href="styles.css">
        <!-- <link rel="stylesheet" href="styles2.css"> -->
        <!-- google font link -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap">
    </head>

    <body id="top">

        <header class="header" data-header> 

            <div class="overlay" data-overlay></div>
        
            <div class="header-top">

                <div class="container">
                    <a href="index.php" class="logo">
                    <span class="website-name">Wonderscape of Sri Lanka </span>
                    </a>
                    <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
                        <ion-icon name="menu-outline"></ion-icon>
                    </button>            
                    </div>
                </div>
                
            </div>
        
            <div class="header-bottom" id="main-navbar">
                <div class="container">
        
                    <ul class="social-list">
            
                        <li>
                            <a href="https://www.facebook.com/profile.php?id=100091863774095&mibextid=ZbWKwL" class="social-link">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>
                
                        <li>
                            <a href="https://www.instagram.com/_r_e_s_f_e_b_e_r_____?igsh=cWw2eTdjaTV6cmVs" class="social-link">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>
                
                        <li>
                            <a href="https://www.tiktok.com/@_r_e_s_f_e_b_e_r_____?_t=8l3fKYrdh8E&_r=1" class="social-link">
                                <ion-icon name="logo-tiktok"></ion-icon>
                            </a>
                        </li>
            
                    </ul>
            
                    <nav class="navbar" data-navbar>
            
                        <div class="navbar-top">
                        <a href="#" class="logo">
                            <span class="website-name">Wonderscape of Sri Lanka </span>
                        </a>
            
                        <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
                        <ion-icon name="close-outline"></ion-icon>
                        </button>
            
                        </div>
            
                        <ul class="navbar-list">
            
                        <li>
                        <a href="index.php#home" class="navbar-link" data-nav-link>home</a>
                        </li>
                        <li>
                        <a href="index.php#location" class="navbar-link" data-nav-link>Packages</a>
                        </li>            
                        <li>
                        <a href="index.php#hotel" class="navbar-link" data-nav-link>hotels</a>
                        </li>            
                        <li>
                        <a href="index.php#gallery" class="navbar-link" data-nav-link>gallery</a>
                        </li>           
                        <li>
                        <a href="index.php#contact" class="navbar-link" data-nav-link>contact us</a>
                        </li>
                        <li>
                            <?php if (empty($_SESSION['email'])): ?>
                                 <a href="Login-Register/login-register.php" class="navbar-link" data-nav-link>Login</a>
                            <?php else: ?>
                                 <a href="Login-Register/login-register.php" class="navbar-link" data-nav-link>Dashbord</a>
                            <?php endif ?>
                        </li>
                    </ul> 
            
                    </nav>
                        <?php if (empty($_SESSION['email'])): ?>
                            <a href="Login-Register/login-register.php"><button class="btn btn-primary">Book NOW</button></a>
                            
                        <?php else: ?>
                            <a href="Location/location.php"><button class="btn btn-primary">Book a Tour</button></a>
                        <?php endif ?>
                </div>
            </div>
        
        </header>

        <section class="hero" id="home">
            <div class="container">
                <div class="searchbar">
                    <form action="seach.php" class="srch-form"> <!-- The form redirects to seach.php upon submission -->
                        <input type="text" placeholder="Search..." name="search" class="search-input" id="searchInput"> <!-- Text input field for entering search query -->
                        <button class="search-btn" id="search-btn" aria-label="Search" type="submit" onclick="search()"> <!-- Button for submitting the search query -->
                            <ion-icon name="search"></ion-icon>
                        </button>
                    </form>
                </div>                  
                
                <h2 class="h1 hero-title">Join us with explore <br>Sri Lanka</h2>
                <p class="hero-text">Journey to the Pearl of the Indian Ocean</p>
                <div class="btn-group"> 
                    <a href="#"><button class="btn btn-secondary">Read More...</button></a>
                    <a href="Login-Register/tourguide-log-reg.php"><button class="btn btn-primary">Become a Tour Guide ?</button></a>
                </div>
            </div>
        </section>

        <!-- POPULAR Location / Tour Packages-->
        <?php

        include 'config.php';

        // SQL query to select data from the table
        $sql = "SELECT * FROM tbllocation limit 3";

        // Execute the query
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            // Output the section structure
            echo '<section class="popular" id="location">';
            echo '<div class="container">';
            echo '<p class="section-subtitle">The popular</p>';
            echo '<h2 class="h2 section-title">Tour Packages</h2>';
            echo '<p class="section-text">We Offer</p>';
            echo '<ul class="popular-list">';
            
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Output the card structure for each location
                echo '<li>';
                echo '<div class="popular-card">';
                echo '<figure class="card-img">';
                echo '<img src="Images/locationImages/' . $row["lpic"] . '" alt="' . $row["title"] . '" loading="lazy">';
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
                echo '<a href="more.php?id='.$row["id"].'"><button type="button" class="btn btn-primary" style="height: 40px; width: 250px; text-align: center; line-height: 18px;">View Package Details</button></a>';
                echo '</div>';
                echo '</div>';
                echo '</li>';
            }
            
            // Close the HTML elements
            echo '</ul>';
            echo '<a href="Location/location.php"><button class="btn btn-primary">More Packages . . .</button></a>';
            echo '</div>';
            echo '</section>';
        } else {
            echo "0 results";
        }

        
        ?>

        <!-- hotelS -->

        <section class="hotel" id="hotel" style="background-color: rgba(128, 128, 128, 0.201);">
            <div class="container">

                <p class="section-subtitle">The Best</p>           
                <h2 class="h2 section-title">Hotels and Restaurants</h2>
                <p class="section-text">
                    in Sri Lanka.
                </p>            
                <ul class="hotel-list">            
                    <li>
                        <div class="hotel-card">            
                            <figure class="card-banner">
                            <img class="hotel-1" src="Images/hotelImages/Heritance-Kandalama_.jpg" alt="Heritance Kandalama" loading="lazy">
                            </figure>            
                            <div class="card-content">           
                                <h3 class="h3 card-title">Heritance Kandalama</h3>            
                                <p class="card-text" style="color: black;">
                                    A still forest of dense green, floating whispers of bird song the lake shimmers in the distance, walls of rock cool to touch. 5-Star Hotel.
                                </p>           
                                <ul class="card-meta-list">           
                                    <li class="card-meta-item">
                                    <div class="meta-box"> 
                                        <ion-icon name="time"></ion-icon> 
                
                                        <p class="text">2D/1N</p>
                                    </div>
                                    </li>            
                                    <li class="card-meta-item">
                                    <div class="meta-box">
                                        <p class="text">Deluxe Twin Room</p>
                                    </div>
                                    </li>           
                                    <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="location"></ion-icon>
                
                                        <p class="text">Dambulla, LK</p>
                                    </div>
                                    </li>           
                                </ul>           
                            </div>            
                            <div class="card-price">           
                                <div class="wrapper">            
                                    <p class="reviews">(5,823 reviews)</p>           
                                    <div class="card-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    </div>
                
                                </div>
                
                                <p class="price">
                                    $300
                                    <span>/ per person</span>
                                </p>
            
                                <a href="https://www.heritancehotels.com/kandalama/offers.html"><button class="btn btn-secondary">Check Offers</button></a>
            
                            </div>
            
                        </div>
                    </li>
        
                    <li>
                        <div class="hotel-card">
            
                            <figure class="card-banner">
                            <img src="Images/hotelImages/Shangri-La-Hambantota.jpg" alt="Shangri-La Hambantota"  loading="lazy">
                            </figure>
            
                            <div class="card-content">
            
                                <h3 class="h3 card-title">Shangri-La Hambantota</h3>
                
                                <p class="card-text" style="color: black;">
                                    Overlooking the pristine southern coast of beautiful Sri Lanka, Shangri-La Hambantota is located along the ancient Spice Route in a city steeped in rich history.
                                </p>
                
                                <ul class="card-meta-list">
                
                                    <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="time"></ion-icon>
                
                                        <p class="text">2D/1N</p>
                                    </div>
                                    </li>
                
                                    <li class="card-meta-item">
                                    <div class="meta-box">            
                                        <p class="text">Deluxe Room</p>
                                    </div>
                                    </li>
                
                                    <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="location"></ion-icon>
                
                                        <p class="text">Hambantota, LK</p>
                                    </div>
                                    </li>
                
                                </ul>
            
                            </div>
            
                            <div class="card-price">
            
                                <div class="wrapper">
                
                                    <p class="reviews">(4567 reviews)</p>
                
                                    <div class="card-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    </div>
                
                                </div>
                
                                <p class="price">
                                    $250
                                    <span>/ per person</span>
                                </p>
                
                                <a href="https://www.shangri-la.com/en/hambantota/shangrila/offers/"><button class="btn btn-secondary">Check Offers</button></a>
                
                            </div>
            
                        </div>
                    </li>
        
                    <li>
                        <div class="hotel-card">
            
                            <figure class="card-banner">
                            <img src="Images/hotelImages/Virticle-By-Jetwing.jpg" alt="The Rainforest Ecolodge" loading="lazy">
                            </figure>
            
                            <div class="card-content">
            
                                <h3 class="h3 card-title">Virticle By Jetwing
                                </h3>
                
                                <p class="card-text" style="color: black;">
                                    At Virticle by Jetwing rooftop bar and restaurant located in union place, Colombo, we take dining to new heights.
                                </p>
                
                                <ul class="card-meta-list">
                
                                    <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="time"></ion-icon>
                
                                        <p class="text">5-11PM</p>
                                    </div>
                                    </li>
                
                                    <li class="card-meta-item">
                                    <div class="meta-box">
                                        <p class="text">Bar/Restaurant</p>
                                    </div>
                                    </li>
                
                                    <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="location"></ion-icon>
                
                                        <p class="text">Union Pl, Colombo</p>
                                    </div>
                                    </li>
                
                                </ul>
            
                            </div>
            
                            <div class="card-price">
            
                                <div class="wrapper">
                
                                    <p class="reviews">(367 reviews)</p>
                
                                    <div class="card-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    </div>
                
                                </div>
                
                                <p class="price">
                                    $2 - $25
                                    <span>/ per person</span>
                                </p>
                
                                <a href="https://www.rainforest-ecolodge.com/special-offers.html"><button class="btn btn-secondary">Check Offers</button></a>
                
                            </div>
            
                        </div>
                    </li>
        
                </ul>
        
                <a href="Hotels/hotels.php"><button class="btn btn-primary">View more . . .</button></a>

            </div>
        </section>

        <!-- GALLERY -->
    
        <section class="gallery" id="gallery">
            <div class="container">

                <p class="section-subtitle">Photo Gallery</p>

                <h2 class="h2 section-title">Photos for Travellers</h2>

                <p class="section-text">
                    To see Sri Lanka's attractions, cultures, travel locations, and more special beautiful images.
                </p>

                <ul class="gallery-list">

                    <li class="gallery-item">
                        <figure class="gallery-image">
                            <img src="Images/beach-2314336_1920.jpg" alt="Gallery image">
                        </figure>
                    </li>

                    <li class="gallery-item">
                        <figure class="gallery-image">
                            <img src="Images/mask-3235633_1920.jpg" alt="Gallery image">
                        </figure>
                    </li>

                    <li class="gallery-item">
                        <figure class="gallery-image">
                            <img src="Images/sri-lanka-5062005_1280.jpg" alt="Gallery image">
                        </figure>
                    </li>

                    <li class="gallery-item">
                        <figure class="gallery-image">
                            <img src="Images/dance-6983551_1920.jpg" alt="Gallery image">
                        </figure>
                    </li>

                    <li class="gallery-item">
                        <figure class="gallery-image">
                            <img src="Images/elephant-4037451_1920.jpg" alt="Gallery image">
                        </figure>
                    </li>

                </ul>
                <a href="Images/images.php"><button class="btn btn-primary">View more . . .</button></a>
            </div>
        </section>

        <!-- reviews -->
        <section class="review" style="height: auto;">
        <h2>Reviews</h2>
            <div class="rv-container">
                
                <?php
                    //if the traveller confirmed yes? get the feddbacks from booking table
                    $ret=mysqli_query($conn,"SELECT bk_fullname , tr_feedback FROM booking WHERE tr_confirm='yes' LIMIT 3");
                    $cnt=1;
                    $row=mysqli_num_rows($ret);
                    if($row>0){
                    while ($row=mysqli_fetch_array($ret)) {
                ?>
                    
                    <ul class="review-list">
                        <li>
                            <div class="review-card">
                                <div class="card-content">
                                    <h3 class="card-title"><?php  echo $row['bk_fullname'];?></h3>
                                    <p class="card-text">
                                        <?php  echo $row['tr_feedback'];?>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    
                <?php 
                    $cnt=$cnt+1;
                } }else {?>
                        <!-- nothing to show any reviews? -->
                        <p style="color: red; text-align: center; ">No reviews at this moment.</p>
                <?php } ?>
            </div>
            <?php
            $conn->close();
            ?>
            <div class="btn-container">
                <!-- see more reviews -->
                <a href=""><button class="btn btn-primary">View more . . .</button></a>
            </div>
            
        </section>
            
        <section class="cta" id="contact" style="background-color: transparent">
            <!-- <section class="cta"> -->
                <h2 class="h2 section-title">Send Inquiry</h2><br> 
                <div class="container">
                    
                    <form action="inquiry.php" class="cta-form1" method="post">
            
                        <div class="cta-input">
                        <label for="inqfullname">Full Name*</label>                
                        <input type="text" name="inqfullname" id="inqfullname" required placeholder="Enter Full Name">
                        </div>
            
                        <div class="cta-input">
                        <label for="inqemail">Email*</label>                
                        <input type="email" name="inqemail" id="inqemail" required placeholder="Enter Your Email">
                        </div>
            
                        <div class="cta-input">
                        <label for="inqmobile">Mobile No*</label>               
                        <input type="text" name="inqmobile" id="inqmobile" required placeholder="Enter Your Mobile No">
                        </div>
            
                        <div class="cta-input">
                        <label for="inqmessage">Message*</label>               
                        <input type="text" name="inqmessage" id="inqmessage" required placeholder="Message">
                        </div>
                        
                        <button type="submit" id="btninqsubmit" name="btninqsubmit" class="btn-q">Inquire now</button>
            
                    </form>

                </div>
        </section>        

        <footer class="footer">

            <div class="footer-top">
            <div class="container">

                <div class="footer-brand">

                    <p class="footer-text">About Us</p>
                    <a href="#" class="logo">
                        <span class="website-name">Wonderscape of Sri Lanka </span><p class="website-name2">by RESFEBER</p></a>

                    <p class="footer-text">To get digital travel experience with us.</p>

                    <p class="footer-text">We have variety of tour packages.</p>
                    <br>
                    <p class="footer-text"> Quick Links
                        <a href="Location/location.php">More Packages</a>
                        <a href="Hotels/hotels.php">More Hotels</a></p>
                </div>

                <div class="footer-contact">

                    <h4 class="contact-title">Contact Us</h4>

                    <p class="contact-text">
                        Feel free to contact us !
                    </p>

                    <ul>

                        <li class="contact-item">
                        <ion-icon name="call-outline"></ion-icon>

                        <a href="tel:+94726268895" class="contact-link">+94 72 626 8895</a>
                        </li>

                        <li class="contact-item">
                        <ion-icon name="mail-outline"></ion-icon>

                        <a href="mailto:info@resfeber.com" class="contact-link">info@resfeber.com</a>
                        </li>

                        <li class="contact-item">
                        <ion-icon name="location-outline"></ion-icon>

                        <address>Old Town <br> Anuradhapura <br> Sri Lanka</address>
                        </li>

                    </ul>

                </div>

                <div class="footer-form">

                    <p class="form-text">
                        Subscribe our newsletter for more updates & news !!
                    </p>

                    <form action="Subscription/subscription.php" class="form-wrapper" method="post">
                        <input type="email" name="subemail" class="input-field" placeholder="Enter Your Email" required>

                        <button type="submit" name="subcsubmit" class="btn btn-secondary">Subscribe</button>
                    </form>

                    <div class="ft-social">
                        <ul class="social-list">
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=100091863774095&mibextid=ZbWKwL" class="social-link">
                                    <ion-icon name="logo-facebook"></ion-icon>
                                </a>
                            </li>
                    
                            <li>
                                <a href="https://www.instagram.com/_r_e_s_f_e_b_e_r_____?igsh=cWw2eTdjaTV6cmVs" class="social-link">
                                    <ion-icon name="logo-instagram"></ion-icon>
                                </a>
                            </li>
                    
                            <li>
                                <a href="https://www.tiktok.com/@_r_e_s_f_e_b_e_r_____?_t=8l3fKYrdh8E&_r=1" class="social-link">
                                    <ion-icon name="logo-tiktok"></ion-icon>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="social-link">
                                    <ion-icon name="logo-whatsapp"></ion-icon>
                                </a>
                            </li>
                
                        </ul>
                    </div>

                </div>

            </div>
            </div>

            <div class="footer-bottom">
                <div class="container">

                    <p class="copyright">&copy; 2024 <a href="#home">Wonderscape of Sri Lanka by RESFEBER</a>. All rights reserved</p>

                    <ul class="footer-bottom-list">

                        <li>
                            <a href="#" class="footer-bottom-link">Privacy Policy</a>
                        </li>

                        <li>
                            <a href="#" class="footer-bottom-link">Term & Condition</a>
                        </li>

                        <li>
                            <a href="#" class="footer-bottom-link">FAQ</a>
                        </li>

                    </ul>

                </div>
            </div>

        </footer>

        <a href="#top" class="go-top" data-go-top>
            <ion-icon name="chevron-up-outline"></ion-icon>
        </a>
        
        <script>
            const div1 = document.querySelector('.div1');

            const loginLink = document.querySelector('.login-link');

            const registerLink = document.querySelector('.register-link');

            const btnLogin = document.querySelector('.btn-login');

            const closeIcon = document.querySelector('.close-icon');

            registerLink.addEventListener('click', ()=> 
            {
                div1.classList.add('active');
            });

            loginLink.addEventListener('click', ()=> 
            {
                div1.classList.remove('active');
            });

            closeIcon.addEventListener('click', ()=> 
            {
                div1.classList.remove('active-window');
            });
        </script>


        <script src="script.js"></script>

        <!-- ionicon link -->

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </body>
</html>