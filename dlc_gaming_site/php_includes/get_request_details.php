<?php 
    include_once 'auth.php';

    $req_id = $_GET["requestid"];

    $sql = "SELECT * FROM `request` WHERE request_id = '$req_id';";
    $result = mysqli_query($conn, $sql);
    
    $row = $result->fetch_assoc();

    $toEcho[] = $row['state'];
    $toEcho[] = $row['game_name'];
    $toEcho[] = $row['uploader_id'];
    $toEcho[] = $row['description'];
    $toEcho[] = $row['vid_url'];
    $toEcho[] = $row['pic_url'];
    $toEcho[] = $row['file_url'];   

    echo json_encode($toEcho, JSON_FORCE_OBJECT);

    mysqli_close($conn);