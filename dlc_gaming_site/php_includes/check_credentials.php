<?php

    include_once 'auth.php';

    $username = $_GET['_username'];
    $password = md5($_GET['_password']);

    //echo $password;

    $sql = "SELECT * from `user` WHERE user_id = '$username' AND password = '$password';";
    $result = mysqli_query($conn, $sql);
    $resultRows = mysqli_num_rows($result);

    mysqli_close($conn);

    echo $resultRows;

?>

    