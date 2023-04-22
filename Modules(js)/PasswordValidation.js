function validatePassword(password) {
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (password.match(regex)) {
        alert("Password is valid");
    } else {
        alert("Password is invalid");
    }
}