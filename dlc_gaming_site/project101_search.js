var search_box = document.getElementById("search_box");

var search_results;

search_box.onkeyup = function(){
    var toSearch = search_box.value;

    setDropDown(toSearch);


    $.post('php_includes/game_search.php', {_toSearch:toSearch}, 
    function(data){
        var result = jQuery.parseJSON(data);
        search_results = result;
        if(data){
            addSearchResults(result);
        } else {
            var search_list = document.getElementById('search_result_list');
            search_list.innerHTML = "";
        }
        
    });
}

function addSearchResults(results){
    var len = 0;
    var i;
    for (i in results) {
        if (results.hasOwnProperty(i)) {
            len++;
        }
    }

    var search_list = document.getElementById('search_result_list');
    search_list.innerHTML = "";
    
    for(i=0; i<len; i++){
        search_list.innerHTML += "<li><a href=\"#\" onclick=\"gotoGame(" + i + ")\">" + results[i][0] + "</a></li>";
    }
    
}

function gotoGame(id){
    window.location = "gamepage.php?game_id="+search_results[id][1];
    //console.log(search_results[id][1]);
}


function setDropDown(toSearch){
    var dropdown = document.getElementById('search_dropdown');

    if(toSearch) {
        dropdown.style.display = "block";
    } else {
        dropdown.style.display = "none";
    }
}