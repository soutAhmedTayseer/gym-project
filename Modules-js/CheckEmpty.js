function CheckEmpty(formid) {
    theform = document.getElementById(formid);
    if (theform.elements.length > 0) {
        for (let i = 0; i < theform.elements.length; i++) {
            if (theform.elements[i].tagName.toLowerCase() == 'input') {
                if (theform.elements[i].value == "") {
                    return theform.elements[i].id;
                }
            }
        }
        return null;
    }
}