<?php

include_once("includes/includedFiles.php");




if (isset($_POST['submit'])) {
    var_dump($_POST);
    die();

    $dir = 'C:/xampp/htdocs/ristunestest/assests/music/';
    $audio_path = $dir.basename($_FILES['audioFile']['name']);


    $uploadDetails = [];

    if (move_uploaded_file($_FILES['audioFile']['tmp_name'], $audio_path)) {
        $songTitle = $_POST['songTitle'];
        $artistId = $_POST['artist'];
        $albumId = $_POST['album'];
        $songDuration = $_POST['songDuration'];
        $path = $audio_path;

        Admin::getResult();
        var_dump($_POST);
        die();

    


        // // $result = mysqli_query($con, "INSERT INTO songs VALUES('', '$songTitle', '$artistId' , '$albumId', '$songDuration','$path',0,0)");
        // $res = Songs::addSongToDb($_POST, $path);
        // echo $res;

        // echo 'Upload done';
    }else {
        echo "error";
    }


    var_dump($_POST);


    //Login Function...


}
