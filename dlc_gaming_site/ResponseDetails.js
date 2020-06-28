
var request_id;
var state;
var game_name;
var uploader;
var description;
var pic_url;
var vid_url;
var file_url;

function submit_request(){
    var pic = document.getElementById('pic_url').value;
    var file = document.getElementById('file_url').value;

    if(!pic){
        alert("Please provide a valid picture url!");
    } else if(!file) {
        alert("Please provide a valid file url!");
    } else {
        submitResponse();
    }
}

function processResponseDeatails(req){
    request_id = req;

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
    });
}

function submitResponse(){

    if(state>1){
        show_error_page();
        return;
    }

    file_url = document.getElementById('file_url').value;
    pic_url = document.getElementById('pic_url').value;

    $.get('php_includes/update_request.php', {request_id:request_id, state:state, pic_url:pic_url, file_url:file_url},
    function(as){
        console.log(request_id);
        if(as == 1){
            alert("Done!");
            window.history.back();
        } else {
            alert("Not Successfull.");
        }
    });
}


function show_error_page(){
    var errorPage = "<!DOCTYPE html><html><head><title>Error</title></head><body><h1>ERROR : NOT AVAILABLE</h1></body></html>";
    document.open();
    document.write(errorPage);
    document.close();
}