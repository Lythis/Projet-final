function likeButton() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'like.php', true);
    // form data is sent appropriately as a POST request
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseText;
            console.log('Result: ' + result);
        }
    };
    xhr.send();
}