<?php
include("../../config.php");


if(isset($_POST['playlistId'])){
	$playlistId = $_POST['playlistId'];

	$playlistQuery = mysqli_query($con, "DELETE FROM playlist WHERE id='$playlistId'");
	$songsQuery = mysqli_query($con, "DELETE FROM playlistsongs WHERE playlistId='$playlistId'");
}
else {
	echo "Playlist Id  was not passed into deletePlaylist.php";
}



?>