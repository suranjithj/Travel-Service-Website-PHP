<?php

include('../config.php');

if(isset($_GET['delid'])){

    $rid=intval($_GET['delid']);
    
    $sql=mysqli_query($conn,"delete from booking where bk_id=$rid");
    
    echo "<script>alert('Data deleted');</script>"; 
    echo "<script>window.location.href = 'dashboard.php'</script>";     
} 

?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="../dashboard-style.css" rel="stylesheet">
</head>

<body>


    <div id="main" class="main" >

        <header class="topbar" id="topbar">
                <div class="navbar-header">
                    <a class="name" href="../index.php"><span>Wonderscape of Sri Lanka</span></a></div>
        </header>
        
        <div class="menu">

            <!-- <div class="overlay" data-overlay></div> -->

            <div class="sidebar" data-navbar>
                <ul id="sidebarnav" class="sidebarnav">
                    <li class="sidebar-item"> <a class="sidebar-link" href="Manage Location/managelocation.php" sidebar-link>
                        <span class="hide-menu">Manage Travel Packages</span></a></li> 
                    <li class="sidebar-item"> <a class="sidebar-link" href="Manage-Hotels/managehotels.php" sidebar-link>
                        <span class="hide-menu">Manage Hotels</span></a></li> 
                    <li class="sidebar-item"> <a class="sidebar-link" href="Manage-Gallery/managegallery.php" sidebar-link>
                        <span class="hide-menu">Manage Gallery</span></a></li> 
                    <li class="sidebar-item"> <a class="sidebar-link" href="View-Inquiry/viewinq.php" sidebar-link>
                        <span class="hide-menu">Inquiries</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="Subscription/Subscription.php" sidebar-link>
                        <span class="hide-menu">Subscribed Mails</span></a></li>   
                    <li class="sidebar-item"> <a class="sidebar-link" href="../index.php" sidebar-link>
                        <span class="hide-menu">Go to Home</span></a></li>  
                    <li class="sidebar-item"><a href="../Login-Register/logout.php" class="logout">
                        <span class="hide-menu">Logout</span></a></li>             
                </ul>
                
            </div>
            <div class="dashboard-content"> 
                <div class="content-view" style="height:120px">
                    <h2>Welcome to Admin Dashboard!</h2>
                    <!-- Show all in dashboard -->
                    <h4 class="page-title">Bookings</h4>
                </div>
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper" style="height: 600px;">

                            <?php
                            session_start();

                            // checks if the session variable 'email' is not set. If the user is not logged in 
                            // it redirects the user to the login page or shows an access denied message.
                            if (!isset($_SESSION['email'])) {
                                // Redirect to login page or show access denied message
                                header("Location: ../Login-Register/login-register.php");
                                exit();
                            }

                            // Get the logged-in user's email from the session
                            $email = $_SESSION['email'];

                            ?>
                            
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>NIC or Passport No</th>                       
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>Preferred Date</th>                       
                                        <th>End Date</th>
                                        <th>Tour Package</th>
                                        <th>Amount</th>
                                        <th>No of Passengers</th>
                                        <th>Additional Informations</th>
                                        <th>Tour Guide Name</th>
                                        <th>Tour Guide Email</th>
                                        <th>Tour Guide Accept</th>
                                        <th>Tour Guide Confirmation</th>
                                        <th>Traveller Confirmation</th>
                                        <th>Traveller Feedback</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $ret=mysqli_query($conn,"select * from booking");
                                    $cnt=1;
                                    $row=mysqli_num_rows($ret);
                                    if($row>0){
                                    while ($row=mysqli_fetch_array($ret)) {

                                ?>
                                    <!--Fetch the Records -->
                                    <tr>
                                        <td><?php  echo $row['bk_fullname'];?></td>
                                        <td><?php  echo $row['bk_verifyopt'];?></td>                        
                                        <td><?php  echo $row['bk_email'];?></td>
                                        <td> <?php  echo $row['bk_mobileno'];?></td>
                                        <td><?php  echo $row['bk_address'];?></td>
                                        <td><?php  echo $row['bk_datefrom'];?></td>                        
                                        <td><?php  echo $row['bk_dateto'];?></td>
                                        <td> <?php  echo $row['title'];?></td>
                                        <td><?php  echo $row['price'];?></td>                        
                                        <td><?php  echo $row['bk_passenger'];?></td>
                                        <td> <?php  echo $row['bk_addinfo'];?></td>
                                        <td><?php  echo $row['tgfullname'];?></td>
                                        <td> <?php  echo $row['tg_email'];?></td>
                                        <td> <?php  echo $row['t_accept'];?></td>
                                        <td> <?php  echo $row['tg_confirm'];?></td>
                                        <td> <?php  echo $row['tr_confirm'];?></td>
                                        <td> <?php  echo $row['tr_feedback'];?></td>
                                        <td>  
                                            <a href="Manage-Booking/bktransfer.php?editid=<?php echo htmlentities ($row['bk_id']);?>" class="edit" title="Edit" data-toggle="tooltip">
                                            <ion-icon name="person-add-outline">&#xE254;</ion-icon><span>Transfer Booking</span></a>
                                            <a href="dashboard.php?delid=<?php echo ($row['bk_id']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');">
                                            <ion-icon name="trash-outline"></ion-icon>Delete</a>
                                        </td>                                        
                                    </tr>
                                    <?php 
                                    $cnt=$cnt+1;
                                    } } else {?>
                                    <tr>
                                        <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                                    </tr>
                                    <?php } ?>                 
                                                    
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>

                    <!-- show all payment details in dashboard -->
                    <div class="content-view" style="height:30px">
                        <h4 class="page-title">Payments</h4>
                    </div>
                    <div class="table-responsive">
                        <div class="table-wrapper" style="height: 400px;">
                            
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>NIC</th>
                                        <th>Email</th>
                                        <th>Amount (USD)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                       
                                    $ret = mysqli_query($conn, "SELECT pd.fullname, bk.bk_verifyopt, bk.bk_email, pd.amount FROM payment_details AS pd INNER JOIN booking AS bk ON pd.fullname = bk.bk_fullname");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);

                                    if ($row > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {

                                ?>
                                    <!--Fetch the Records -->
                                    <tr>
                                        <td><?php  echo $row['fullname'];?></td>
                                        <td><?php  echo $row['bk_verifyopt'];?></td>
                                        <td><?php  echo $row['bk_email'];?></td>
                                        <td><?php  echo $row['amount'];?></td>                        
                                    </tr>
                                    <?php 
                                    $cnt=$cnt+1;
                                    } } else {?>
                                    <tr>
                                        <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                                    </tr>
                                    <?php } ?>                 
                                                    
                                </tbody>
                            </table>
                        </div>
                    </div> 

                    <!-- Show all registered tour guides in dashboard -->
                    <div class="content-view" style="height:30px">
                        <h4 class="page-title">Tour Guides</h4>
                    </div>
                    <div class="table-responsive">
                        <div class="table-wrapper" style="height: 400px;">
                            
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Mobile No</th>
                                        <th>Address</th>
                                        <th>Authorized?</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                       
                                    $ret=mysqli_query($conn,"select * from tourguide");
                                    $cnt=1;
                                    $row=mysqli_num_rows($ret);
                                    if($row>0){
                                    while ($row=mysqli_fetch_array($ret)) {

                                ?>
                                    <!--Fetch the Records -->
                                    <tr>
                                        <td><?php  echo $row['tg_fullname'];?></td>
                                        <td><?php  echo $row['tg_mobile'];?></td>
                                        <td><?php  echo $row['tg_address'];?></td>
                                        <td><?php  echo $row['authorized'];?></td>  
                                        <td><?php  echo $row['tg_email'];?></td>                       
                                    </tr>
                                    <?php 
                                    $cnt=$cnt+1;
                                    } } else {?>
                                    <tr>
                                        <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                                    </tr>
                                    <?php } ?>                 
                                                    
                                </tbody>
                            </table>
                        </div>
                    </div> 

                </div> 
            </div>
        </div>
    </div>

    <!-- <script>
        const overlay = document.querySelector("[data-overlay]");
        
        const navbar = document.querySelector("[data-navbar]");
        
        const sideLinks = document.querySelectorAll("[sidebar-link]");

        const navElemArr = [overlay];

        const navToggleEvent = function (elem) {
        for (let i = 0; i < elem.length; i++) {
            elem[i].addEventListener("click", function () {
            navbar.classList.toggle("active");
            overlay.classList.toggle("active");
            });
        }
        }

        navToggleEvent(navElemArr);
        navToggleEvent(sideLinks);

    </script> -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>

</html>
