<!DOCTYPE html>
<html>
<head>
	<title>DLC Gaming Site</title>
	<link rel="stylesheet" href="UserProfile.css" type="text/css"/>
</head>

<script type="text/javascript" src="JQuery_Ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="UserProfile.js"></script>


<?php 



if(isset($_GET['user_id'])){
    
    $user_to_display = $_GET['user_id'];
    
    echo "<script type=\"text/javascript\" >theUserToShow('$user_to_display')</script>";

}

?>


<body>

    <div class="profile_details_cont">
        <p class="titles">Profile Details</p>
        <label class="labels" for="username">Username</label>
        <p class="details_p" name="username" id="username">Lamisa</p>
        <label class="labels" for="fullname">Full Name</label>
        <p class="details_p" name="fullname" id="fullname">Farhat Lamisa</p>
        <label class="labels" for="email">Email</label>
        <p class="details_p" name="email" id="email">lamisa@gmail.com</p>
        <a href="#" id="change_password_link">Change your password.</a>
    </div>


    <div class="uploaded_game_cont">
        <p class="titles">Uploaded Games</p>
        <div id="no_game_cont">
            <p class="msg_p">No game has been uploaded.</p>
            <a href="RequestPage.php" id="first_game_up_link">Upload Your First Game</a>
        </div>

        <div id="up_game_list_con">
            <ul id="game_list">
                <li><a href="#" onclick="gotoRequest()">the game is real</a></li>
            </ul>
        </div>

        
    </div>


    <div class="request_response_cont" id="request_display">
        <p class="titles">Previous Request Response</p>
        <div id="no_response_cont">
            <p class="msg_p">No Response.</p>
        </div>

        <div id="response_list_con">
            <ul id="response_list">
                <li><a href="#" onclick="gotoRequest()">the game is real</a></li>
            </ul>
        </div>

        
    </div>

</body>
</html>


