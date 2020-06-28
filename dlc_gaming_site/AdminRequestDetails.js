
var request_id;
var state;
var game_name;
var uploader;
var description;
var pic_url;
var vid_url;
var file_url;

function processRequestDeatails(req_id){

    request_id = req_id;

    console.log(req_id);

    $.get('php_includes/get_request_details.php', {requestid:request_id},
    function(data){
        var details = jQuery.parseJSON(data);
        state = details[0];
        game_name = details[1];
        uploader = details[2];
        description = details[3];
        vid_url = details[4];
        pic_url = details[5];
        file_url = details[6];
        setViewWithState(state);
        console.log("sadas");
    });

}

function setViewWithState(st){
    console.log('sad');
    short_desc = document.getElementById('inp_short');
    if(st==2){
        short_desc.style.display = "block";
    } else {
        short_desc.style.display = "none";
    }
}


function delete_request(){
    $.get('php_includes/delete_request.php', {requestid:request_id},
    function(as){
        if(as == 1){
            alert("Deleted");
            location.replace("AdminPage.php");
        } else {
            alert("Not Deleted!");
        }
    });
}

function accept_request(){
    $.get('php_includes/accept_request.php', {request_id:request_id, state:state},
    function(as){
        if(as == 1){
            if(state==2){
                add_game();
            }
            location.replace("AdminPage.php");
        } else {
            alert("Not Successfull.");
        }
    });
}

function add_game(){
    var short_desc = document.getElementById('inp_short').value;
    $.get('php_includes/add_game.php', {request_id:request_id, short_desc:short_desc},
    function(as){
        if(as == 1){
            alert("Done!");
        } else {
            alert("Not Successfull.");
        }
    });
}