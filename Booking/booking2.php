<?php 
error_reporting(0);

$location = $_GET['location'] ;
$price = $_GET['price'] ;

session_start();

// Check if the 'email' session variable is set
if(!isset($_SESSION['email'])) {
    // Redirect to login page or show access denied message
    header("Location: ../Login-Register/login-register.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking Form</title>
        <!-- Bootstrap 5.3.1 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery UI CSS -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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

            .div-bookingform{
                position: relative;
                width: 500px;
                height: 1100px;
                background: hsla(214, 57%, 51%, 0.179);
                border: 2px solid hsla(214, 57%, 51%, 0.214);
                border-radius: 20px;
                backdrop-filter: blur(20px);
                box-shadow: hsl(214, 57%, 51%);
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
                transition: transform .4s ease;
            }

            .div-bookingform.active-window{
                transform: scale(1);
            }

            .div-bookingform.active{
                height: 720px;
            }

            .div-bookingform .form{
                width: 100%;
                padding: 40px;
            }

            .div-bookingform .close-icon{
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
                font-weight: bold;
            }

            .form-item{
                position: relative;
                width: 100%;
                height: 50px;
                border-bottom: 2px solid hsl(214, 57%, 51%);
                margin: 30px 0;
            }

            .form-item label{
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

            .form-item input:focus~label, .form-item input:valid~label{
                top: -5px;
            }

            .form-item input{
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

            .form-item .date{
                align-items: center;
                justify-content: center;
                text-align: center;
            }

            .form-item .icon{
                position: absolute;
                right: 8px;
                font-size: 18px;
                color: hsl(214, 57%, 51%);
                line-height: 57px;

            }

            .form-item .information{
                width: 100%;
                height: 100px;
                font-size: 18px;
                margin-top: 25px;
            }

            .form-item .additionalinfo{
                margin-top: -20px;
            }

            .btnsubmitbk{
                width: 100%;
                height: 35px;
                margin-top: 65px;
                background: hsl(214, 57%, 51%);
                border: none;
                outline: none;
                border-radius: 15px;
                cursor: pointer;
                font-size: 22px;
                font-weight: 500;
                color: white;
            }

            .btnsubmitbk:hover{
                background-color: #01213c;;
            }

        </style> 

    </head>
    <body>
        <div class="div-bookingform">
            <a href="../index.php" class="close-icon"><span class="close-icon"><ion-icon name="close" class="close-icon"></ion-icon></span></a>
            
            <div class="form booking">
                <h2>Book a Tour</h2>
                <form action="booking.php" method="post" autocomplete="off">

                    <div class="form-item">
                        <input type="text" class="fullname" id="fullname" name="fullname" required >
                        <label for="fullname">Full Name*</label></div>

                    <div class="form-item">
                        <input type="text" class="verifyopt" id="verifyopt" name="verifyopt" required>
                        <label for="verifyopt">NIC or Passport No*</label></div>
                    
                    <div class="form-item">
                        <input type="email" class="email" id="email" name="email" required>
                        <label for="email">Email*</label></div>
                    
                    <div class="form-item">
                        <input type="tel" class="mobileno" id="mobileno" name="mobileno" required>
                        <label for="mobileno">Mobile Number*</label></div>
                    
                    <div class="form-item">
                        <input type="text" class="address" name="address" id="address" required>
                        <label for="address">Your Address*</label></div>
                    
                    <div class="form-item">
                        <input type="text" class="from" id="from" name="from" required>
                        <label for="from">Preferred Date*</label></div>
                    <div class="form-item">
                        <input type="text" class="to" id="to" name="to" required>
                        <label for="to">End Date*</label></div>

                    <!-- get the package name from package details -->
                    <?php if (empty($location)): ?>
                    <div class="form-item">
                        <input type="text" class="location" name="location" id="location" required>
                        <label for="location">Package*</label></div>
                    <?php else: ?>
                    <div class="form-item">
                        <input type="text" class="location" value="<?php echo $location ?>" name="location" id="location" required>
                        <label for="location">Package*</label>
                    </div>
                    <?php endif ?>
                   
                    <!-- get the package price from package details -->
                    <?php if (empty($price)): ?>
                        <div class="form-item">
                            <input type="text" id="price" name="price" class="price" required>
                            <label for="price">Package Fee (USD/ $) Per Person</label>
                        </div>
                    <?php else: ?>
                        <div class="form-item">
                            <input type="text" class="price" value="<?php echo $price ?>" name="price" id="price" required>
                            <label for="price">Package Fee (USD/ $) Per Person</label>
                        </div>
                    <?php endif ?>
                    
                    <div class="form-item">
                        <input type="number" id="passenger" name="passenger" min="1" required >
                        <label for="passenger">No of Passengers (with Childs)*</label></div>
                    
                    <div class="form-item"><label for="information" class="additionalinfo" name="additionalinfo">Additional Informations</label>
                        <textarea class="information" id="information" name="information"></textarea></div>

                        <!-- send fullname and price to payment page with link -->
                        <a href="../card.php?fullname=<?php echo $fullname ?> &price=<?php echo $price; ?>">
                        <button type="submit" id="btnsubmitbk" name="btnsubmitbk" class="btnsubmitbk">Submit Booking</button></a>
                </form>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- Function to disable past dates -->
        <script>
            var dateToday = new Date(); //creates a new JavaScript Date object representing the current date and time. This will be used as the minimum date for the datepicker
            var dates = $("#from, #to").datepicker({ // selects the input fields with IDs from and to using jQuery and initializes the datepicker widget
                defaultDate: "+1d", //sets the default date for the datepicker to be one day ahead of the current date
                changeMonth: true, //enables the month dropdown in the datepicker, allowing users to select a month from a dropdown menu
                numberOfMonths: 2, //specifies that the datepicker should display two months at a time
                minDate: dateToday, //sets the minimum selectable date in the datepicker to the current date
                onSelect: function(selectedDate) { // specifies a function to be executed when a date is selected in the datepicker
                    var option = this.id == "from" ? "minDate" : "maxDate", //determines whether the selected date is for the from input field or the to input field
                        instance = $(this).data("datepicker"),
                        date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                    dates.not(this).datepicker("option", option, date); //ensures that the user cannot select a date earlier than the selected from date in the to datepicker
                }
            });
        </script>
    </body>
</html>