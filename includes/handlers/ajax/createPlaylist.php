<?php

include("../../config.php");

// var_dump($_POST);
// var_dump($_FILES['files']);

// die();

if(isset($_POST['name']) && isset($_POST['username'])){

	$playlistName = $_POST['name'];
	$username = $_POST['username'];
	$date = date("Y-m-d");	
	$publicBool = ($_POST['isPublic'] == 'true') ? 1 : 0;

	$check = mysqli_query($con, "SELECT name FROM `playlist` WHERE name='".$playlistName."'");

	if(mysqli_num_rows($check) >0) {
		var_dump('Already Exist Playlist Name,Select some another name');
		die();
	}

	

	if (!empty(($_FILES['files']))) { 
		$errors = [];
        $path = 'C:/xampp/htdocs/ristunestest/assests/images/playlistArtwork/';
		$extensions = ['jpg', 'jpeg', 'png', 'gif'];
		
        $all_files = count($_FILES['files']['tmp_name']);

        for ($i = 0; $i < $all_files; $i++) {  
		$file_name = $_FILES['files']['name'][$i];
		$file_tmp = $_FILES['files']['tmp_name'][$i];
		$file_type = $_FILES['files']['type'][$i];
		$file_size = $_FILES['files']['size'][$i];
		$tmp = explode('.', $_FILES['files']['name'][$i]);
		$file_ext = strtolower(end($tmp));

		$file = $path . $file_name;
		$fileForDB = 'assests/images/playlistArtwork/'.$file_name;
	

		if (!in_array($file_ext, $extensions)) {
			$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
		}

		// if ($file_size > 2097152) {
		// 	$errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
		// }	

		if (empty($errors)) {
            move_uploaded_file($file_tmp, $file);
			// $query = mysqli_query($con, "INSERT INTO songs VALUES('', $songTitle,$artistName,$albumName,$genre,$duration,$file,3,0)");
			$query = mysqli_query($con, "INSERT INTO playlist VALUES('','$playlistName','$username','$date','$publicBool', '$fileForDB')");
		}
		var_dump($query);
		
	}
	
	if ($errors) print_r($errors);
	
	}else {
		$fileForDB = 'assests/images/icons/playlist.png';

		$query = mysqli_query($con, "INSERT INTO playlist VALUES('','$playlistName','$username','$date','$publicBool', '$fileForDB')");

		var_dump($query);

	}


}

?>