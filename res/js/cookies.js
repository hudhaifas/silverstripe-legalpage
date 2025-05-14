document.addEventListener('DOMContentLoaded', function () {
    const cookieKey = 'eu-cookie';
    const cookieExpires = 365;
    const cookie = getCookie(cookieKey);
    let hiddenSnippets = cookie ? getUnique(cookie.split(' | ')) : [];

    const cookieInfo = document.getElementById('eu-cookieinfo');
    const closeBtn = document.querySelector('.eu-cookieinfo-close');

    // Show the cookie banner only if it hasn't been hidden before
    if (cookieInfo && !hiddenSnippets.includes('eu-cookieinfo')) {
        cookieInfo.style.display = 'block';
    }

    // Add close button functionality
    if (closeBtn && cookieInfo) {
        closeBtn.addEventListener('click', function () {
            cookieInfo.style.display = 'none';
            updateCookie(cookieInfo);
        });
    }

    function updateCookie(el) {
        const id = el.id;
        let tmp = getUnique([...hiddenSnippets]);

        if (el.style.display === 'none') {
            if (!tmp.includes(id)) tmp.push(id);
        } else {
            tmp = tmp.filter(item => item !== id);
        }

        hiddenSnippets = getUnique(tmp);
        setCookie(cookieKey, hiddenSnippets.join(' | '), cookieExpires);
    }

    function getUnique(arr) {
        return [...new Set(arr)];
    }

    function setCookie(name, value, days) {
        const expires = new Date(Date.now() + days * 864e5).toUTCString();
        document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=/';
    }

    function getCookie(name) {
        return document.cookie.split('; ').reduce((r, v) => {
            const parts = v.split('=');
            return parts[0] === name ? decodeURIComponent(parts[1]) : r;
        }, '');
    }
});
