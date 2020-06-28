<!DOCTYPE html>
<html>

<head>
	<title>Sign Up</title>
	<link rel="stylesheet"type="text/css" href="SignUp.css" />
</head>

<body>












<form>

    <div>
        <h1>Log In To DLC Gaming Site</h1>
    </div>

    <div class="field_container" id="first_inp_cont">
        <label class="labels" for="username">Username: </label>
        <div class="stat_cont"><p id="username_stat"><i>available</i></p></div>
        <input class="fields" type="text" name="username" placeholder="Username" id="username" size="35">
        
    </div>

    <div class="field_container">
        <label class="labels" for="password">Password: </label>
        <input class="fields" type="password" name="password" placeholder="Password" id="password" size="35">
    </div>

    <div class="butt_container">
         <button class="butt_signup" onclick="sign_butt_clicked()">Log In</button>
        
    </div>
    
    

</form>

<script type="text/javascript" src="JQuery_Ajax.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<script type="text/javascript" src="SignIn.js"></script>



</body>

</html>