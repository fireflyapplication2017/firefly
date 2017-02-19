<?php

	session_start();

	if(!isset($_SESSION['username'])){
		header("Location: http://localhost/FireFly");
	}

	if(isset($_SESSION['role'])){
		if($_SESSION['role'] != 1){
			header("Location: http://localhost/FireFly");
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>File Fly</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
						<li id="refresh-view"><a href="#">Refresh</a><span></span></li>
						<li><a href="dashboard.php">Home</a><span></span></li>
						<li><a href="userProfile.php">Profile</a><span></span></li>
						<li><a href="logout.php">Logout</a><span></span></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<div class="wrapper">
		<div id="map-content" >
			<section id="map-section"></section>
			<aside id="personal-secrion">
				<div id="display-block"></div>		
			</aside>
		</div>
	</div>

	<script>
		function initMap() {
	        var myLatLng = {lat: 6.7575090, lng: 125.3523980};

	        var map = new google.maps.Map(document.getElementById('map-section'), {
	          zoom: 15,
	          center: myLatLng
	        });

	        var marker = new google.maps.Marker({
	          position: myLatLng,
	          map: map,
	          title: 'Hello World!'
	        });
      	}
	</script>
	<script
	  src="https://code.jquery.com/jquery-3.1.1.js"
	  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
	  crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2kN3N_RXKjqvUBxW4VetfvBZzuKc4c58&callback=initMap"></script>
</body>
</html>