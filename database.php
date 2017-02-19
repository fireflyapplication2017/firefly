<?php

	$dbhost = "localhost";
	$dbtable = "DBFireFly";
	$dbuser = "root";
	$dbpass = "";
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbtable);
	if(!$conn){
		die("Could not connect: " . mysql_error());
	}

?>