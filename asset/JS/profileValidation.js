function validatePassword(password) {
    let minLength = 8;
    let specialChars = "!@#$%^&*(),.?\":{}|<>";

   
    if (password.length < minLength) {
        alert(`Password must be at least ${minLength} characters long.`);
        return false; 
    }

    let hasNumber = false;
    let hasLetter = false;
    let hasSpecialChar = false;

 
    for (let i = 0; i < password.length; i++) {
        let char = password[i];

       
        if (!isNaN(char) && char !== ' ') {
            hasNumber = true;
        }

        if ((char >= 'a' && char <= 'z') || (char >= 'A' && char <= 'Z')) {
            hasLetter = true;
        }

        if (specialChars.indexOf(char) !== -1) {
            hasSpecialChar = true;
        }
    }

    
    if (!hasNumber) {
        alert("Password must contain at least one number.");
        return false; 
    }

    if (!hasSpecialChar) {
        alert("Password must contain at least one special character.");
        return false;
    }

    return true; 
}

document.getElementById('updatePasswordForm')?.addEventListener('submit', function (e) {

    let currentPassword = document.getElementById('current_password').value;
    let newPassword = document.getElementById('new_password').value;
    let confirmPassword = document.getElementById('confirm_password').value;

    if (!validatePassword(newPassword)) {
        return; 
    }


    if (newPassword !== confirmPassword) {
        alert("New password and confirmation do not match.");
        return;
    }

    let queryString = `current_password=${encodeURIComponent(currentPassword)}&new_password=${encodeURIComponent(newPassword)}&confirm_password=${encodeURIComponent(confirmPassword)}`;

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/processChangePassword.php', true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let response = JSON.parse(this.responseText);
            alert(response.message);
            if (response.success) {
                window.location.href = 'userProfile.php';
            }
        }
    };

    xhttp.send(queryString); 
});
