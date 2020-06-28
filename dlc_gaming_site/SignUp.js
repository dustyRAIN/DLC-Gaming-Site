
var current_user;

$.post('php_includes/session_start.php' , {}, 
function(data){
    current_user = data;
    if(data){
        show_error_page();
    }
});

function show_error_page(){
    var errorPage = "<!DOCTYPE html><html><head><title>Error</title></head><body><h1>ERROR : NOT AVAILABLE</h1></body></html>";
    document.open();
    document.write(errorPage);
    document.close();
}




function sign_butt_clicked(){
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var fullname = document.getElementById("fullname").value;
    var password = document.getElementById("password").value;

    var is_valid = 1;

    if(!username) {
        alert("Username should not be empty!");
        is_valid = 0;
    } else if(!email) {
        alert("Email should not be empty!");
        is_valid = 0;
    } else if(!fullname) {
        alert("You should have a name!");
        is_valid = 0;
    } else if(!password) {
        alert("Provide a password!");
        is_valid = 0;
    } else {
        $.post('php_includes/usernamecheck.php', {username_val:username},
        function(data){
            if(data>0){
                alert("The Username is taken already. Please provide a unique one!");
                is_valid = 0;
            }
        });

        $.post('php_includes/emailcheck.php', {email_val:email},
        function(data){
            if(data>0){
                alert("An account with this email exists already. Please provide a different one!");
                is_valid = 0;
            }
        });
    }

    

    if(is_valid === 1) {
        //window.location.replace('php_includes/insert_user.php?')

        var result = 9;
        /*$.post('php_includes/insert_user.php', {_username:username, _fullname:fullname, _email:email, _password:password}, 
        function(haha){
            alert('sd');
            console.log(haha);
            result = haha;
            console.log(haha);
            if(haha === 0){
                alert("Connection lost. Couldn't entry the user, please try again.");
            } else {
                //alert('ds');
                //window.location.replace("project101.php");
                //setCurrentUser(username);
            }
            console.log(haha);
        });*/


        $.ajax({
            type: "GET",
            url: "php_includes/insert_user.php",
            data: {_username:username, _fullname:fullname, _email:email, _password:password},
            success: function(haha){
                console.log(haha);
                result = haha;
                console.log(haha);
                if(haha === 0){
                    alert("Connection lost. Couldn't entry the user, please try again.");
                } else {
                    alert('Successfully Signed Up! Press \'OK\' to continue.');
                    window.location.replace("project101.php");
                    setCurrentUser(username);
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
               alert("some error");
            }
          });

        /*alert('Successfully Signed Up! Press \'OK\' to continue.');
        window.location.replace("project101.php");
        setCurrentUser(username);*/

    }
}

function setCurrentUser(user){
    var kenisi;
    $.post('php_includes/set_current_user.php', {_user:user}, 
    function(data){
        kenisi = data;
        window.location.replace("project101.php");
    });
}

