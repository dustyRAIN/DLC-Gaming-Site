<?php

    include_once 'auth.php';

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
      }

    $username = $_GET['_username'];
    $fullname = $_GET['_fullname'];
    $email = $_GET['_email'];
    $password = md5($_GET['_password']);

    $sql = "INSERT INTO `user`(`user_id`, `name`, `email`, `password`) VALUES ('$username','$fullname','$email','$password');";

    if(mysqli_query($conn, $sql)){
        echo(1);
    } else {
        echo(0);
    }
    /*mysqli_close($conn);

    $sql = "SELECT * from `user` WHERE user_id = '$username';";
    $result = mysqli_query($conn, $sql);
    $resultRows = mysqli_num_rows($result);*/

    mysqli_close($conn);


