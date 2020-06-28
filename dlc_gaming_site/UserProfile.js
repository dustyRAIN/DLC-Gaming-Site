var current_user;
var user_to_show;

var games;
var responses;

var ok1 = 0;
var ok2 = 0;

$.post('php_includes/session_start.php' , {}, 
function(data){
    current_user = data;
    ok1=1;
    setUpView();
});

function theUserToShow(user){
    user_to_show = user;
    ok2=1;
    setUpView();
}

function setUpView(){

    if(ok1==0 || ok2==0) return;

    console.log(user_to_show);
    console.log(current_user);

    
    $.get('php_includes/get_user_details.php', {user_id:user_to_show}, 
    function(data){
        var info = jQuery.parseJSON(data);
        setUpProfileInfo(info);
    });

    $.get('php_includes/get_uploaded_games.php', {user_id:user_to_show},
    function(data){
        var info = jQuery.parseJSON(data);
        games = info;
        showUploadedGames(info);
    });

    if(current_user == user_to_show){
        document.getElementById('request_display').style.display = "block";

        $.get('php_includes/get_request_resposes.php', {user_id:user_to_show}, 
        function(data){
            var info = jQuery.parseJSON(data);
            responses = info;
            setUpResponses(info);
        });
    } else {
        document.getElementById('change_password_link').style.display = "none";
    }
    
}

function setUpProfileInfo(info){
    document.getElementById('username').innerHTML = info[0];
    document.getElementById('fullname').innerHTML = info[1];
    document.getElementById('email').innerHTML = info[2];
}

function showUploadedGames(info){
    var len = 0;
    var i;
    for (i in info) {
        if (info.hasOwnProperty(i)) {
            len++;
        }
    }

    console.log(info[0]);

    if(!info[0][1]){
        document.getElementById('no_game_cont').style.display = "block";
        if(current_user == user_to_show) {
            document.getElementById('first_game_up_link').style.display = "block";
        } else {
            document.getElementById('first_game_up_link').style.display = "none";
        }
        document.getElementById('up_game_list_con').style.display = "none";
    } else {
        document.getElementById('no_game_cont').style.display = "none";
        document.getElementById('up_game_list_con').style.display = "block";
    }

    var game_list = document.getElementById('game_list');
    game_list.innerHTML = "";
    
    for(i=0; i<len; i++){
        game_list.innerHTML += "<li><a href=\"#\" onclick=\"gotoGame("+ i +")\">"+ info[i][0] +"</a></li>";
    }
}

function gotoGame(id){
    window.location = "gamepage.php?game_id="+games[id][1];
}



function setUpResponses(info){
    var len = 0;
    var i;
    for (i in info) {
        if (info.hasOwnProperty(i)) {
            len++;
        }
    }


    if(!info[0][1]){
        document.getElementById('no_response_cont').style.display = "block";
        document.getElementById('response_list_con').style.display = "none";
    } else {
        document.getElementById('no_response_cont').style.display = "none";
        document.getElementById('response_list_con').style.display = "block";
    }

    var response_list = document.getElementById('response_list');
    response_list.innerHTML = "";
    
    for(i=0; i<len; i++){
        response_list.innerHTML += "<li><a href=\"#\" onclick=\"gotoResponse("+ i +")\">"+ info[i][0] +"</a></li>";
    }
}

function gotoResponse(id){
    console.log(responses[id]);
    window.location = "ResponseDetails.php?request_id="+responses[id][1];
}
