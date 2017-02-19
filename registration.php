<?php
	include "database.php";

	if(isset($_POST['name'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$phone_number = $_POST['phone_number'];

		$checkUser = "SELECT id FROM users WHERE Username='".$username."'";
		$resultUser = $conn->query($checkUser);
		if($resultUser->num_rows > 0){
			$error = 1;
		}else{
			$checkNumber = "SELECT id FROM users WHERE PhoneNumber='".$phone_number."'";
			$resultNumber = $conn->query($checkNumber);
			if($resultNumber->num_rows > 0){
				$error = 2;
			}
		}

		if(!isset($error)){
			$registerUser = "INSERT INTO `users`(`Name`, `Username`, `Password`, `PhoneNumber`) VALUES ('".$name."', '".$username."','".md5($password)."','".$phone_number."')";

			$result = $conn->query($registerUser);	
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style type="text/css">
		.btn{
			border-radius: 0px;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
            <div class="col-md-4 col-md-offset-4">
            	<h2>Sign Up</h2>
            	<hr/>
            	<?php
            		if(isset($error)){
            			if($error == 1){
							echo "<div class='alert alert-danger' role='alert'>Error: Username exists.</div>";
            			}else if($error == 2){
							echo "<div class='alert alert-danger' role='alert'>Error: Phone Number exists.</div>";
            			}
            		}else{
            			if(isset($result)){
							if($result){
		            			echo "<div class='alert alert-success' role='alert'>Registration is complete!</div>";
		        			}else{
								echo "<div class='alert alert-danger' role='alert'>Error: Server issue.</div>";
		            		}
            			}
            		}
            	?>
            	<h5><span class="label label-warning">Fill up the following required information:</span></h5>
            	<form action="registration.php" method="POST">
            		<input type="text" placeholder="Full Name" class="form-control" required="true" name="name"></input>
            		<br/>
            		<input type="username" placeholder="Username" class="form-control" required="true" name="username"></input>
            		<br/>
            		<input type="password" placeholder="Password" class="form-control" required="true" name="password"></input>
            		<br/>
            		<input type="text" placeholder="Phone Number" minlength="11" maxlength="11" class="form-control" required="true" name="phone_number"></input>
            		<br/>
            		<button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span> Create Account</button>
            	</form>
            		<a href="index.php">Sign in</a>
            </div>
        </div>
	</div>

</body>
</html>