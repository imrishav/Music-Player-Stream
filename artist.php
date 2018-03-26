<?php
include("includes/includedFiles.php");


if(isset($_GET['id'])) {
	$artistId = $_GET['id'];
}
else {
	header("Location: index.php");
}

$artist = new Artist($con, $artistId);

?>


<!--  html -->

<div class="entityInfo borderBottom">
	
	<div class="centerSection">
		
		<div class="artistInfo">
			 
				<h1 class="artistName"><?php echo $artist->getName(); ?></h1>

				<div class="headerButtons">
				<button class="button green" onclick="playFirstSong()">Play</button>
				</div> 
		</div>

	</div>


</div>


<div class="trackListContainer borderBottom">

	<h2>Songs</h2>
	
	<ul class="trackList">
		
		<?php
			$songIdArray = $artist->getArtistIds();

			$i =1;

			// if

			foreach ($songIdArray as $songsId) {

				if($i>5){
					break;
				}
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
								<img class='optionsButton' src='assests/images/icons/more.png'>
								
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

<div class="gridViewContainer">
	
	<h2>Albums</h2>
	<?php

		$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$artistId'");

		while($row = mysqli_fetch_array($albumQuery)){
			echo "<div class='gridViewItem'>
						<span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
 
							<img src='".$row['artworkPath']."'>

							<div class='gridViewInfo'>"
								. $row['title'] . 
							"</div>
						</span> 
				  </div>
			";
		}


	?>

	
</div>