<?php
include('config.php');
    // Retrieve updated values from POST data
    $bk_id = $_POST['eid'];
    $tgfullname = $_POST['tgfullname'];
    $tg_email = $_POST['tg_email'];

    // Prepare SQL statement to update the row
    $sql = "UPDATE booking SET tgfullname='$tgfullname', tg_email='$tg_email' WHERE bk_id='$bk_id'";

    // Execute the update query
    if ($conn->query($sql) === TRUE) {
        header("Location: ../dashboard.php");
    exit(); 
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();

?>
