<?php


// include("includes/handlers/addsong.php");
require_once("includes/includedFiles.php");

?>


<div class="adminContainer">
	<div class="addSongContainer">
		<h1>Add Song</h1>
		<form id="formElem" method="post" enctype="multipart/form-data">
			<p>
				<label for="songTitle">
					Song Name:
			</p>
					<input id="songTitle" name="songTitle" type="text" placeholder="" />
				</label>
			
			</br>

			<p>
				<label for="artist">
					Artist Name :
					<select name="artist" id="artistName">
						<option id='responseArtist' value="empty">Select Artist</option>
						<?php
						$sql = mysqli_query($con, "SELECT id,name FROM artist");
						while ($row = $sql->fetch_assoc()) {
							echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
						}
						?>
					</select>
				</label>
			</p>
			<label for="artistNameField">
				<input type="checkbox" id="artistNameField" />
				Add New Artist?
			</label>
			<p id='selectFromUp' style="display: none;">Artist Already Exist.Please Select from Above</p>


			<p>

				<label>AlbumName:

					<select name="album">
						<option value="empty">Select Album</option>
						<?php
						$sql = mysqli_query($con, "SELECT id,title FROM albums");
						while ($row = $sql->fetch_assoc()) {
							echo "<option value=" . $row['id'] . ">" . $row['title'] . "</option>";
						}
						?>
					</select>

				</label>
			</p>

			<p>
				<label>
					Genre Name :

					<select name="genre">
						<option value="empty">Select Genere</option>
						<?php
						$sql = mysqli_query($con, "SELECT id,name FROM genre");
						while ($row = $sql->fetch_assoc()) {
							echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
						}
						?>
					</select>

				</label>
			</p>

			<p>
				<label for="songDuration">Song Duration</label>
				<input id="songDuration" name="songDuration" type="text">
			</p>

			<input type="file" name="files[]" multiple>
			</br>
			</br>
			<input type="submit" onclick="formadd(event)" value="Upload File" name="submit">
		</form>








	</div>

	<div class="albumContainer">
		<h1>Album Container</h1>
		<form id="albumAddForm" method="post" enctype="multipart/form-data">
			<p>
				<label for="albumTitle">
					Album Name:
					<input id="albumTitle" name="albumTitle" type="text" placeholder="" />
				</label>
			</p>
			</br>

			<p>
				<label for="artist">
					Artist Name :
					<select name="artist" id="artistName2">
						<option id='responseArtist2' value="empty">Select Artist</option>
						<?php
						$sql = mysqli_query($con, "SELECT id,name FROM artist");
						while ($row = $sql->fetch_assoc()) {
							echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
						}
						?>
					</select>
				</label>
			</p>
			<label for="artistNameField2">
				<input type="checkbox" id="artistNameField2" />
				Add New Artist?
			</label>
			<p id='selectFromUp2' style="display: none;">Artist Already Exist.Please Select from Above</p>




			<p>
				<label>
					Genre Name :

					<select name="genre">
						<option value="empty">Select Genere</option>
						<?php
						$sql = mysqli_query($con, "SELECT id,name FROM genre");
						while ($row = $sql->fetch_assoc()) {
							echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
						}
						?>
					</select>

				</label>
			</p>


			<input id='imagesss' type="file" name="files[]" multiple>
			</br>
			</br>
			<input type="submit" onclick="albumAdd(event)" value="Add Album" name="submit">
		</form>


	</div>


</div>
<script>
	$(function() {
		let url2 = 'includes/handlers/ajax/artistAdd.php';
		$("#artistNameField").click(function() {
			if ($(this).is(":checked")) {
				let aristName = prompt('add Artsit Name');

				$.ajax({
					type: "POST",
					url: url2,
					data: {
						data: aristName
					},
					success: function(data) {
						let {
							name,
							message,
							id
						} = data;

						if (!message) {
							$('#selectFromUp').show();
							// $('#artistName').removeAttr('disabled', 'disabled');
						} else {
							$('#responseArtist').attr("value", id).text(name)
							$('#artistName').attr('disabled', 'disabled');

							// console.log('option mil gaya', option)
						}

					},
					error: function(err) {
						console.log(err)
					}
				})

			}
		});
	});

	$(function() {
		let url2 = 'includes/handlers/ajax/artistAdd.php';
		$("#artistNameField2").click(function() {
			if ($(this).is(":checked")) {
				let aristName = prompt('add Artsit Name');

				$.ajax({
					type: "POST",
					url: url2,
					data: {
						data: aristName
					},
					success: function(data) {
						let {
							name,
							message,
							id
						} = data;

						if (!message) {
							$('#selectFromUp2').show();
							// $('#artistName').removeAttr('disabled', 'disabled');
						} else {
							$('#responseArtist2').attr("value", id).text(name)
							$('#artistName2').attr('disabled', 'disabled');

							// console.log('option mil gaya', option)
						}

					},
					error: function(err) {
						console.log(err)
					}
				})

			}
		});
	});

	function albumAdd(event) {
		event.preventDefault();

		var $inputs = $('#albumAddForm :input');

		// not sure if you wanted this, but I thought I'd add it.
		// get an associative array of just the values.
		let values = {};
		let arr1 = [];
		const formData = new FormData();
		$inputs.each(function() {
			values[this.name] = $(this).val();
			arr1.push($(this).val())
		});
		const files = document.querySelector('#imagesss').files;
		console.log('files', files)
		for (let i = 0; i < files.length; i++) {
			let file = files[i];

			formData.append('files[]', file);
		}

		formData.append('albumTitle', arr1[0])
		formData.append('artistName', arr1[1])
		formData.append('genre', arr1[3])


		const url = "includes/handlers/ajax/addAlbum.php";

		fetch(url, {
			method: 'POST',
			body: formData
		}).then(response => {
			console.log('response')
			// openPage('admin.php')

			return response.text();
		}).then(data => {
			console.log(data);
		});


	}

	function formadd(event) {
		event.preventDefault();

		var $inputs = $('#formElem :input');

		// not sure if you wanted this, but I thought I'd add it.
		// get an associative array of just the values.
		var values = {};
		var arr = [];
		const formData = new FormData();
		$inputs.each(function() {
			values[this.name] = $(this).val();
			arr.push($(this).val())
		});
		console.log('das', arr);
		const files = document.querySelector('[type=file]').files;
		console.log('files', files)

		formData.append('songTitle', arr[0])
		formData.append('artistName', arr[1])
		formData.append('albumName', arr[3])
		formData.append('genre', arr[4])
		formData.append('duration', arr[5])


		const songTitle = document.querySelector('#songTitle');

		for (let i = 0; i < files.length; i++) {
			let file = files[i];

			formData.append('files[]', file);
		}

		const url = "includes/handlers/ajax/addSongs.php";

		fetch(url, {
			method: 'POST',
			body: formData
		}).then(response => {
			console.log('response')
			openPage('admin.php')

			return response.text();
		}).then(data => {
			console.log(data);
		});
	}
</script>