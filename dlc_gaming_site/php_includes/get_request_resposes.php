<?php
    include_once 'auth.php';

    if(isset($_GET['user_id'])){
        $user = $_GET['user_id'];

        $sql = "SELECT game_name, request_id FROM request WHERE uploader_id = '$user' AND state = 1;";
        $result = mysqli_query($conn, $sql);
        $resultRows = mysqli_num_rows($result);

        while($row = $result->fetch_assoc()){
            $resArray[] = array($row['game_name'], $row['request_id']);
        }

        if(isset($resArray)){
            echo json_encode($resArray, JSON_FORCE_OBJECT);
        } else {
            $resArray[] = array('', '');
            echo json_encode($resArray, JSON_FORCE_OBJECT);
        }

        mysqli_close($conn);
    }