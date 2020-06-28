<!DOCTYPE html>
<html>
    <head>
        <title>Bow down to the admin</title>
        <link rel="stylesheet" href="ResponseDetails.css" type="text/css"/>
    </head>


    <script type="text/javascript" src="JQuery_Ajax.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="ResponseDetails.js"></script>

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
        
        echo "<script type=\"text/javascript\" >processResponseDeatails($req_id)</script>";

        //echo $req_id;

    }
    


?>



    <body>
        <header>
            <div id="head_text_container">
                <h1>Just One More Step...</h1>
                <h2><i>Please Upload A Valid Picture Url and A File Url for Your Game to be Uploaded</i></h2>
            </div>
        </header>
        <div class="main_section">

            <div class="field_cont">
                <label class="labels" for="game_name">Game Name: </label>
                <p class="fields" type="text" name="game_name" id="game_name"><?php echo $name?></p>
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
                <input type="url" name="pic_url" id="pic_url" placeholder="Provide a link for the picture" size="35">
            </div>

            <div class="field_cont">
                <label class="labels" for="file_url">Game File: </label>
                <input type="url" name="file_url" id="file_url" placeholder="Provide a link for the game file" size="35">
            </div>


            <button id="submit_req" onclick="submit_request()">Submit</button>

        </div>

    </body>

    
	

</html>