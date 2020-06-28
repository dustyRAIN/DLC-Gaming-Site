<?php

    include_once 'auth.php';

    if(isset($_GET['user_id'])){
        $username = $_GET['user_id'];

        $sql = "SELECT * FROM `user` WHERE user_id = '$username';";
        $result = mysqli_query($conn, $sql);
    
        $row = $result->fetch_assoc();

        $toEcho[] = $row['user_id'];
        $toEcho[] = $row['name'];
        $toEcho[] = $row['email'];

        echo json_encode($toEcho, JSON_FORCE_OBJECT);

        mysqli_close($conn);
    }