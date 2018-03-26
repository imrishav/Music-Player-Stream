<?php  
include("includes/includedFiles.php");

if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
}
else {
	header("Location: index.php");
}

$album = new Album($con, $albumId);
$artist = $album->getArtist();
?>

<div class="entityInfo">

	<div class="leftSection">
		<img src="<?php echo $album->getArtworkPath(); ?>">
	</div>

	<div class="rightSection">
		<h2><?php echo $album->getTitle();  ?></h2>
		<p> By <?php echo $artist->getName(); ?></p>
		<p><?php echo $album->getNumbersofSongs(); ?> Songs</p>
	</div>

</div>





<div class="trackListContainer">
	
	<ul class="trackList">
		
		<?php
			$songIdArray = $album->getSongIds();

			$i =1;

			foreach ($songIdArray as $songsId) {
				$albumSong = new Songs($con, $songsId);
				$albumArtist = $albumSong->getArtist();
				//echo $albumSong->getTitle() . "<br>";

				echo "<li class='trackListRow'>
							<div class='trackCount'>
							<img class='play' src='assests/images/icons/play-white.png' onclick='setTrack(" . $albumSong->getId() .", tempPlaylist, true)'>
							<span class='trackNumber'>$i</span>
							</div>

							<div class='trackInfo'>
								<span class='trackName'>" . $albumSong->getTitle() ."</span>
								<span class='artistName'>" . $albumArtist->getName() ."</span>

							</div>

							<div class='trackOptions'>
								<input type='hidden' class='songId' value='" . $albumSong->getId() ."'>
								<img class='optionsButton' src='assests/images/icons/more.png' onclick='showOptionsMenu(this)'>
								
							</div>

							<div class='trackDuration'>
								<span class='duration'>" . $albumSong->getDuration() ."</span>
								
							</div>

						</li>";

				$i = $i +1;

			}

		?>



		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';

			tempPlaylist = JSON.parse(tempSongIds);


		</script>


	</ul>

</div>

<nav class="optionMenu">
	
	<input type="hidden" class="songId">
	<!-- <div class="item">Add to Playlist</div> -->
	<?php echo Playlist::getPlaylistDropDown($con, $userLoggedIn->getUsername());?>
	<div class="item">Item 2</div>
	<div class="item">Item 2</div>
	

</nav>






