<?php 

include ('../config.php');

//Traveler registration
if (isset($_POST['rgssubmit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];  
    $confirmpassword = $_POST['confirmpassword'];  
    
    // Check if the password meets the minimum length requirement
    if (strlen($password) >= 8) {

        // Check if the password and confirm password matching
        if($password == $confirmpassword){

            $sql_e = "SELECT * FROM traveller WHERE tr_email='$email'";

            $res_e = mysqli_query($conn, $sql_e); //check email alredy registered or not
            if(mysqli_num_rows($res_e) > 0){
                header('Location: ../Login-Register/tourguide-log-reg.php?error=This Email already registered. Please use a different one.');
            }else{

                if(isset($_POST['rgssubmit'])){
                    $sql = "INSERT INTO traveller (tr_fname, tr_lname, tr_mobileno, tr_email, tr_password) 
                    VALUES ('$fname', '$lname', '$mobile', '$email', '$password')";
                    
                
                    $result = mysqli_query($conn, $sql);
                
                    if($result){
                        echo "<script>alert('Registration successful! Please Login.'); window.location.href = 'login-register.php';</script>";
                        exit();
                    }
                    else{
                        echo "ERROR: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            }

        }else {
            header('Location: ../Login-Register/tourguide-log-reg.php?error=Password does not match!');
        }

    }else {
        header('Location: ../Login-Register/tourguide-log-reg.php?error=Password must be at least 8 characters long!');
    }
    
}

//working

?>


