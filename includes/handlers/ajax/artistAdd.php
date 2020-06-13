<?php

include("../../config.php");


if(isset($_POST['data'])){
 
    $artistName = $_POST['data'];

    $check = mysqli_query($con, "SELECT name FROM `artist` WHERE name='".$artistName."'");
    if(mysqli_num_rows($check) >0) {
        $vals = array(
            'message' => false,
            // 'id' => mysqli_insert_id($con)
        );
    
        header('Content-Type: application/json');      
        echo json_encode($vals, JSON_PRETTY_PRINT);     // Now we want to JSON encode these values to send them to $.ajax success.
        exit;
    }else {
         $query = mysqli_query($con, "INSERT INTO artist VALUES('','$artistName')");

        $vals = array(
            'name' => $_POST['data'],
            'message' => true,
            'id' => mysqli_insert_id($con)
        );
    
        header('Content-Type: application/json');      
        echo json_encode($vals, JSON_PRETTY_PRINT);     // Now we want to JSON encode these values to send them to $.ajax success.
        exit;
    }
//    var_dump($check);
//    die();

    // $query = mysqli_query($con, "INSERT INTO artist VALUES('','$artistName')");

    // $vals = array(
    //     'name' => $_POST['data'],
    //     'message' => true,
    //     // 'id' => mysqli_insert_id($con)
    //     "id" => $check,
    // );

    // header('Content-Type: application/json');      
    // echo json_encode($vals, JSON_PRETTY_PRINT);     // Now we want to JSON encode these values to send them to $.ajax success.
    // exit;

    


    
}



?>