<?php

	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Asia/Kolkata");


		$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
		 
		$server = $url["us-cdbr-iron-east-05.cleardb.net"];
		$username = $url["ba13ac2ea1fc64"];
		$password = $url["0090cde6"];
		$db = substr($url["heroku_fb7c8e9620d0bf1"], 1);
		 
		$con = new mysqli($server, $username, $password, $db);


	// $con = mysqli_connect("localhost:3310","root","","spotify");

	// if(mysqli_connect_errno()){
	// 	echo "Failed to Connect " . mysqli_connect_errno();
	// }

	// :\xampp\mysql --host=us-cdbr-iron-east-05.cleardb.net --user=ba13ac2ea1fc64 --password=0090cde6 --reconnect heroku_fb7c8e9620d0bf1< spotify.sql	
?>