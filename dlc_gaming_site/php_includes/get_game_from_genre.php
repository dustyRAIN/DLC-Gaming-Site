<?php

    if(isset($_GET['genres'])){
        include_once 'auth.php';

        $genreArray = $_GET['genres'];

        $sql = "SELECT DISTINCT g.game_id as game_id, r.game_name as game_name, r.pic_url as pic_url, r.uploader_id as uploader_id
        FROM game g INNER JOIN request r ON (g.request_id=r.request_id) INNER JOIN game_req_genre grg ON (r.request_id = grg.request_id)
        WHERE grg.type IN (";

        $strt = 0;


        foreach($genreArray as $type){
            if($strt == 1){
                $sql = $sql.",";
            }
            $strt = 1;
            $sql = $sql."'"."$type"."'";
        }

        $sql = $sql.");";

        $result = mysqli_query($conn, $sql);


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
    }
    