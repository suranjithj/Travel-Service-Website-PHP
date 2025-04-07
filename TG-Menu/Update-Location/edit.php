<?php 

include('../../config.php');

if(isset($_POST['submit']))
{
	// Prepare SQL statement with placeholders
	$stmt = $conn->prepare("UPDATE tbllocation SET title=?, location=?, rating=?, price=?, description=?, description2=? WHERE id=?");

	// Bind parameters to placeholders
	$stmt->bind_param("ssssssi", $title, $location, $rating, $price, $description, $description2, $eid);

	// Set parameter values
	$title = $_POST['title'];
	$location = $_POST['location'];
	$rating = $_POST['rating'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$description2 = $_POST['description2'];
	$eid = $_GET['editid'];

	// Execute the prepared statement
	$stmt->execute();

	// Check for success
	if ($stmt->affected_rows > 0) {
		echo "<script>alert('You have successfully updated the data');</script>";
		echo "<script type='text/javascript'> document.location ='updatelocation.php'; </script>";
	} else {
		echo "<script>alert('Something went wrong. Please try again.');</script>";
	}

	// Close the statement
	$stmt->close();
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
		</style>
	</head>
	<body>
		<div class="update-form">
			<form  method="POST">
			<?php
			$eid=$_GET['editid'];
			$ret=mysqli_query($conn,"select * from tbllocation where id='$eid'");
			while ($row=mysqli_fetch_array($ret)) {
			?>
				<h2>Update </h2>

				<div class="form-group">
					<img src="../../Images/locationImages/<?php  echo $row['lpic'];?>" width="120" height="120">
					<a href="change-image.php?userid=<?php echo $row['id'];?>">Change Image</a>
				</div>

				<div class="form-group">
					<input type="text" class="form-control" name="title" value="<?php  echo $row['title'];?>" required="true">       	
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="location" value="<?php  echo $row['location'];?>" required="true">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="rating" value="<?php  echo $row['rating'];?>" required="true">
				</div>
				
				<div class="form-group">
					<input type="text" class="form-control" name="price" value="<?php  echo $row['price'];?>" required="true">
				</div>
				
				<div class="form-group">
					<textarea class="form-control" name="description" required="true"><?php  echo $row['description'];?></textarea>
				</div> 

				<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
				<div class="form-group">
					<label for="description">Description:</label>
					<textarea id="myTextarea" name="description2" rows="10" ><?php  echo $row['description2'];?></textarea>

					<br>
				</div>
				<script>
					ClassicEditor
						.create(document.querySelector("#myTextarea"))
						.catch(error => {
							console.error( error );
						} );
				</script>   

			<?php 
			}?>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
				</div>

				<div class="text-center"><a href="updatelocation.php" class="back">Back</a></div>
			</form>

			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

		</div>
	</body>
</html>