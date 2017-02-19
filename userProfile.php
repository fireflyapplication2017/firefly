<?php
	
	session_start();

	include "database.php";

	if(!isset($_SESSION['username'])){
		header("Location: http://localhost/FireFly");
	}

	if(isset($_POST['name'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$pnumber = $_POST['pnumber'];
		$updateUser = "UPDATE users SET Name='".$name."', 
		Username='".$username."',
		PhoneNumber='".$pnumber."' WHERE username='".$username."';";
		$resultUpdate = $conn->query($updateUser);
	}

	$selectInfo = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
	$resultInfo = $conn->query($selectInfo);
	while($row = $resultInfo->fetch_assoc()){
		$id = $row['id'];
		$name = $row['Name'];
		$username = $row['Username'];
		$pnumber = $row['PhoneNumber'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style type="text/css">
		.btn{
			border-radius: 0px;
		}
	</style>
</head>
<body>
	<header>
		<div class="wrapper">
			<div class="container-fluid">
				<!-- Logo -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">Fire Fly</a>	
				</div>

				<!-- Menu Items -->
				<div class="collapse navbar-collapse" id="mainNavBar" >
					<ul class="nav navbar-nav">
						<?php
							if($_SESSION['role'] == 1){
								echo "<li id='refresh-view'><a href='#'>Refresh</a><span></span></li>";
								echo "<li><a href='dashboard.php'>Home</a></li>";
								echo "<li><a href='userProfile.php'>Profile</a></li>";
							}else{
								echo "<li><a href='userProfile.php'>Home</a></li>";
							}
						?>
						
						<li><a href="logout.php">Logout</a><span></span></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<div class="wrapper">
		<?php 
			if(isset($resultUpdate)){
				if($resultUpdate){
					echo "<br/>";
		            echo "<div class='alert alert-success' role='alert'>Update Success!</div>";
				}else{
					echo "<br/>";
		            echo "<div class='alert alert-danger' role='alert'>Error: Please Try Again!</div>";
				}
			} 
		?>
		<h2>User Information:</h2>
		<hr/>
		<form action="userProfile.php" method="POST">
			<label>Full Name:</label>
			<input type="text" class="form-control" name="name" value="<?php echo $name; ?>"></input>
			<br/>
			<label>Username:</label>
			<input type="username" class="form-control" name="username" value="<?php echo $username; ?>"></input>
			<br/>
			<label>Phone Number:</label>
			<input type="text" class="form-control" name="pnumber" maxlength="11" minlength="11" value="<?php echo $pnumber; ?>"></input>
			<br/>
			<label>Role:</label>
			<?php
			    if($_SESSION['role'] == 1){
					echo "<h4>Admin</h4>";			    	
			    }else{
					echo "<h4>Subsrciber</h4>";
			    }
			?>
			<br/>
			<button type="submit" class="btn btn-success form-control"><span class="glyphicon glyphicon-ok"></span> Update</button>
		</form>
	</div>
</body>
</html>