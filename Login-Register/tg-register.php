<?php

include ('../config.php'); 

//Tour guide registration
if (isset($_POST['btnTGregister'])) {

    $tgfullname = $_POST['tgfullname'];
    $tgmobile = $_POST['tgmobile'];
    $tgaddress = $_POST['tgaddress'];
    $authorized = $_POST['authorized'];
    $tgemail = $_POST['tgemail'];
    $tgpassword = $_POST['tgpassword'];  
    $tgconfirmpassword = $_POST['tgconfirmpassword']; 


    // Check if the password meets the minimum length requirement
    if (strlen($tgpassword) >= 8) {
        // Check if the password and confirm password matching
        if($tgpassword == $tgconfirmpassword){

            $sql_e = "SELECT * FROM tourguide WHERE tg_email='$tgemail'";
            
            $res_e = mysqli_query($conn, $sql_e);  //check email alredy registered or not
            if(mysqli_num_rows($res_e) > 0){
                header('Location: ../Login-Register/tourguide-log-reg.php?error=This Email already registered. Please use a different one.');   
            }else{

                if(isset($_POST['btnTGregister'])){
                    
                    $sql = "INSERT INTO tourguide (tg_fullname, tg_mobile, tg_address, authorized, tg_email, tg_password) 
                    VALUES ('$tgfullname', '$tgmobile', '$tgaddress', '$authorized', '$tgemail', '$tgpassword')";
                
                    $result = mysqli_query($conn, $sql);
                
                    if($result){
                        echo "<script>alert('Registration successful! Please Login.'); window.location.href = 'tourguide-log-reg.php';</script>";
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