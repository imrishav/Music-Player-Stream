<?php
	include("includes/includedFiles.php");


?>

<div class="playlistContainer">
		
	<div class="gridViewContainer">
		
		<h2>Playlist By Other Users</h2>

		<!-- <div class="buttonItems">
			<button class="button green" onclick="createPlaylist()">NEW PLAYLIST</button>

		</div>

		<form id='addPlaylistForm' style="display: none;">
			<input type="text" placeholder="Playlist Name" />
			<input type="checkbox" name="publicPlaylist" id="public"> Make This Playlist Public

			<input type="submit" onclick="addPlaylist(event)" value="Upload File" name="submit">

		</form> -->


		<?php

				$username = $userLoggedIn->getUsername();

				$playlistQuery = mysqli_query($con, "SELECT * FROM playlist WHERE isPublic= 1");

				if(mysqli_num_rows($playlistQuery) == 0) {
					echo "<span class='noResults'>You Don't have any Playlist</span>";
				}


				while($row = mysqli_fetch_array($playlistQuery)){

					$playlist = new Playlist($con, $row);

					echo "<div class='gridViewItem' role='link' tabindex='0' onclick='openPage(\"playlist.php?id=". $playlist->getId() . "\")'>

							<div class='playlistImage'>
								<img src ="
								. $playlist->getArtwork() . 
							" class='playlistArtwork' >

							</div>
							<div class='gridViewInfo'>"
										. $playlist->getName() . 
									"</div> 
						  </div>
					";
				}


	?>

	</div>



</div>