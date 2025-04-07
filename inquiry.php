<?php

include ('config.php');

if (isset($_POST['btninqsubmit'])) {

    $inqfullname = $_POST['inqfullname'];
    $inqemail = $_POST['inqemail'];
    $inqmobile = $_POST['inqmobile'];
    $inqmessage = $_POST['inqmessage'];

    if (isset($_POST['btninqsubmit'])) {

        $sql =mysqli_query($conn, "INSERT INTO inquiry (inq_fullname, inq_email, inq_mobile, inq_message) VALUES ('$inqfullname', '$inqemail', '$inqmobile', '$inqmessage')");
    
        if ($sql) {
			echo "<script>alert('Inquiry Sent Successfully!');</script>";
			echo "<script type='text/javascript'> document.location ='index.php'; </script>";
		} else{
			echo "<script>alert('Something Went Wrong. Please try again');</script>";
		}
        
    }else {
        echo "Failed to sent Inquiry! Try Again";
    }
    
}

?>




