<?php
include('config.php');

$tg_id = $_GET['tour_guide'];
$eid = $_GET['eid']; 
// Query to fetch details of the selected tour guide
$sql = "SELECT * FROM tourguide WHERE tg_id = '$tg_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Tour Guide ID: " . $row["tg_id"]. "<br>";
       $tg_fullname = $row["tg_fullname"];
        echo "Mobile: " . $row["tg_mobile"]. "<br>";
        echo "Address: " . $row["tg_address"]. "<br>";
        echo "Authorized: " . $row["authorized"]. "<br>";
        $tg_email = $row["tg_email"];
        echo "Password: " . $row["tg_password"]. "<br>";
        echo "Timestamp: " . $row["timestamp"]. "<br>";
    }
} else {
    echo "No tour guide found with the provided email address.";
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">

		<title>Update Information</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<style>
			body {
				color: #fff;
				background: white;
				font-family: "Montserrat", sans-serif;
			}
			.form-control {
				height: 40px;
				box-shadow: none;
				color: #969fa4;
			}
			.form-control:focus {
				border-color: #5cb85c;
			}
			.form-control, .btn {        
				border-radius: 3px;
			}

			.btn {        
				font-size: 16px;
				background: #3b79c9;
				border-radius: 25px;
				font-weight: bold;		
				min-width: 140px;
				border: none;
				box-shadow: #3b79c9;
				outline: none !important;
			}

			.btn:hover{
				background-color: hsla(214, 57%, 51%, 0.214);
				color: black;
			}

			.update-form {
				width: 450px;
				margin: 0 auto;
				padding: 30px 0;
				font-size: 15px;
			}
			.update-form h2 {
				color: #636363;
				margin: 0 0 15px;
				position: relative;
				text-align: center;
			}
			.update-form h2:before, .update-form h2:after {
				content: "";
				height: 2px;
				width: 30%;
				background: #d4d4d4;
				position: absolute;
				top: 50%;
				z-index: 2;
			}	
			.update-form h2:before {
				left: 0;
			}
			.update-form h2:after {
				right: 0;
			}
			.update-form .hint-text {
				color: #999;
				margin-bottom: 30px;
				text-align: center;
			}
			.update-form form {
				color: #999;
				border-radius: 25px;
				margin-bottom: 15px;
				background: hsla(214, 57%, 51%, 0.179);
				border: 2px solid hsla(214, 57%, 51%, 0.214);
				box-shadow: #3b79c9;
				padding: 30px;
			}
			.update-form .form-group {
				margin-bottom: 20px;
			}
			.update-form input[type="checkbox"] {
				margin-top: 3px;
			}
			.update-form .btn {        
				font-size: 16px;
				font-weight: bold;		
				min-width: 140px;
				outline: none !important;
			}
			.update-form .row div:first-child {
				padding-right: 10px;
			}
			.update-form .row div:last-child {
				padding-left: 10px;
			}    	
			.update-form a {
				color: #fff;
				text-decoration: underline;
			}
			.update-form a:hover {
				text-decoration: none;
			}
			.update-form form a {
				color: #5cb85c;
				text-decoration: none;
			}	
			.update-form form a:hover {
				text-decoration: underline;
			}  
			.update-form .back {
				color: black;
				font-weight: bold;
				text-decoration: none;
			}

			.selectlink{
				width: 100%;
				height: 40px;
				box-shadow: none;
				color: black;
				margin-bottom: 15px;
			}
			.update-form .span-txt{
				color: black;
				padding: 15px;
				
			}
		</style>
	</head>
	<body>
		<div class="update-form">
			<form method="post" action="comfrem.php">

				<h2>Transfer Booking to Tour Guide</h2>

				<div class="form-group">
					<span class="span-txt">Enter Tour Guide Name</span>
					<input type="text" class="form-control" name="tgfullname" value="<?php echo $tg_fullname; ?>" required>
				</div>

				<div class="form-group">
					<span class="span-txt">Enter Tour Guide Mail</span>
					<input type="text" class="form-control" name="tg_email" value="<?php echo $tg_email; ?>" required>
				</div>

				<input type="hidden" value="<?php echo $eid ?>" name="eid">

				<div class="form-group">
					<button type="submit" class="btn btn-success btn-lg btn-block">Transfer</button>
				</div>

				<div class="text-center"><a href="../dashboard.php" class="back">back</a></div>
			</form>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</body>
</html>