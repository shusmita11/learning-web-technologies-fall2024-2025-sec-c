function checkReg()
{
    let firstName = document.getElementById('firstName').value.trim();
    let lastName = document.getElementById('lastName').value.trim();
    let email = document.getElementById('email').value.trim();
    let phone = document.getElementById('phone').value.trim();
    let nid = document.getElementById('nid').value.trim();
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirmPassword').value.trim();
    let dob = document.getElementById('dob').value.trim();
    let gender = document.querySelector('input[name="gender"]:checked')?.value || '';
    let address = document.getElementById('address').value.trim();
    let medHistory = document.getElementById('medHistory').value.trim();
    let emergencyContact = document.getElementById('emergencyContact').value.trim();

    // Validation
    const checkName = name => {
        if (name.length < 2)
        {
            return false;
        }
    
        for (let i = 0; i < name.length; i++)
        {
            const char = name[i];
            if (!((char >= 'A' && char <= 'Z') || (char >= 'a' && char <= 'z')))
            {
                return false;
            }
        }
        return true;
    };
    
    
    const checkEmail = email => {
        if (email.includes('@') && email.includes('.'))
            {
            const parts = email.split('@');
            if (parts.length === 2) {
                const local = parts[0];
                const domain = parts[1];
                if (local.length > 0 && domain.includes('.') && domain.split('.').length >= 2)
                {
                    const topLevelDomain = domain.split('.').pop();
                    return ["com", "edu", "org", "bd"].includes(topLevelDomain);
                }
            }
        }
        return false;
    };
    
    const checkContact = contact => {
        if (contact.length === 11) {
            for (let i = 0; i < contact.length; i++)
            {
                if (contact[i] < '0' || contact[i] > '9')
                {
                    return false;
                }
            }
            return true;
        }
        return false;
    };
    
    const checkNid = nid => {
        if (nid.length === 10) {
            for (let i = 0; i < nid.length; i++)
            {
                if (nid[i] < '0' || nid[i] > '9')
                {
                    return false;
                }
            }
            return true;
        }
        return false;
    };
    
    const checkPassword = (pass, confirmPassword) => {
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
    
    const checkDob = dob => {
        const year = new Date(dob).getFullYear();
        return year >= 1920 && year <= 2010;
    };
    

    // Validate inputs
    if (!checkName(firstName) || !checkName(lastName)) 
    {
        alert("Invalid name");
        return;
    }

    if (!checkEmail(email))
    {
        alert("Invalid email");
        return;
    }

    if (!checkContact(phone) || !checkContact(emergencyContact))
    {
        alert("Invalid contact number");
        return;
    }

    if (!checkNid(nid))
    {
        alert("Invalid NID");
        return;
    }

    if (!checkPassword(password, confirmPassword))
    {
        alert("Invalid password");
        return;
    }

    if (!checkDob(dob))
    {
        alert("Invalid date of birth");
        return;
    }

    if (!gender)
    {
        alert("Gender not selected");
        return;
    }

    if (address.length < 4)
    {
        alert("Invalid address");
        return;
    }

    //AJAX request
    const xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../model/userModel.php', true);
    xhttp.setRequestHeader("Content-type", "application/json");

    //JSON object
    const info = JSON.stringify({
    firstName: firstName,
    lastName: lastName,
    email: email,
    phone: phone,
    nid: nid,
    password: password,
    dob: dob,
    gender: gender,
    address: address,
    medHistory: medHistory,
    emergencyContact: emergencyContact
    });

    xhttp.send(info);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
            const response = this.responseText;
            if (response === 'success') {
                alert("Registration successful");
                window.location.href = "../view/legalAgreement.html";
            } else {
                alert("Error: " + response);
            }
        }
    };
}
