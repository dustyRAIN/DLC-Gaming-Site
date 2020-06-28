<!DOCTYPE html>
<html>
    <head>
        <title>Bow down to the admin</title>
        <link rel="stylesheet" href="AdminRequestDetails.css" type="text/css"/>
    </head>


    <script type="text/javascript" src="JQuery_Ajax.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="AdminRequestDetails.js"></script>

<?php

    $state = 'invalid';
    $name = 'invalid';
    $uploader = 'invalid';
    $desc = 'invalid';
    $vid = 'invalid';
    $pic = 'invalid';
    $file = 'invalid';

    if(isset($_GET['request_id'])){
        include_once 'php_includes/auth.php';

        $req_id = $_GET['request_id'];

        $sql = "SELECT * FROM `request` WHERE request_id = '$req_id';";
        $result = mysqli_query($conn, $sql);
        
        $row = $result->fetch_assoc();

        $state = $row['state'];
        $name = $row['game_name'];
        $uploader = $row['uploader_id'];
        $desc = $row['description'];
        $vid = $row['vid_url'];
        $pic = $row['pic_url'];
        $file = $row['file_url'];     

        mysqli_close($conn);

        //echo $req_id;

        

        echo "<script type=\"text/javascript\" >processRequestDeatails($req_id)</script>";

    }
    


?>



    <body>
        <header>
            <div id="head_text_container">
                <h1>Welcome Master</h1>
                <h2><i>The Request Details Are Down Below...</i></h2>
            </div>
        </header>
        <div class="main_section">

            <div class="field_cont">
                <label class="labels" for="req_state">Current State of the Request: </label>
                <p class="fields" type="text" name="req_state" id="req_state"><?php echo $state?></p>
            </div>

            <div class="field_cont">
                <label class="labels" for="game_name">Game Name: </label>
                <p class="fields" type="text" name="game_name" id="game_name"><?php echo $name?></p>
            </div>

            <div class="field_cont">
                <label class="labels" for="uploader">Requested By: </label>
                <p class="fields" type="text" name="uploader" id="uploader"><?php echo $uploader?></p>
            </div>

            <div class="field_cont">
                <label class="labels" for="game_desc">Game Description: </label>
                <p class="fields" type="text" name="game_desc" id="game_desc"><?php echo $desc?></p>
            </div>

            <div class="field_cont">
                <label class="labels" for="vid_url">Game Video: </label>
                <p class="fields"><a href="<?php echo $vid?>" class="fields" type="text" name="vid_url" id="vid_url"><?php echo $vid?></a></p>
            </div>

            <div class="field_cont">
                <label class="labels" for="pic_url">Game Picture: </label>
                <p class="fields"><a href="<?php echo $pic?>" class="fields" type="text" name="pic_url" id="pic_url"><?php echo $pic?></a></p>
            </div>

            <div class="field_cont">
                <label class="labels" for="file_url">Game File: </label>
                <p class="fields"><a href="<?php echo $pic?>" class="fields" type="text" name="file_url" id="file_url"><?php echo $file?></a></p>
            </div>

            <div class="field_cont">
                <textarea id="inp_short" placeholder="Add a short description about the before accepting..."></textarea>
            </div>

            <button id="delete_req" onclick="delete_request()">Delete</button>
            <button id="accept_req" onclick="accept_request()">Accept</button>

        </div>

    </body>

    
	

</html>