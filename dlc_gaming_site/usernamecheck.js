var username_field = document.getElementById("username");


username_field.onkeyup = function(){
    var username_value = username_field.value;
    
    var uid_stat = document.getElementById("username_stat");

    if(!username_value){
        uid_stat.style.visibility = "hidden";
    } else {
        $.post('php_includes/usernamecheck.php', {usarname_val:username_value},
        function(data){
            if(data>0){
                uid_stat.style.visibility = "visible";
                uid_stat.innerHTML = "taken";
                uid_stat.style.color = "red";
            } else {
                uid_stat.style.visibility = "visible";
                uid_stat.innerHTML = "available";
                uid_stat.style.color = "green";
            }
        });
    }
        
    
}
