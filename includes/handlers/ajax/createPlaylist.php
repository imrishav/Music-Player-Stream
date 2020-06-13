<?php

include("../../config.php");

if(isset($_POST['name']) && isset($_POST['username'])){
	var_dump($_POST);
	die();
	$name = $_POST['name'];
	$username = $_POST['username'];
	$date = date("Y-m-d");


	$query = mysqli_query($con, "INSERT INTO playlist VALUES('','$name','$username','$date')");
}

else {
	echo "Name or Username Not passed into file";
}

?>