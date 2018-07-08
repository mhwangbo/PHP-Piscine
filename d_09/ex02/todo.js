window.onload = function() {
    function getCookie(n_cookie) {
        var name = n_cookie + "=";
        var a_cookie = document.cookie.split(';');
        for(var i = 0; i < a_cookie.length; i++) {
            var cookie = a_cookie[i];
            while (cookie.charAt(0)==' ') {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(name) == 0) {
                return cookie.substring(name.length,cookie.length);
            }
        }
        return null;
    }

    function setCookie(name, value, days)
    {
        if (days)
        {
            var date = new Date();
            date.setTime(date.getTime() + days*24*60*60*1000);
            var expires = "; expires=" + date.toString();
        }
        else
            var expires = "";
        document.cookie = name + "=" + value + expires + ";path=/";
    }

    highestCookieValue = 0;

    function addTask(iput) {
        highestCookieValue++;
        input_Id = "todo" + highestCookieValue;
        setCookie(input_Id, iput, 10000);
        var new_input = document.createElement("LI");
        new_input.id = input_Id;
        new_input.appendChild(document.createTextNode(iput));
        new_input.addEventListener("click", function(eventObject) {
            var areTheySure = confirm("Delete?");
            if (areTheySure) {
                setCookie(eventObject.target.id, "", -1);
                eventObject.target.remove();
            }
        });
        var arr = document.getElementById("ft_list");
        arr.insertBefore(new_input, arr.childNodes[0]);
    }

    var newButton = document.getElementById("add_item");
    newButton.addEventListener("click", function() {
        var newTaskText = prompt("Add");
        if (newTaskText) {
            addTask(newTaskText);
        }
    });
    var a_cookie = document.cookie.split(';');
    for(var i = 0; i < a_cookie.length; i++) {
        var cookie = a_cookie[i];
        while (cookie.charAt(0)==' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf("todo") === 0) {
            var brokenCookie = cookie.split('=');
            var indexOfCookie = brokenCookie[0];
            var valueofCookie = brokenCookie[1];
            setCookie(indexOfCookie, "", -1);
            addTask(valueofCookie);
        }
    }
}
