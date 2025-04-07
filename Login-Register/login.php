<?php
session_start();

// Check if the user is already logged in
if(isset($_SESSION['email'])) {
    // Redirect to respective dashboard based on user type
    if ($_SESSION['email'] == 'admin@resfeber.com') {
        header("Location: ../Admin-Menu/dashboard.php");
        exit();
    } else {
        header("Location: ../Tr-Menu/dashboard.php");
        exit();
    }
}

include ('../config.php');

$error_message = '';

if(isset($_POST['lgnsubmit'])){
    
    $email = $_POST['email'];

    //check email is match for admin login credential
    if($email == 'admin@resfeber.com'){
        $password = $_POST['password']; 
        
        $query = "SELECT * FROM admin WHERE admin_email='$email' and admin_password='$password' LIMIT 5";
        $result = mysqli_query($conn, $query); // Executes the SQL query

        if(mysqli_num_rows($result) == 1) //Checks if exactly one row is returned from the query result
        {
            $row = mysqli_fetch_array($result); //Fetches the row data into an array
            $_SESSION['email'] = $email; //Sets the session variable $_SESSION['email'] with the value of $email
            echo '<script>alert("Admin Login Successful"); window.location = "../Admin-Menu/dashboard.php";</script>'; 
            
            exit();

        }
        else{
            header('Location: login-register.php?error=Incorrect Password. Try again!');
            exit();
        }
    }else{
        //user login
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $maxAttempts = 5;
        $currentTime = time();
        $allowedTime = 1800;

        $query = "SELECT * FROM traveller WHERE tr_email='$email' and tr_password='$password' ";
        $result = mysqli_query($conn, $query); // Executes the SQL query

        $attemptsWithinAllowedTime = 0; //count the number of login attempts within the allowed time
        while ($row = mysqli_fetch_assoc($result)) {
            if ($currentTime - strtotime($row['timestamp']) <= $allowedTime) { //For each row, it checks if the time elapsed since the timestamp stored in the database is within the allowed time
                $attemptsWithinAllowedTime++;
            }
        }
        
        if ($attemptsWithinAllowedTime >= $maxAttempts) { //Checking Maximum Attempts
            echo '<script>alert("Too many login attempts. Try again later.");</script>';
            exit();
        }

        if ( $_POST['password'] != $password) { //Checking Password
            header('Location: login-register.php?error=Incorrect Password. Try again!');
            exit();
        
        }else{

            if(mysqli_num_rows($result) == 1) //Checks if exactly one row is returned from the query result
            {
                $row = mysqli_fetch_array($result); //Fetches the row data into an array
                $_SESSION['email'] = $email; //Sets the session variable $_SESSION['email'] with the value of $email
                echo '<script>alert("Login Successful"); window.location = "../Tr-Menu/dashboard.php";</script>'; 
                exit();

            }
            else{
                header('Location: login-register.php?error=Incorrect Email or Password. Try again!');
                exit();
            }
            
        }  
    }
}


?>
