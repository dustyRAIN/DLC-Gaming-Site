
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






var game_details;
var game_shown_id = 0;
var game_active = 0;

$.get('php_includes/get_selected_games.php', {},
function(data){
	game_details = jQuery.parseJSON(data);
	setImages();
	game_active = 1;
	setWritings(game_shown_id);
});



function setImages(){
	slide1 = document.getElementById('div_slider_1');
	slide2 = document.getElementById('div_slider_2');
	slide3 = document.getElementById('div_slider_3');

	slide1.style.backgroundImage = "url('" + game_details[0][3] + "')";
	slide2.style.backgroundImage = "url('" + game_details[1][3] + "')";
	slide3.style.backgroundImage = "url('" + game_details[2][3] + "')";

	console.log(game_details[0][3]);
}












window.onscroll = function() {windowScrolling()};

const slideArea = document.querySelector('.sliding_content');
const slidingDiv = document.querySelectorAll('.div_slider');


let counter = 1;
var size = slidingDiv[0].clientWidth;

slideArea.style.transform = 'translateX(' + (-size * counter) + 'px)';
updateButtons(1);

function slidebuttonClicked(n){
	slideArea.style.transition = "transform 0.2s ease-in-out";
	counter = n;
	slideArea.style.transform = 'translateX(' + (-size * counter) + 'px)';
	updateButtons(n);
}

function resized(){
	fixSliderDimension();
}

function fixSliderDimension(){
	size = slidingDiv[0].clientWidth;
	updateSlidePosition();
}

function updateSlidePosition(){
	slideArea.style.transition = "none";
	slideArea.style.transform = 'translateX(' + (-size * counter) + 'px)';
}

function updateButtons(n){
	var i;
	var dot1 = document.getElementsByClassName("dot1");
	var dot2 = document.getElementsByClassName("dot2");
	var dot3 = document.getElementsByClassName("dot3");
    dot1[0].className = dot1[0].className.replace(" active", "");
    dot2[0].className = dot2[0].className.replace(" active", "");
    dot3[0].className = dot3[0].className.replace(" active", "");
    if(n==1) dot1[0].className += " active";
    if(n==2) dot2[0].className += " active";
	if(n==3) dot3[0].className += " active";
	
	game_shown_id = n;
	setWritings(n);
}

var fixedHeader = document.getElementById("header_to_be_fixed");
var offset = fixedHeader.offsetTop;

var totHeight = document.body.scrollHeight;

function windowScrolling(){
	if(window.pageYOffset > offset){
		fixedHeader.classList.add("headerFixed");
	} else {
		fixedHeader.classList.remove("headerFixed");
	}

	if(totHeight - 400 < window.pageYOffset + document.getElementById("game_card_list").offsetTop){
		inflateGames();
	}
}





function setWritings(id){
	if(game_active == 0) return;
	document.getElementById('slide_game_title').innerHTML = game_details[id-1][1];
	document.getElementById('slide_game_desc').innerHTML = game_details[id-1][2];
}

function gotoShownGame(){
	window.location = "gamepage.php?game_id="+game_details[game_shown_id-1][0];
}







var game_card_info;
var inflated = 0;
var len = 0;
var row = 0;

var card_list = document.getElementById('game_card_list');

getAllGameData();

function getAllGameData(){
	$.get('php_includes/get_game_info.php', {}, function(data){
		game_card_info = jQuery.parseJSON(data);
		console.log(game_card_info);
		card_list.innerHTML = '';
		getLengthAndInflate();
	});
}


function getLengthAndInflate(){
	var i;
    for (i in game_card_info) {
        if (game_card_info.hasOwnProperty(i)) {
            len++;
        }
	}
	windowScrolling();
}

function inflateGames(){
	var i;
	var yes = 0;
	for(i=inflated; i<inflated+3 && i<len; i++){
		if(!game_card_info[0][0]){
			var newHeight = row*265;
			document.getElementById('game_card_list').style.height = newHeight+"px";
			return;
		}
		yes=1;
		card_list.innerHTML += "<li><div onclick=\"gotoGameFromCard(" + i +")\" style=\"background-image: url('"+ game_card_info[i][3] +"')\" class=\"game_card_cont\"><div class=\"card_lower_cont\" style=\"background-image: url('images/game_preview_2.jpg')\"><p class=\"card_game_name\">"+ game_card_info[i][1] +"</p><a href=\"UserProfile.php?user_id="+game_card_info[i][2]+"\" class=\"card_game_uploader\">"+ game_card_info[i][2] +"</a></div></div></li>";
	}
	if(yes==1) row++;
	var newHeight = row*265;
	document.getElementById('game_card_list').style.height = newHeight+"px";
	inflated = i;
	console.log(i);
}

function gotoUser(id){
	window.location = "UserProfile.php?user_id="+game_card_info[id][2];
}

function gotoGameFromCard(id){
	window.location = "gamepage.php?game_id="+game_card_info[id][0];
}




function genreSelected(){
	var genres = $('#mselect').val();
	console.log(genres.length);
	if(genres.length == 0){
		card_list.innerHTML = '';
		inflated = 0;
		len = 0;
		row = 0;
		getAllGameData();
		console.log("sad");
	} else {
		$.get('php_includes/get_game_from_genre.php', {genres:genres}, 
		function(data){
			game_card_info = jQuery.parseJSON(data);
			//console.log(data);
			card_list.innerHTML = '';
			inflated = 0;
			len = 0;
			row = 0;
			getLengthAndInflate();
		});
	}
	

}




