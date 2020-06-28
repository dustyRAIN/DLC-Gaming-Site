<?php
    include_once 'auth.php';

        $sql = "SELECT type FROM genre;";
        $result = mysqli_query($conn, $sql);
        $resultRows = mysqli_num_rows($result);

        while($row = $result->fetch_assoc()){
            $resArray[] = $row['type'];
        }

        if(isset($resArray)){
            echo json_encode($resArray, JSON_FORCE_OBJECT);
        } else {
            $resArray[] = '';
            echo json_encode($resArray, JSON_FORCE_OBJECT);
        }

        mysqli_close($conn);