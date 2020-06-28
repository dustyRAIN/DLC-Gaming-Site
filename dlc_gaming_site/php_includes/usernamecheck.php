<?php


    $givenUser = $_POST['usarname_val'];


    if(!is_null($givenUser)){
        check_user_name($givenUser);
    }

    function check_user_name($givenUser){
        include_once 'auth.php';
        $sql = "Select * from user where user_id = '$givenUser';";
        $result = mysqli_query($conn, $sql);
        $resultRows = mysqli_num_rows($result);

        echo $resultRows;

        mysqli_close($conn);
    }
?>

