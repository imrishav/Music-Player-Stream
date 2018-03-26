<?php

	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Asia/Kolkata");

	$con = mysqli_connect("localhost:3310","root","","spotify");

	if(mysqli_connect_errno()){
		echo "Failed to Connect " . mysqli_connect_errno();
	}


?>