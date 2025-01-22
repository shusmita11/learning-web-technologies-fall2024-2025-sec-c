document.getElementById('updateProfileForm').addEventListener('submit', function (event) {
    event.preventDefault(); 

    let currentPassword = document.getElementById('current_password').value;
    let newPassword = document.getElementById('new_password').value;
    let confirmPassword = document.getElementById('confirm_password').value;

    if (!currentPassword || !newPassword || !confirmPassword) {
        alert('All fields are required.');
        return;
    }

    if (newPassword !== confirmPassword) {
        alert('New password and confirm password do not match.');
        return;
    }

    if (newPassword.length < 8) {
        alert('Password must be at least 8 characters long.');
        return;
    }

    let hasUppercase = false;
    let hasLowercase = false;
    let hasDigit = false;
    let hasSpecialCharacter = false;
    const specialCharacters = "!@#$%^&*(),.?\":{}|<>";

    for (let i = 0; i < newPassword.length; i++) {
        const char = newPassword[i];

        if (char >= 'A' && char <= 'Z') hasUppercase = true;
        if (char >= 'a' && char <= 'z') hasLowercase = true;
        if (char >= '0' && char <= '9') hasDigit = true;
        if (specialCharacters.includes(char)) hasSpecialCharacter = true;
    }

    if (!hasUppercase) {
        alert('Password must include at least one uppercase letter.');
        return;
    }

    if (!hasLowercase) {
        alert('Password must include at least one lowercase letter.');
        return;
    }

    if (!hasDigit) {
        alert('Password must include at least one numeric digit.');
        return;
    }

    if (!hasSpecialCharacter) {
        alert('Password must include at least one special character.');
        return;
    }

    let formData = new FormData();
    formData.append('current_password', currentPassword);
    formData.append('new_password', newPassword);
    formData.append('confirm_password', confirmPassword);


    let xhttp = new XMLHttpRequest();
    
    xhttp.open('POST', '../controller/doctorController.php', true);

    xhttp.onload = function () {
        if (xhttp.status >= 200 && xhttp.status < 300) {
            let data = JSON.parse(xhttp.responseText);

            if (data.success) {
                alert(data.message);
                document.getElementById('updateProfileForm').reset();
            } else {
                alert(data.message);
            }
        } else {
            console.error('Request failed with status:', xhttp.status);
            alert('An error occurred while updating the password.');
        }
    };

    xhttp.send(formData);
});
