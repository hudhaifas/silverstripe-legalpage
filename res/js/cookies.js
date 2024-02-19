$(document).ready(function () {
    var cookie = Cookies.get("eu-cookie");
    var hiddenSnippets = cookie ? cookie.split(" | ").getUnique() : [];
    var cookieExpires = 365; // cookie expires in 365 days

    // Remember the message was hidden
    $.each(hiddenSnippets, function () {
        var pid = this;
        $('#' + pid).hide();
    });

    // Add Click functionality
    $('.eu-cookieinfo-close').click(function () {
        $('#eu-cookieinfo').hide();
        updateCookie($('#eu-cookieinfo'));
    });

    // Update the Cookie
    function updateCookie(el) {
        var indx = el.attr('id');
        var tmp = hiddenSnippets.getUnique();
        if (el.is(':hidden')) {
            // add item to hidden list
            tmp.push(indx);
        } else {
            // remove element id from the list
            tmp.splice(tmp.indexOf(indx), 1);
        }
        hiddenSnippets = tmp.getUnique();
        Cookies.set("eu-cookie", hiddenSnippets.join(' | '), {expires: cookieExpires});
    }

    if (hiddenSnippets.indexOf('eu-cookieinfo') == -1) {
        $('#eu-cookieinfo').slideDown();
    }

});

// Return a unique array.
Array.prototype.getUnique = function () {
    var o = new Object();
    var i, e;
    for (i = 0; e = this[i]; i++) {
        o[e] = 1
    }

    var a = new Array();
    for (e in o) {
        a.push(e)
    }
    return a;
}

// Fix indexOf in IE
if (!Array.prototype.indexOf) {
    Array.prototype.indexOf = function (obj, start) {
        for (var i = (start || 0), j = this.length; i < j; i++) {
            if (this[i] == obj) {
                return i;
            }
        }
        return -1;
    }
}

