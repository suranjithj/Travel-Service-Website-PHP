<?php
    session_start();

    $_SESSION = array(); 
    session_destroy(); //effectively clearing all session data associated with the current session 
                       //which removes all session data from the server and invalidates the session ID

    $_SESSION['message'] = "Logged Out Successfully";
    echo '<script>alert("Logout Successful"); window.location = "../index.php";</script>'; 
    exit(0);
?>