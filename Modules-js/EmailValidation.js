function validateEmail(email) {
    var re = /[^\s@]+@[^\s@]+\.[^\s@]+/gi;
    return re.test(email);
}