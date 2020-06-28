var current_user;

function setLoggedUser(user){
	current_user = user;
	var login_area = document.getElementById('login_area');
	var loggedInArea = "<li class=\"bottom_login_logout\"><a href=\"\" onclick=\"logoutClicked()\"><div id=\"logout_container\"></div></a></li><li class=\"bottom_login_username\"><a href=\"#\" id=\"username\" onclick=\"goToCurrentUser()\" href=\"\">Lamisa is beautiful</a></li>";
	login_area.innerHTML = loggedInArea;
	setUsername(user);
}

function setUsername(user){
	var username_field = document.getElementById('username');
	username_field.innerHTML = user;
}

function logoutClicked(){
	var dher;
	$.post('php_includes/SignOut.php', {}, 
	function(data){
		dher = data;
	});
	location.reload();
}

function userLogedOut(){
	var login_area = document.getElementById('login_area');
	var loggedInArea = "<li class=\"bottom_login_plain_text\"><p>Not a member yet?</p></li><li class=\"bottom_login_button\"><a href=\"SignUp.php\"><button id=\"sin_button\">Sign Up</button></a></li><li class=\"bottom_login_plain_text\"><p>or</p></li><li class=\"bottom_login_button\"><a href=\"SignIn.php\"><button id=\"log_button\">Log In</button></a></li>";
	login_area.innerHTML = loggedInArea;
}

$.post('php_includes/session_start.php' , {}, 
function(data){
    var current_user = data;
    if(current_user){
		setLoggedUser(current_user);
    } else {
		userLogedOut();
	}
});

function goToCurrentUser(){
	location.replace("UserProfile.php?user_id="+current_user);
}













function submitted(){

    var name_field = document.getElementById("game_name");
    var desc_field = document.getElementById('game_desc');
	var url_field = document.getElementById('vid_url');

    var name = name_field.value;
    var desc = desc_field.value;
	var url = url_field.value;
	var genres = $('#mselect').val();

	if(!name){
		alert("Please provide a name for the game.");
	} else if(!desc){
		alert("Please provide description for the game.");
	} else if(!url){
		alert("Please provide a video url for the game.");
	} else {
		$.get('php_includes/insert_request.php', {game_name:name, dsc:desc, url:url},
    	function(data){
        	if(data == 0){
            	alert("Failed. Check connection and try again. Please Log In or Sign Up if you are not");
        	} else {
				addGenres(genres, data);
				alert("Request has been sent! Please wait for the Admin to respond.");
            	location.reload();
        	}
        
    	});
	}

    
}

function addGenres(genres, req_id){
	var len = 0;
    var i;
    for (i in genres) {
        if (genres.hasOwnProperty(i)) {
            len++;
        }
	}
	
	for(i=0;i<len;i++){
		if(genres[i]){
			$.get('php_includes/add_genre_game.php', {request_id:req_id, type:genres[i]}, function(data){});
		}
	} 
}