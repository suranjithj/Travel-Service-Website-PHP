<?php

error_reporting(0);
include('../config.php');

session_start();

if(isset($_POST['tglgnsubmit'])){

    $tg_email = $_POST['tg_email'];
    $tg_password = $_POST['tg_password']; 
    
    $maxAttempts = 5;
    $currentTime = time();
    $allowedTime = 1800;
    
    $query = "SELECT * FROM tourguide WHERE tg_email='$tg_email' AND tg_password='$tg_password' ORDER BY timestamp DESC LIMIT $maxAttempts";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1){
        
        $attemptsWithinAllowedTime = 0;
        while ($row1 = mysqli_fetch_assoc($result)) {
            if ($currentTime - strtotime($row1['timestamp']) <= $allowedTime) {
                $attemptsWithinAllowedTime++;
            }
        }
        
        if ($attemptsWithinAllowedTime >= $maxAttempts) {
            echo '<script>alert("Too many login attempts. Try again later.");</script>';
            exit();
        }

        $_SESSION['tg_email'] = $tg_email;
        echo '<script>alert("Login Successful"); window.location = "../TG-Menu/dashboard.php";</script>';   
        exit();
    } else {
        header('Location: ../Login-Register/tourguide-log-reg.php?error=You Have Entered Incorrect Email or Password');
        exit();
    }   

}

?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex,nofollow">
        
        <title>Tour Guide Dashboard</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../dashboard-style.css" rel="stylesheet">
    </head>

    <body>

        <div id="main" class="main" >

            <header class="topbar" id="topbar">
                    <div class="navbar-header">
                        <a class="name" href="../index.php"><span>Wonderscape of Sri Lanka</span></a></div>
            </header>
            
            <div class="menu">

                <div class="overlay" data-overlay></div>

                <div class="sidebar" data-navbar>
                    <ul id="sidebarnav" class="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link" href="#tours" sidebar-link>
                            <span class="hide-menu" id="title-1">My Tours</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="Update-Location/updatelocation.php" sidebar-link>
                            <span class="hide-menu">Update Package Information</span></a></li> 
                        <li class="sidebar-item"> <a class="sidebar-link" href="Update-Hotels/updatehotels.php" sidebar-link>
                            <span class="hide-menu">Update Hotel Information</span></a></li> 
                        <li class="sidebar-item"> <a class="sidebar-link" href="View-Inquiry/viewinq.php" sidebar-link>
                            <span class="hide-menu">Inquiries</span></a></li>                    
                        <li class="sidebar-item"> <a class="sidebar-link" href="../index.php" sidebar-link>
                            <span class="hide-menu">Go to Home</span></a></li>
                        <li class="sidebar-item"><?php 
                            if(!isset($_SESSION['authentication']))
                            {
                                ?>
                                <a href="../Login-Register/logout.php" class="logout"><span class="hide-menu">Logout</span></a>
                                <?php
                            }
                                ?></a></li>
                        </ul>

                </div>


                <div class="dashboard-content"> 
                    <div class="content-view" style="height:120px">
                        <h2>Welcome to Tour Guide Dashboard!</h2>
                        <h4 class="page-title">My Tours</h4>
                    </div>
                    <div class="container-xl">
                        <div class="table-responsive">
                            <div class="table-wrapper">
                                
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>                      
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
                                        <!-- Fetch the Records -->
                                        <?php
                                        $tg_email = $_SESSION['tg_email'];
                                        $ret = mysqli_query($conn, "SELECT * FROM booking WHERE tg_email = '$tg_email'");
                                        $cnt = 1;
                                        $row = mysqli_num_rows($ret);
                                        if ($row > 0) {
                                            while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $row['bk_fullname']; ?></td>
                                                    <td><?php echo $row['bk_email']; ?></td>
                                                    <td><?php echo $row['bk_mobileno']; ?></td>
                                                    <td><?php echo $row['bk_address']; ?></td>
                                                    <td><?php echo $row['bk_datefrom']; ?></td>
                                                    <td><?php echo $row['bk_dateto']; ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td><?php echo $row['bk_passenger']; ?></td>
                                                    <td><?php echo $row['bk_addinfo']; ?></td>
                                                    <td><?php echo $row['tgfullname']; ?></td>
                                                    <td><?php echo $row['tg_email']; ?></td>
                                                    <td><?php echo $row['t_accept']; ?></td>
                                                    <td><?php echo $row['tg_confirm']; ?></td>
                                                    <td><?php echo $row['tr_confirm']; ?></td>
                                                    <td><?php echo $row['tr_feedback']; ?></td>
                                                    <td>
                                                        <a href="Tours/accept.php?editid=<?php echo htmlentities($row['bk_id']); ?>" class="edit" title="Edit" data-toggle="tooltip">
                                                            <span>Accept </span><ion-icon name="checkmark-circle-outline" class="icon-complete">&#xE254;</ion-icon></a>
                                                        <a href="Tours/complete.php?editid=<?php echo htmlentities($row['bk_id']); ?>" class="edit" title="Edit" data-toggle="tooltip">
                                                            <span>Mark as Complete</span><ion-icon name="checkmark-circle-outline" class="icon-complete">&#xE254;</ion-icon></a>
                                                    </td>
                                                </tr>
                                        <?php
                                                $cnt = $cnt + 1;
                                            }
                                        } else {
                                        ?>
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

    </div>


        <script>
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

        </script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        
    </body>

</html>