function showAlla(id) {
    if (confirm('Are you sure to undelete this member ?')) {
        // initialisation
        var url = '../controler/info_show_members.php';
        var method = 'POST';
        var params = 'id='+id;
        var container_id = 'field_container' ;
        var loading_text = '<img src="../images/ajax_loader.gif">' ;
        // call ajax function
        ajax (url, method, params, container_id, loading_text) ;
    }
}

function showMembers() {

        // initialisation
        var url = '../controler/info_show_members.php';
        var method = 'POST';
        //var params = 'id='+id;
        var container_id = alert() ;
        var loading_text = '<img src="../images/ajax_loader.gif">' ;
        // call ajax function
        ajax (url, method, loading_text) ;

}


// ajax : basic function for using ajax easily
function ajax (url, method, params, container_id, loading_text) {
    try { // For: chrome, firefox, safari, opera, yandex, ...
        xhr = new XMLHttpRequest();
    } catch(e) {
        try{ // for: IE6+
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        } catch(e1) { // if not supported or disabled
            alert("Not supported!");
        }
    }
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4) { // when result is ready
            document.getElementById(container_id).innerHTML = xhr.responseText;
            //document.alert(xhr.responseText);
        } else { // waiting for result
            document.getElementById(container_id).innerHTML = loading_text;
            //document.alert(loading_text);
        }
    }
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.send(params);
}