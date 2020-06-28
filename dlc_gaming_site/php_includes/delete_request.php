<?php
    include_once 'auth.php';

    if(isset($_GET['requestid'])){
        $req_id = $_GET['requestid'];

        $sql = "DELETE FROM `request` WHERE request_id = '$req_id';";
        if(mysqli_query($conn, $sql)){
            echo 1;
        } else {
            echo 0;
        }

        mysqli_close($conn);
    }