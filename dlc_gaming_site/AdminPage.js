
var first_results;


$.post('php_includes/request_first_list.php', {}, 
function(data){
    first_results = jQuery.parseJSON(data);
    //console.log(first_results);
    addResultsToFirst(first_results);
});

function addResultsToFirst(results){
    var len = 0;
    var i;
    for (i in results) {
        if (results.hasOwnProperty(i)) {
            len++;
        }
    }


    var first_list = document.getElementById('list_first');
    first_list.innerHTML = "";
    
    for(i=0; i<len; i++){
        first_list.innerHTML += "<li><a href=\"#\" onclick=\"gotoRequest("+ i +")\">" + first_results[i][0] + "    -     " + first_results[i][1] + "</a></li>";
    }
}

function gotoRequest(id){
    window.location = "AdminRequestDetails.php?request_id="+first_results[id][2];
    //console.log(first_results[id][2]);
}


var second_results;


$.post('php_includes/request_second_list.php', {}, 
function(data){
    second_results = jQuery.parseJSON(data);
    //console.log(first_results);
    addResultsToSecond(second_results);
});

function addResultsToSecond(results){
    var len = 0;
    var i;
    for (i in results) {
        if (results.hasOwnProperty(i)) {
            len++;
        }
    }


    var second_list = document.getElementById('list_second');
    second_list.innerHTML = "";
    
    for(i=0; i<len; i++){
        second_list.innerHTML += "<li><a href=\"#\" onclick=\"goto2ndRequest("+ i +")\">" + second_results[i][0] + "    -     " + second_results[i][1] + "</a></li>";
    }
}

function goto2ndRequest(id){
    console.log('sad');
    window.location = "AdminRequestDetails.php?request_id="+second_results[id][2];
    //console.log(second_results[id][2]);
}
