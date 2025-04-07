<?php 

error_reporting(0);
session_start(); 

// Check if the user is already logged in
if(isset($_SESSION['email'])) {
    // Redirect to respective dashboard based on user type

}

$emailErr = $passwordErr = "";

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/Image-Tab-Gallery-Horizontal.css">

    </head>
    

    <?php $id = $_GET['id'] ?>

    <?php
    include 'config.php';
    // SQL query to select data from the table
    $sql = "SELECT * FROM tbllocation where id = $id";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Access data from each row using $row['column_name']
            $id = $row['id'];
            $title = $row['title'];
            $location = $row['location'];
            $rating = $row['rating'];
            $description = $row['description'];
            $description2 = $row['description2'];
            $lpic = $row['lpic'];  
            $price = $row['price'];

        }
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
    ?>

    <body>
        
        <div class="container-fluid top-container">
            
            <div class="row">
                <div class="col-12 col-md-6 col-xl-4 offset-xl-2">
                    <div class="img-container"><img class="rounded" id="expandedImg" style="width: 100%;" src="Images/locationImages/<?php echo $lpic ?>" width="438" height="600">
                        <div id="imgtext"></div>
                    </div>
                </div>
                <!-- col-sm-12: hould take up 12 columns on small screens / col-md-6: should take up 6 columns on medium-sized screens -->
                <!-- col-xl-4: should take up 4 columns on extra-large screens / offset-xl-0: horizontally by 0 columns on extra-large screens -->
                <div class="col-sm-12 col-md-6 col-xl-4 offset-xl-0"> 
                    <?php if (empty($_SESSION['email'])): ?>
                        <a href="Login-Register/login-register.php"><button class="btn btn-primary" style="margin-bottom: 15px;">LOGIN NOW to Booking</button></a>
                    <?php else: ?>
                        <a href="Booking/booking2.php?location=<?php echo $title ?> &price=<?php echo $price; ?>"><button type="button" class="btn btn-success" style="margin-bottom: 15px;">Book Now</button></a>
                    <?php endif ?>
                    <h1 style="margin-bottom: 15px;"><?php echo $title; ?></h1>
                    <h2 style="margin-bottom: 15px;"><?php echo $price ?> / Per Person (USD/ $)</h2>
                    <p style="font-size: 20px; margin-bottom: 15px;"><?php echo $description; ?></p>
                    <p style="font-size: 20px; margin-bottom: 15px;"><?php echo $description2; ?></p>
                    
                    
                </div>
            </div>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/Image-Tab-Gallery-Horizontal.js"></script>
    </body>

</html>