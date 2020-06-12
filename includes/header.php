<?php

include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Songs.php");
include("includes/classes/User.php");
include("includes/classes/Playlist.php");
//session_destroy(); //LOFOUT..
if(isset($_SESSION['userLoggedIn'])){

 	$userLoggedIn = new User($con, $_SESSION['userLoggedIn']);

	$userName = $userLoggedIn->getUserName();
	echo "<script>

	userLoggedIn ='$userName';



	</script>";
}

else{

	header("Location: register.php");
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>RisTunes</title>

	<link rel="stylesheet" type="text/css" href="assests/css/style.css">
	<link rel="stylesheet" type="text/css" href="assests/css/alertify.default.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assests/js/script.js"></script>
	<!-- <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/ngAlertify.js"></script> -->
	
	<!-- <script type="assests/js/alertify.min.js"></script> -->
</head>
<body>

<!-- For Simply Playing Music 
<script>
	var audioElement = new Audio();
	audioElement.setTrack("assests/music/HymnfortheWeekend.mp3");
	audioElement.audio.play();

</script> -->






<div id="mainContainer">

		<div id="topContainer">

			<?php include("includes/navBarContainer.php"); ?>


			<div id="mainViewContainer">
			 <!-- <div id="picka"> -->
					<div id="mainContent">

	 
					
			