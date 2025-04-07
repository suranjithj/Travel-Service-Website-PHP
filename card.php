<!DOCTYPE html>
<html lang="en">
<?php 

error_reporting(0);

$fullname = $_GET['fullname'] ;
$price = $_GET['price'] ;
$passenger = $_GET['passenger'] ;

//calculate total amount to pay
$total = $price * $passenger;

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-Payment-Form-.css">
    <link rel="stylesheet" href="assets/css/Image-Tab-Gallery-Horizontal.css">
</head>

<body><br><br>  
    <div class="row .payment-dialog-row">
        <div class="col-12 col-md-4 offset-md-4">
            <div class="card credit-card-box">
                <div class="card-header">

                    <h3><span class="panel-title-text">Payment Details </span></h3>
                </div>
                <div class="card-body">
                    <form id="payment-form" action="insert.php" method="post">

                    <?php if (empty($fullname)): ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3"><label class="form-label" for="fullname">Full name</label>
                                    <div class="input-group"><input class="form-control" type="tel" id="fullname" name="fullname" required="" ></div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3"><label class="form-label" for="fullname">Full name</label>
                                    <div class="input-group"><input class="form-control" value="<?php echo $fullname?>" type="text" id="fullname" name="fullname" required="" ></div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                    <?php if (empty($total)): ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3"><label class="form-label" for="amount">Total Amount (USD)</label>
                                    <div class="input-group"><input class="form-control" type="text" id="amount" name="amount" required="" ></div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3"><label class="form-label" for="total">Total Amount (USD)</label>
                                <div class="input-group"><input class="form-control" value="<?php echo $total?>" type="text" id="total" name="total" required="" ></div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3"><label class="form-label" for="cardNumber">Card number </label>
                                    <div class="input-group"><input class="form-control" type="tel" id="cardNumber" name="cardNumber" required="" placeholder="Valid Card Number"><span class="input-group-text"><i class="fa fa-credit-card"></i></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group mb-3"><label class="form-label" for="cardExpiry"><span>expiration </span><span>EXP </span> date</label><input class="form-control" type="tel" id="cardExpiry" required="" name="cardExpiry" placeholder="MM / YY"></div>
                            </div>
                            <div class="col-5 pull-right">
                                <div class="form-group mb-3"><label class="form-label" for="cardCVC">cv code</label><input class="form-control" name="cardCVC" type="tel" id="cardCVC" required="" placeholder="CVC"></div>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $location; ?>" name="location">
                        
                        <div class="row">
                            <div class="col-12"><button class="btn btn-success btn-lg d-block w-100" type="submit">Confirm</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Image-Tab-Gallery-Horizontal.js"></script>
</body>

</html>