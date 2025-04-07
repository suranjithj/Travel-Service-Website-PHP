<?php
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cardNumber = $_POST['cardNumber'];
    $cardExpiry = $_POST['cardExpiry'];
    $cardCVC = $_POST['cardCVC'];
    $location = $_POST['location'];
    $fullname = $_POST['fullname'];
    $total = $_POST['total'];

    // Sanitize and validate data (you should add more validation as per your requirements)
    $cardNumber = mysqli_real_escape_string($conn, $cardNumber);
    $cardExpiry = mysqli_real_escape_string($conn, $cardExpiry);
    $cardCVC = mysqli_real_escape_string($conn, $cardCVC);

    // Insert data into database
    $sql = "INSERT INTO payment_details (cardNumber, cardExpiry, cardCVC, fullname, amount)
            VALUES ('$cardNumber', '$cardExpiry', '$cardCVC', '$fullname', '$total')";

    if ($conn->query($sql) === TRUE) {
       
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Successful</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <style>
          .payment-success {
            text-align: center;
            margin-top: 100px;
          }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 payment-success">
                    <i class="fas fa-check-circle fa-5x text-success"></i>
                    <h2 class="mt-3">Payment Successful!</h2>
                    <p class="lead">Thank you for JOIN US WITH EXPLORE SRI LANKA.</p>
                    <a href="Booking/booking2.php?location=<?php echo $location ?>" class="btn btn-primary">Continue</a>
                </div>
            </div>
        </div>
        
      <!-- Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>



<?php 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
 