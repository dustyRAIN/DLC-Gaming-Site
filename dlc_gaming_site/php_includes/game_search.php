<?php
    $toSearch = $_POST['_toSearch'];

    if(!is_null($toSearch)){
        search_game($toSearch);
    }

    function search_game($toSearch){
        include_once 'auth.php';
        $sql = "SELECT r.game_name as game_name, g.game_id as game_id FROM game g INNER JOIN request r ON (g.request_id=r.request_id) WHERE r.game_name LIKE '%$toSearch%';";
        $result = mysqli_query($conn, $sql);
        $resultRows = mysqli_num_rows($result);

        while($row = $result->fetch_assoc()){
            $resArray[] = array($row['game_name'], $row['game_id']);
        }

        if(isset($resArray)){
            echo json_encode($resArray, JSON_FORCE_OBJECT);
        } else {
            $resArray[] = array('', '');
            echo json_encode($resArray, JSON_FORCE_OBJECT);
        }

        mysqli_close($conn);
        
        //echo $result;
    }