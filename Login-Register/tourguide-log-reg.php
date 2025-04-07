
<?php

error_reporting(0);
session_start();

// Check if the user is already logged in
if (isset($_SESSION['tg_email'])) {
    // Redirect to the dashboard page if already logged in
    header("Location: ../TG-Menu/dashboard.php");
    exit(); // Stop executing the script
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: rgb(255, 255, 255);
            background-size: cover;
            background-position: center;
        }

        /* Login */
        .tourguide-reg.active-window{
            transform: scale(1);
        }

        .tourguide-reg.active{
            height: 570px;
        }

        .tourguide-reg .form{
            width: 100%;
            padding: 40px;
            
        }

        .tourguide-reg .form.tourguide-register{
            transition: transform .2s ease;
            transform: translateX(0);
        }

        .tourguide-reg.active .form.tourguide-register{
            transition: none;
            transform: translateX(-500px);
        }

        .tourguide-reg .form.tourguide-login{
            position: absolute;
            transition: none;
            transform: translateX(500px);
        }

        .tourguide-reg.active .form.tourguide-login{
            transition: transform .2s ease;
            transform: translateX(0);
        }

        .input-field1 {
            position: relative;
            width: 100%;
            height: 50px;
            border-bottom: 2px solid hsl(214, 57%, 51%);
            margin: 60px 0;
        }

        .input-field1 label{
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 18px;
            color: hsl(214, 57%, 51%);
            font-weight: 500;
            pointer-events: none;
            transition: .4s;
        }

        .input-field1 input:focus~label, .input-field1 input:valid~label{
            top: -5px;
        }

        .input-field1 input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 18px;
            color: #000000;
            font-weight: 500;
            padding: 0 35px 0 5px;
        }

        .input-field1 .icon{
            position: absolute;
            right: 8px;
            font-size: 18px;
            color: hsl(214, 57%, 51%);
            line-height: 57px;

        }

        .btn-login{
            width: 100%;
            height: 35px;
            background: hsl(214, 57%, 51%);
            border: none;
            outline: none;
            border-radius: 15px;
            cursor: pointer;
            font-size: 22px;
            font-weight: 500;
            color: white;
            
        }

        /* Registration */
        .tourguide-reg{
            position: relative;
            width: 500px;
            height: 900px;
            background: hsla(214, 57%, 51%, 0.179);
            border: 2px solid hsla(214, 57%, 51%, 0.214);
            border-radius: 20px;
            backdrop-filter: blur(20px);
            box-shadow: hsl(214, 57%, 51%);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            transition: transform .4s ease ,height .2s ease;
        }

        .tourguide-reg .form{
            width: 100%;
            padding: 40px;
        }

        .tourguide-reg .close-icon{
            position: absolute;
            top: 3px;
            right: 3px;
            width: 35px;
            height: 35px;
            font-size: 35px;
            color: hsl(214, 57%, 51%);
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom-left-radius: 20px;
        }

        .form h2{
            font-size: 35px;
            color: hsl(214, 57%, 51%);
            text-align: center;
            margin-bottom: 60px;
            
        }

        .input-field2{
            position: relative;
            width: 100%;
            height: 50px;
            border-bottom: 2px solid hsl(214, 57%, 51%);
            margin: 30px 0;
        }

        .input-field2 label{
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 18px;
            color: hsl(214, 57%, 51%);
            font-weight: 500;
            pointer-events: none;
            transition: .4s;
        }

        .input-field2 input:focus~label, .input-field2 input:valid~label{
            top: -5px;
        }

        .input-field2 input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 18px;
            color: #000000;
            font-weight: 500;
            padding: 0 35px 0 5px;
        }

        .div2{
            font-size: 15px;
            color: black;
            font-weight: 500;
            margin: -15px 0 15px;
            display: flex;
            justify-content: space-between;
        }

        .div2 label input{
            accent-color: hsl(214, 57%, 51%);
            margin-right: 3px;
        }

        .div2 a{
            color: black;
            text-decoration: none;
            font-weight: 550;
        }

        .div2 a:hover{
            text-decoration: underline;
            color: hsl(214, 57%, 51%);
        }

        .tourguide-reg .btnTGregister{
            width: 100%;
            height: 35px;
            background: hsl(214, 57%, 51%);
            border: none;
            outline: none;
            border-radius: 15px;
            cursor: pointer;
            font-size: 22px;
            font-weight: 500;
            color: white;
        }

        .tourguide-reg .btnTGregister:hover{
            background-color: #01213c;
        }

        .div3{
            font-size: 15px;
            color: #000000;
            text-align: center;
            font-weight: 500;
            margin: 20px 0 10px;
        }

        .div3 p a{
            color: black;
            text-decoration: none;
            font-weight: 550;

        }

        .div3 p a:hover{
            text-decoration: underline;
            color: hsl(214, 57%, 51%);
        }

    </style>
