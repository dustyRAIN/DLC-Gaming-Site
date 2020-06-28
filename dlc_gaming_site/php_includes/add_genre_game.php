<?php
    include_once 'auth.php';

    if($_GET['request_id']){

        $req_id = $_GET['request_id'];
        $type = $_GET['type'];

        $sql = "INSERT INTO `game_req_genre`(`request_id`, `type`) VALUES ($req_id, '$type')";
        if(mysqli_query($conn, $sql)){
            echo 1;
        } else {
            echo 0;
        }

        mysqli_close($conn);
    }
        