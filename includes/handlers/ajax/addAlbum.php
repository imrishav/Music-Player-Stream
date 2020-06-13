
<?php 
include("../../config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  
  
    
    if (isset($_FILES['files'])) {
        $errors = [];
        $path = 'C:/xampp/htdocs/ristunestest/assests/images/artwork/';
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
		$fileForDB = 'assests/images/artwork/'.$file_name;
	

		if (!in_array($file_ext, $extensions)) {
			$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
		}

		// if ($file_size > 2097152) {
		// 	$errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
		// }
        $albumTitle = $_POST['albumTitle'];
        $artistName = $_POST['artistName'];
        $genre = $_POST['genre'];


	

		if (empty($errors)) {
            move_uploaded_file($file_tmp, $file);
			// $query = mysqli_query($con, "INSERT INTO songs VALUES('', $songTitle,$artistName,$albumName,$genre,$duration,$file,3,0)");
			$query = mysqli_query($con, "INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES (NULL, '$albumTitle', '$artistName', '$genre', '$fileForDB')");

			
		}
		var_dump($query);
		
	}
	
	if ($errors) print_r($errors);
	die();
    }
}




?>