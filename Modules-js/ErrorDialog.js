function errdia(divid, text) {
    errdiv = document.getElementById(divid);
    errdiv.hidden = false;
    errdiv.children[0].innerHTML = text;
}