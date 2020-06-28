<?php 
    include_once 'auth.php';

    if(isset($_GET['request_id'])){
        $req_id = $_GET['request_id'];
        $state = $_GET['state'];
        $state = $state+1;

        $sql = "UPDATE `request` SET state = $state WHERE request_id = $req_id;";
        if(mysqli_query($conn, $sql)){
            echo 1;
        } else {
            echo 0;
        }

        mysqli_close($conn);
    }