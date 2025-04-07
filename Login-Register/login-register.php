<?php 

error_reporting(0);
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

$emailErr = $passwordErr = "";

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

        /* Login and Registration */

        .div1{
            position: relative;
            width: 500px;
            height: 590px;
            background: hsla(214, 57%, 51%, 0.179);
            border: 2px solid hsla(214, 57%, 51%, 0.214);
            border-radius: 20px;
            backdrop-filter: blur(20px);
            box-shadow: #3b79c9;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            transition: transform .4s ease ,height .2s ease;
        }

        .div1.active-window{
            transform: scale(1);
        }

        .div1.active{
            height: 870px;
        }

        .div1 .form{
            width: 100%;
            padding: 40px;
            
        }

        .div1 .form.login{
            transition: transform .2s ease;
            transform: translateX(0);
        }

        .div1.active .form.login{
            transition: none;
            transform: translateX(-500px);
        }

        .div1 .form.register{
            position: absolute;
            transition: none;
            transform: translateX(500px);
        }

        .div1.active .form.register{
            transition: transform .2s ease;
            transform: translateX(0);
        }

        .div1 .close-icon{
            position: absolute;
            top: 3px;
            right: 3px;
            width: 35px;
            height: 35px;
            font-size: 35px;
            color: #3b79c9;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom-left-radius: 20px;
        }

        .form h2{
            font-size: 35px;
            color: #3b79c9;
            text-align: center;
            
        }

        .input-1 {
            position: relative;
            width: 100%;
            height: 50px;
            border-bottom: 2px solid #3b79c9;
            margin: 60px 0;
        }

        .input-2{
            position: relative;
            width: 100%;
            height: 50px;
            border-bottom: 2px solid #3b79c9;
            margin: 30px 0;
        }

        .input-1 label{
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 18px;
            color: #3b79c9;
            font-weight: 500;
            pointer-events: none;
            transition: .4s;
        }

        .input-2 label{
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 18px;
            color: #3b79c9;
            font-weight: 500;
            pointer-events: none;
            transition: .4s;
        }

        .input-1 input:focus~label, .input-1 input:valid~label{
            top: -5px;
        }

        .input-2 input:focus~label, .input-2 input:valid~label{
            top: -5px;
        }

        .input-1 input{
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

        .input-2 input{
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

        .input-1 .icon{
            position: absolute;
            right: 8px;
            font-size: 18px;
            color: #3b79c9;
            line-height: 57px;

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
            accent-color: #3b79c9;
            margin-right: 3px;
        }

        .div2 a{
            color: black;
            text-decoration: none;
            font-weight: 550;
        }

        .div2 a:hover{
            text-decoration: underline;
            color: #3b79c9;
        }

        .btn-login, .btn-register{
            width: 100%;
            height: 35px;
            background: #3b79c9;
            border: none;
            outline: none;
            border-radius: 15px;
            cursor: pointer;
            font-size: 22px;
            font-weight: 500;
            color: white;
            
        }

        .btn-login:hover, .btn-register:hover{
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
            color: #3b79c9;
        }


        .div1 .login select, .div1 .register select{
            font-size: 18px;
            background: hsla(214, 57%, 51%, 0.4);
            float: right;
            color: rgb(0, 0, 0);
            align-items: end;
            justify-content: center;
            padding-right: 0;
            border-radius: 15px;
            padding-left: 5px;
            padding-right: 5px;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <!-- login -->
    <div class="div1">
        <a href="../index.php" class="close-icon"><span class="close-icon"><ion-icon name="close" class="close-icon"></ion-icon></span></a>
        <div class="form login">

            <h2>Login</h2>
            <center><p style="color: red; margin-top: 25px;"><?php echo  $_GET['error'] ?></p></center>
            <form action="login.php" method="post">
                <div class="input-1">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" id="email" name="email" required>
                    <label for="email">Email</label> 
                </div>
                <div class="input-1">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label> 
                </div>
                <div class="div2">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                    <a href="passwordreset.php">Forgot Password?</a>
                </div>
                <button type="submit" name="lgnsubmit" class="btn-login">Login</button>
                <div class="div3">
                    <p>Don't have an account?
                        <a href="#" class="register-link">Register</a>
                    </p>
                </div>
            </form>
        </div>
 
        <!-- register -->
        <div class="form register">
            <h2>Register</h2>
            <center><p style="color: red;"><?php echo  $_GET['error'] ?></p></center>
            <form action="register.php" method="post" autocomplete="off">
                <div class="input-2">
                    
                    <input type="text" name="fname" id="fname" required>
                    <label for="fname">First Name</label>
                </div>
                <div class="input-2"> 
                    
                    <input type="text" name="lname" id="lname" required>
                    <label for="lname">Last Name</label>
                </div>
                <div class="input-2">
                    
                    <input type="text" name="mobile" id="mobile" required>
                    <label for="mobile">Mobile No</label>
                </div>
                <div class="input-2">
                    
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-2">
                    
                    <input type="password" name="password" id="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="input-2">
                    <input type="password" name="confirmpassword" id="confirmpassword" required> 
                    <label for="confirmpassword">Confirm Password</label>
                </div>
                <div class="div2">
                    <label>
                        <input type="checkbox" required> I agree to the <a href="TnC/terms-condition.html">Terms & Conditions</a>
                    </label>
                </div>
                <button type="submit" name="rgssubmit" class="btn-register">Register</button>
                <div class="div3">
                    <p>Already have an account?
                        <a href="#" class="login-link">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Login and Register Scripts -->
    <script>
        const div1 = document.querySelector('.div1'); //Selects the div element with the class div1 and assigns it to the variable
        //Selects the element with the class login-link and assigns it to the variable
        const loginLink = document.querySelector('.login-link'); 
        //Selects the element with the class register-link and assigns it to the variable
        const registerLink = document.querySelector('.register-link'); 
        //Selects the element with the class btn-login and assigns it to the variable
        const btnLogin = document.querySelector('.btn-login');

        //add to event listener
        registerLink.addEventListener('click', ()=> 
        {   //When the registerLink is clicked, it adds the class active to the div1 element, making it visible
            div1.classList.add('active');
        });

        loginLink.addEventListener('click', ()=> 
        {   //When the loginLink is clicked, it removes the class active from the div1 element, hiding it
            div1.classList.remove('active');
        });

    </script>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

