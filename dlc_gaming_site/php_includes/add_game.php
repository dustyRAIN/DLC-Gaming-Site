<?php 
    include_once 'auth.php';

    if(isset($_GET['request_id'])){
        $req_id = $_GET['request_id'];
        $short_desc = $_GET['short_desc'];

        $sql = "INSERT INTO `game`(`request_id`, `short_desc`) VALUES ($req_id,'$short_desc')";
        if(mysqli_query($conn, $sql)){
            echo 1;
        } else {
            echo 0;
        }

        mysqli_close($conn);
    }