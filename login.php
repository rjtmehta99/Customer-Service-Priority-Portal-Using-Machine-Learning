<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dell</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/sweetalert-dev.js"></script>
</head>
<style type="text/css">
	body{
  			background-color: lightgrey;
  		}

</style>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1 id="header" class="text-center" >View User Details</h1>
		</div>
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<form name="loginForm" action="verify_user.php" method="POST">
					<div class="form-group">
						<label for="email">Enter User Email Id</label>
						<input required type="text" id="email" class="form-control" name="email"/>
					</div>
					
					<div class="form-group">
						<input type="submit" class="btn btn-primary form-control" value="View Details">
					</div>
					
				</form>
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div>
	<?php 
		if(isset($_SESSION['message'])){
			echo "<script>sweetAlert('".$_SESSION['message']."');</script>";
			  unset($_SESSION['message']);
			//session_destroy();
		}
	?>
</body>
</html>