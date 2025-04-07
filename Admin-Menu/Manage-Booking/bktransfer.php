<?php 

include('../../config.php');

if(isset($_POST['submit']))
  {
  	$eid=$_GET['editid'];
	$tgfullname=$_POST['tgfullname'];
	$tgemail=$_POST['tg_email'];

    $query=mysqli_query($conn, "update booking set tgfullname='$tgfullname', tg_email='$tgemail' where bk_id='$eid'");
     
    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='../dashboard.php'; </script>"; 
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
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
			<form method="GET" action="submit.php">
				<h2>Transfer Booking to Tour Guide</h2>
				<?php
				$eid = $_GET['editid'];

				$ret = mysqli_query($conn, "select * from tourguide");
				?>
				<select name="tour_guide" class="form-control" name="tour_guide">
					<option value="">Select</option>
					<?php
					while ($row = mysqli_fetch_array($ret)) {
						?>
						<option value="<?php echo $row['tg_id']; ?>"><?php echo $row['tg_email']; ?></option>
						<?php
					}
					?>
				</select>
				<input type="hidden" name="eid" value="<?php echo $eid ?>">
				<br>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-lg btn-block">Transfer</button>
				</div>

				<div class="text-center">
					<a href="../dashboard.php" class="back">Back</a>
				</div>
			</form>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</body>
</html>