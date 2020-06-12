<?php


if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
	ini_set('display_errors', 1);
error_reporting(-1);
	//echo "came from ajaxk";
	include("includes/config.php");
	include("includes/classes/User.php");
	include("includes/classes/Artist.php");
	include("includes/classes/Album.php");
	include("includes/classes/Songs.php");
	include("includes/classes/Playlist.php");
	include("includes/classes/AdminClass.php");

	if(isset($_GET['userLoggedIn'])){
		$userLoggedIn = new User($con, $_GET['userLoggedIn']);
	}
	else{
		echo "username is not set Variable";
	} 


}
else {
	ini_set('display_errors', 1);
error_reporting(-1);
	include("includes/header.php");
	include("includes/footer.php");

	$url = $_SERVER['REQUEST_URI'];
	echo "<script>openPage('$url')</script>";

	exit();



}

?>