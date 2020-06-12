<?php


include("includes/handlers/addsong.php");
require_once("includes/includedFiles.php");





?>

<div class="playlistContainer">

	<div class="gridViewContainer">
		<form id="formElem" method="post" enctype="multipart/form-data">
			<input id="songTitle" name="songTitle" type="text" placeholder="">
			
			<select name="artist">
				<option value="empty">Select Artist</option>
				<?php
				$sql = mysqli_query($con, "SELECT id,name FROM artist");
				while ($row = $sql->fetch_assoc()) {
					echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
				}
				?>
			</select>
			<select name="album">
				<option value="empty">Select Album</option>
				<?php
				$sql = mysqli_query($con, "SELECT id,title FROM albums");
				while ($row = $sql->fetch_assoc()) {
					echo "<option value=" . $row['id'] . ">" . $row['title'] . "</option>";
				}
				?>
			</select>
			<select name="album">
				<option value="empty">Select Genere</option>
				<?php
				$sql = mysqli_query($con, "SELECT id,name FROM genre");
				while ($row = $sql->fetch_assoc()) {
					echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
				}
				?>
			</select>
			<p>
				<label for="songDuration">Song Duration</label>
				<input id="songDuration" name="songDuration" type="text">
			</p>

			<input type="file" name="files[]" multiple>
			<input type="submit" onclick="formadd(event)" value="Upload File" name="submit">
		</form>



		<!-- <form action="admin.php" method="POST" enctype="multipart/form-data">
			<h2>Add Song</h2>
			<input id="songTitle" name="songTitle" type="text" placeholder="">

			<select name="artist">
				<option value="empty">Select Artist</option>
				<?php
				$sql = mysqli_query($con, "SELECT id,name FROM artist");
				while ($row = $sql->fetch_assoc()) {
					echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
				}
				?>
			</select>
			
			<input name="audioFile" type="file" >



			<button type="submit" name="submit">Add Song</button>


		</form> -->
	</div>


	<script>
// 	$(function () {
//   $("#chkPassport").click(function () {
//       if ($(this).is(":checked")) {
//           $("#dvPassport").show();
//           $("#AddPassport").hide();
//       } else {
//           $("#dvPassport").hide();
//           $("#AddPassport").show();
//       }
//   });
// });
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
			formData.append('songTitle', arr[0])
			formData.append('artistName', arr[1])
			formData.append('albumName', arr[2])
			formData.append('genre', arr[3])
			formData.append('duration', arr[4])


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
				return response.text();
			}).then(data => {
				console.log(data);
			});
		}
	</script>
</div>