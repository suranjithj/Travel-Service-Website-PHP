<?php

include ('../config.php');

//Submit a booking  

if (isset($_POST['btnsubmitbk'])) {

    $fullname = $_POST['fullname'];
    $verifyopt = $_POST['verifyopt'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];
    $address = $_POST['address'];
    $from = $_POST['from'];  
    $to = $_POST['to'];  
    $location = $_POST['location']; 
    $price = $_POST['price']; 
    $passenger = $_POST['passenger']; 
    $information = $_POST['information']; 

    if(isset($_POST['btnsubmitbk'])){

        $sql = "INSERT INTO booking (bk_fullname, bk_verifyopt, bk_email, bk_mobileno, bk_address, bk_datefrom, bk_dateto, title, price, bk_passenger, bk_addinfo) 
        VALUES ('$fullname', '$verifyopt', '$email', '$mobileno', '$address', '$from', '$to', '$location', '$price', '$passenger', '$information')";

        $result = mysqli_query($conn, $sql);

        if($result){
            header('Location: ../card.php?fullname=' . $fullname . '&price=' . $price . '&passenger=' . $passenger);

            exit();
        }
        else{
            echo "ERROR: " . $sql . "<br>" . mysqli_error($conn);
        }
    }else {
        echo "Failed to Booking Submit!";
    }

}

//working

?>


