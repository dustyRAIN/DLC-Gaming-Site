<?php


    include_once 'auth.php';
    $sql = "SELECT r.game_name as game_name, r.uploader_id as uploader_id, r.request_id as request_id from request r WHERE r.state=0";
    $result = mysqli_query($conn, $sql);
    //$resultRows = mysqli_num_rows($result);

   //$resArray = array("s");

        while($row = $result->fetch_assoc()){
            $resArray[] = array($row['game_name'], $row['uploader_id'], $row['request_id']);
        }
        echo json_encode($resArray, JSON_FORCE_OBJECT);

        mysqli_close($conn);
    
    //else echo json_encode(array("hah", "skjb", "djsb"), JSON_FORCE_OBJECT);

    
    //echo $result;