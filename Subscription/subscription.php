<?php

include('../config.php');

if (isset($_POST['subcsubmit'])) {

    $subemail = $_POST['subemail'];

    

    $sql =mysqli_query($conn, "INSERT INTO subscription (sub_email) VALUES ('$subemail')");

    if ($sql) {
        echo "<script>alert('Successfully Subscribed!');</script>";
        echo "<script type='text/javascript'> document.location ='../index.php'; </script>";
    } else{
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
        
    
}else {
    echo "Failed to Subscribe! Try Again";
}

?>




