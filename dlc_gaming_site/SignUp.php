<!DOCTYPE html>
<html>

<head>
	<title>Sign Up</title>
	<link rel="stylesheet"type="text/css" href="SignUp.css" />
    
    <script src="jquery-3.4.1.min.js"></script>
</head>

<body>












<form>

    <div>
        <h1>Sign Up To DLC Gaming Site</h1>
    </div>

    <div class="field_container" id="first_inp_cont">
        <label class="labels" for="username">Username: </label>
        <div class="stat_cont"><p id="username_stat"><i>available</i></p></div>
        <input class="fields" type="text" name="username" placeholder="Username" id="username" size="35">
        
    </div>

    <div class="field_container">
        <label class="labels" for="fullname">Full Name: </label>
        <input class="fields" type="text" name="fullname" placeholder="Full name" id="fullname" size="35">
    </div>

    <div class="field_container">
        <label class="labels" for="email">Email: </label>
        <div class="stat_cont"><p id="email_stat"><i>available</i></p></div>
        <input class="fields" type="email" name="email" placeholder="Email" id="email" size="35">
    </div>

    <div class="field_container">
        <label class="labels" for="password">Password: </label>
        <input class="fields" type="password" name="password" placeholder="Password" id="password" size="35">
    </div>

    <div class="butt_container">
         <button type="submit" class="butt_signup" onclick="sign_butt_clicked()">Sign Up</button>
        
    </div>
    
    

</form>


<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script-->

<script type="text/javascript" src="SignUp.js"></script>

<script  type="text/javascript" src="usernamecheck.js"></script>
<script  type="text/javascript" src="emailcheck.js"></script>







</body>

</html>