function validateEmail() {
    const input = document.querySelector("#example");
    const display = document.querySelector("#result");
    if (input.value.match(/[^\s@]+@[^\s@]+\.[^\s@]+/gi)) {
        display.innerHTML = input.value + ' is valid';
    } else {
        display.innerHTML = input.value + ' is not a valid email';
    }
}