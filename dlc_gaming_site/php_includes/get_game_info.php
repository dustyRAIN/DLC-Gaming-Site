<?php
    include_once 'auth.php';

        $sql = "SELECT g.game_id as game_id, r.game_name as game_name, r.pic_url as pic_url, r.uploader_id as uploader_id
        FROM game g INNER JOIN request r ON (g.request_id=r.request_id);";
        $result = mysqli_query($conn, $sql);
        $resultRows = mysqli_num_rows($result);

        while($row = $result->fetch_assoc()){
            $resArray[] = array($row['game_id'], $row['game_name'], $row['uploader_id'], $row['pic_url']);
        }

        if(isset($resArray)){
            echo json_encode($resArray, JSON_FORCE_OBJECT);
        } else {
            $resArray[] = array('', '', '', '', '');
            echo json_encode($resArray, JSON_FORCE_OBJECT);
        }

        mysqli_close($conn);