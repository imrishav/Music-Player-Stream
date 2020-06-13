<?php


if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){

	//echo "came from ajaxk";
	include("includes/config.php");
	include("includes/cLasses/User.php");
	include("includes/cLasses/Artist.php");
	include("includes/cLasses/Album.php");
	include("includes/cLasses/Songs.php");
	include("includes/cLasses/Playlist.php");

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