</head>

<body> 
    <!-- login -->
    <div class="tourguide-reg">
        <a href="../index.php" class="close-icon"><span class="close-icon"><ion-icon name="close" class="close-icon"></ion-icon></span></a>

        <!-- Tour guide login -->
        <div class="form tourguide-login">
            <h2>Login</h2>
            <center><p style="color: red; margin-top: 25px;"><?php echo  $_GET['error'] ?></p></center>
            <form action="../TG-Menu/dashboard.php" method="post">
                <div class="input-field1">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" id="tg_email" name="tg_email" required>
                    <label for="tg_email">Email</label>
                </div>
                <div class="input-field1">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" id="tg_password" name="tg_password" required>
                    <label for="tg_password">Password</label>
                </div>
                <div class="div2">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                    <a href="passreset-tg.php">Forgot Password?</a>
                </div>
                <button type="submit" name="tglgnsubmit" class="btn-login">Login</button>
                <div class="div3">
                    <p>Don't have an account?
                        <a href="#" class="register-link">Register</a>
                    </p>
                </div>
            </form>
        </div>

        <!-- tourguide-register -->
        <div class="form tourguide-register">

            <h2>Tour Guide Registration </h2>
            <center><p style="color: red;"><?php echo  $_GET['error'] ?></p></center>
            <form action="tg-register.php" method="post" autocomplete="off">
                <div class="input-field2"> 
                    <input type="text" name="tgfullname" id="tgfullname" required>
                    <label for="tgfullname">Full Name*</label>
                </div>
                <div class="input-field2">
                    <input type="text" name="tgmobile" id="tgmobile" required>
                    <label for="tgmobile">Mobile No*</label>
                </div>
                <div class="input-field2">
                    <input type="text" name="tgaddress" id="tgaddress" required>
                    <label for="tgaddress">Address*</label>
                </div>
                <div class="input-field2">
                    <input type="text" name="authorized" id="authorized" required>
                    <label for="authorized">Are You an Authorized Tour Guide?*</label>
                </div>
                <div class="input-field2">
                    <input type="email" name="tgemail" id="tgemail" required>
                    <label for="tgemail">Email*</label>
                </div>
                <div class="input-field2">
                    <input type="password" name="tgpassword" id="tgpassword" required>
                    <label for="tgpassword">Password*</label>
                </div>
                <div class="input-field2">
                    <input type="password" name="tgconfirmpassword" id="tgconfirmpassword" required>
                    <label for="tgconfirmpassword">Confirm Password*</label>
                </div>
                <div class="div2">
                    <label>
                        <input type="checkbox" required> I agree to the <a href="TnC/terms-condition.html">Terms & Conditions</a>
                    </label>
                </div>
                <button type="submit" name="btnTGregister" class="btnTGregister">Register</button>
                <div class="div3">
                    <p>Already have an account?
                        <a href="#" class="login-link">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        const tourguideform = document.querySelector('.tourguide-reg');

        const loginLink = document.querySelector('.login-link');

        const registerLink = document.querySelector('.register-link');

        const btnLogin = document.querySelector('.btn-login');

        loginLink.addEventListener('click', ()=> 
        {
            tourguideform.classList.add('active');
        });

        registerLink.addEventListener('click', ()=> 
        {
            tourguideform.classList.remove('active');
        });

    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

