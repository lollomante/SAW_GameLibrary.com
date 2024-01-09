function validateForm() {
    var password = document.getElementById('pass').value;
    var confirmPassword = document.getElementById('confirm').value;
    if (password.length < 8) {
        alert('Password must be at least 8 characters long.');
        return false;
    }
    if (password !== confirmPassword) {
        alert('Password and Confirm Password must match.');
        return false;
    }
    return true;
}

/*made on earth by humans*/
