<?php

include('../config.php');

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    
    <title>User Dashboard</title>

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
                    <li class="sidebar-item"> <a class="sidebar-link" href="#booking" sidebar-link>
                        <span class="hide-menu" id="title-1">My Booking</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="Inquiries/viewinq.php" sidebar-link>
                        <span class="hide-menu">Inquiries</span></a></li> 
                    <li class="sidebar-item"> <a class="sidebar-link" href="../index.php" sidebar-link>
                        <span class="hide-menu">Go to Hone</span></a></li>  
                    <li class="sidebar-item"><a href="../Login-Register/logout.php" class="logout"><span class="hide-menu">Logout</span></a></li>                   
                </ul>

            </div>
                <div class="dashboard-content"> 
                    <div class="content-view" style="height:120px">
                        <h2>Welcome to Traveller Dashboard!</h2>
                        <h4 class="page-title">My Tours</h4>
                    </div>
                    <div class="container-xl">
                        <div class="table-responsive">
                            <div class="table-wrapper">
                                <?php
                                // Start the session
                                session_start();

                                // Check if the 'email' session variable is set
                                if (!isset($_SESSION['email'])) {
                                    // Redirect to login page or show access denied message
                                    header("Location: login-register.php");
                                    exit();
                                }

                                // Get the logged-in user's email from the session
                                $email = $_SESSION['email'];

                                // Query to retrieve booking information
                                $ret = mysqli_prepare($conn, "SELECT * FROM booking WHERE bk_email = ?");
                                mysqli_stmt_bind_param($ret, "s", $email);
                                mysqli_stmt_execute($ret);
                                $result = mysqli_stmt_get_result($ret);
                                $row = mysqli_num_rows($result);
                                ?>

                                                    
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
                                            <th>Choosed Guide Name</th>
                                            <th>Tour Guide Email</th>
                                            <th>Tour Guide Accept</th>
                                            <th>Tour Guide Confirmation</th>
                                            <th>Traveller Confirmation</th>
                                            <th>Your Feedback</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($row > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                                <!-- Fetch the Records -->
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
                                                        <a href="Tours/complete.php?editid=<?php echo htmlentities($row['bk_id']); ?>" class="edit" title="Edit" data-toggle="tooltip">
                                                            <span>Mark as complete</span><ion-icon name="checkmark-circle-outline" class="icon-complete">&#xE254;</ion-icon></a>
                                                        <a href="Tours/feedback.php?editid=<?php echo htmlentities($row['bk_id']); ?>" class="edit" title="Edit" data-toggle="tooltip">
                                                            <span>Give Feedback</span><ion-icon name="checkmark-circle-outline" class="icon-complete">&#xE254;</ion-icon></a>
                                                    </td>
                                                </tr>
                                            <?php
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
    
</body>

</html>