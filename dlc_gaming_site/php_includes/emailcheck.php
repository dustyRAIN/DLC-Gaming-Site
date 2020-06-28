<?php

    $givenEmail= $_POST['email_val'];

    if(!is_null($givenEmail)){
        check_user_name($givenEmail);
    }

    function check_user_name($givenEmail){
        include_once 'auth.php';
        $sql = "Select * from user where email = '$givenEmail';";
        $result = mysqli_query($conn, $sql);
        $resultRows = mysqli_num_rows($result);

        echo $resultRows;

        mysqli_close($conn);
    }
?>

