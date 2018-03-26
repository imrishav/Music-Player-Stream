	<!-- 
------------------------------- Playing Controls ------------------------------------ -->
			<div id="nowPlayingBarContainer">
				<div id="nowPlayingBar">
					<div id="nowPlayingLeft">
						<div class="content">
							<span class="albumLink">
							<img src="assests/images/abc.png" class="albumArt">	
							</span>
							<div class="trackInfo">
								<span class="trackName">
									<span></span>
								</span>
								<span class="artistName">
									<span></span>
								</span>
							</div>
					</div>
				</div>

					<div id="nowPlayingCenter">
						<div class="content playerControls">
							<div class="buttons">
								<button class="controlButton shuffle" title="Shuffle Songs" onclick="setShuffle()">
									<img src="assests/images/icons/shuffle.png" alt="Shuffle">
								</button>
								<button class="controlButton previous" title="previous Song" onclick="previousSong()">
									<img src="assests/images/icons/previous.png" alt="previous">
								</button>
								<button class="controlButton play" title="play Songs" onclick="playSong()">
									<img src="assests/images/icons/play.png" alt="play">
								</button>
								<button class="controlButton pause" title="pause Songs" style="display: none;" onclick="pauseSong()">
									<img src="assests/images/icons/pause.png" alt="pause">
								</button>
								<button class="controlButton next" title=" next Songs" onclick="nextSong()">
									<img src="assests/images/icons/next.png" alt=" next">
								</button>
								<button class="controlButton repeat" title="repeat Songs" onclick="setRepeat()">
									<img src="assests/images/icons/repeat.png" alt="repeat">
								</button>
						</div>
							<div class="playbackBar">
								<span class="progressTime current">0.00</span>
									<div class="progressBar">
										<div class="progressBarBg">
														<div class="progress">
														<!-- background for progrees baar -->
														</div>
										</div>
									</div>
										<span class="progressTime remaining">0.00</span>
												
							</div>
							
						</div>

					</div>

						<div id="nowPlayingRight1">
							<div class="volumeBar">
								 <button class="controlButton volume" title="volume Button" onclick="setMute()">
								 	<img src="assests/images/icons/volume.png" alt="Volume">
								 </button>	
								 <div class="progressBar">
													<div class="progressBarBg">
														<div class="progress">
														<!-- background for progrees baar -->
														</div>
													</div>
								 </div>
							</div>
							
						</div>


						</div>
<!-- 
------------------------------- Playing Controls ------------------------------------ -->
