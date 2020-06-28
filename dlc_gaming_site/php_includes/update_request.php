<?php 
    include_once 'auth.php';

    if(isset($_GET['request_id'])){
        $req_id = $_GET['request_id'];
        $state = $_GET['state'];
        $pic = $_GET['pic_url'];
        $file = $_GET['file_url'];
        $state = $state+1;

        $sql = "UPDATE `request` SET state = $state, pic_url = '$pic', file_url = '$file' WHERE request_id = $req_id;";
        if(mysqli_query($conn, $sql)){
            echo 1;
        } else {
            echo 0;
        }

        mysqli_close($conn);
    }