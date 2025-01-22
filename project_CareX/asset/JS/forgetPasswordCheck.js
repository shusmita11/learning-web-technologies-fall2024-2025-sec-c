function changePassword()
{
    let email = document.getElementById('email').value.trim();
    let nid = document.getElementById('nid').value.trim();
    let newPassword = document.getElementById('newPassword').value.trim();
    let confirmPassword = document.getElementById('confirmPassword').value.trim();

    let checkPassword = (pass, confirmPassword) => {
        if (pass.length >= 8) {
            let hasSpecialChar = false;
            const specialChars = ['@', '#', '$', '*', '&', '%'];
            for (let i = 0; i < pass.length; i++)
                {
                if (specialChars.includes(pass[i]))
                {
                    hasSpecialChar = true;
                    break;
                }
            }
            return hasSpecialChar && pass === confirmPassword;
        }
        return false;
    };
    
    checkPassword(newPassword, confirmPassword);

    if(!checkPassword(newPassword, confirmPassword))
    {
        alert("Invalid password");
        return;
    }

    const xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/forgetPasswordCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/json");

    const info = JSON.stringify({
        email: email,
        nid: nid,
        password: newPassword,
        });

    xhttp.send(info);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
            const response = this.responseText;
            if (response === 'success') {
                alert("Password Succesfully Updated");
                window.location.href = "../view/login.html";
            } else {
                alert("Error: " + response);
            }
        }
    };
}


function goBack()
{
    window.location.href = "../view/login.html";
}