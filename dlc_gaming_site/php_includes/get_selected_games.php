<?php
    include_once 'auth.php';

        $sql = "SELECT g.game_id as game_id, g.short_desc as short_desc, r.game_name as game_name, r.pic_url as pic_url 
        FROM game g INNER JOIN selected_game sg ON(g.game_id = sg.game_id) INNER JOIN request r ON (g.request_id=r.request_id);";
        $result = mysqli_query($conn, $sql);
        $resultRows = mysqli_num_rows($result);

        while($row = $result->fetch_assoc()){
            $resArray[] = array($row['game_id'], $row['game_name'], $row['short_desc'], $row['pic_url']);
        }

        if(isset($resArray)){
            echo json_encode($resArray, JSON_FORCE_OBJECT);
        } else {
            $resArray[] = array('', '', '', '');
            echo json_encode($resArray, JSON_FORCE_OBJECT);
        }

        mysqli_close($conn);