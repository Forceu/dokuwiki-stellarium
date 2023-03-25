function sendStellariumRequest(buttonId, serverUrl, password) {
    var content = document.getElementById(buttonId).dataset.content;
    if (serverUrl.charAt(serverUrl.length - 1) === '/') {
        serverUrl = serverUrl.slice(0, -1);
    }
    var url = serverUrl + '/api/main/focus';
    var xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    if (password != "") {
        xhr.setRequestHeader('Authorization', 'Basic ' + btoa(':' + password));
    }

    xhr.onerror = function(e) {
        alert("Cannot connect to Stellarium. Check the server URL and if Stellarium is running the HTTP control plugin server.");
    };
    xhr.onload = function() {
        switch (xhr.status) {
            case 200:
                var response = xhr.responseText;
                if (response === "false") {
                    alert("Target "+content+" not found");
                }
                break;
            case 401:
                alert("Password incorrect");
                break;
            default:
                alert("Unable to communicate with Stellarium");
                break;
        }
    };

    var formBody = [];
    formBody.push("mode=zoom");
    formBody.push("target=" + encodeURIComponent(content));
    formBody = formBody.join("&");
    xhr.send(formBody);
}
