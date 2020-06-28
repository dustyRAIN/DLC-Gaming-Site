var email_field = document.getElementById("email");

var email_value = email_field.value;

email_field.onkeyup = function(){
    email_value = email_field.value;

    var email_stat = document.getElementById("email_stat");
        
    $.post('php_includes/emailcheck.php', {email_val:email_value},
    function(data){
        if(data>0){
            email_stat.style.visibility = "visible";
            email_stat.innerHTML = "taken";
            email_stat.style.color = "red";
        } else {
            email_stat.style.visibility = "visible";
            email_stat.innerHTML = "available";
            email_stat.style.color = "green";
        }
    });
}
