<?php
	session_start();

	include "database.php";

	if(isset($_SESSION['username'])){
		if($_SESSION['role'] == 1){
			header("Location: http://localhost/FireFly/dashboard.php");
		}else{
			header("Location: http://localhost/FireFly/userProfile.php");
		}
	}

	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$checkUser = "SELECT role FROM users WHERE Username='".$username."' &&
		Password='".md5($password)."'";

		$result = $conn->query($checkUser);

		if($result){
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$_SESSION['username'] = $username;
				$_SESSION['role'] = $row['role'];
				echo $row['role'];
				if($row['role'] == 1){
					header("Location: http://localhost/FireFly/dashboard.php");
				}else{
					header("Location: http://localhost/FireFly/userProfile.php");
				}
			}else{
				$error = true;
			}
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style type="text/css">
		.btn{
			border-radius: 0px;
		}

		input{
			border-radius: 0px;
		}

	</style>
</head>
<body>

	<div class="container">
		<div class="row">
            <div class="col-md-4 col-md-offset-4">
            	<h3>Login</h3>
            	<hr/>
            	<?php
            		if(isset($error)){
						echo "<div class='alert alert-danger' role='alert'>Error: User does not exist.</div>";
            		}
            	?>
            	<form action="http://localhost/FireFly/" method="POST">
            		<input class="form-control" placeholder="Username" type="text" name="username"></input>
	            	<br/>
	            	<input class="form-control" placeholder="Password" type="password" name="password"></input>
	            	<br/>
	            	<button class="btn btn-primary form-control"><span class="glyphicon glyphicon-user"></span> Submit</button>
	            	<a href="registration.php"> Don't have account yet?</a>
            	</form>
            </div>
        </div>
	</div>

</body>
</html>