/*
 * Author : Ali Aboussebaba
 * Email : bewebdeveloper@gmail.com
 * Website : http://www.bewebdeveloper.com
 * Subject : Using Ajax with PHP/MySQL
 */

// delete_member function
function delete_ticket(id) {
    if (confirm('Are you sure to delete this ticket?')) {
        // initialisation
        var url = '../controler/delete_ticket_controller.php';
        var method = 'POST';
        var params = 'id='+id;
        var container_id = 'list_container' ;
        //var container_id = 'field_container' ;
        var loading_text = '<img src="images/ajax_loader.gif">' ;
        // call ajax function
        ajax (url, method, params, container_id, loading_text) ;
    }
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
        } else { // waiting for result
            document.getElementById(container_id).innerHTML = loading_text;
        }
    }
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.send(params);
}