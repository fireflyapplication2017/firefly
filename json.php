<?php

	include "database.php";

	if(isset($_POST['infoJson'])){
		$jsonMessage=$_POST['infoJson'];
    	$data = json_decode($jsonMessage, true);
    	foreach($data as $item){
	       $sql = "INSERT IGNORE INTO `users_information`(`users_id`, `Latitude`, `Longitude`) VALUES ('".$item['users_id']."','".$item['Latitude']."','".$item['Longitude']."')";
	       $result = $conn->query($sql);
	    }
	}

?>