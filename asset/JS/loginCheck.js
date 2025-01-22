function checkLogin(email, password, userType)
{
        let checkEmail = email => email.length !== '';
        let checkPassword = password => password.length !== '';
        let checkUserType = userType => userType !== '';

        if (checkEmail(email) && checkPassword(password) &&checkUserType(userType))
        {
            return true;
        }

        return false;
    }
    
    function confirmLogin()
    {
            let email = document.getElementById("email").value.trim();
            let password = document.getElementById("password").value.trim();
            let userType = document.querySelector('select[name="userType"]').value;
    
            // Validation
            if (!checkLogin(email, password, userType))
            {
                alert("Invalid input. Please ensure all fields are correctly filled.");
                return;
            }
    
            //JSON
            const loginData = JSON.stringify({
                email: email,
                password: password,
                userType: userType
            });

    
            // AJAX request
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", "../controller/loginCheck.php", true);
            console.log('flag 1');
            xhttp.setRequestHeader("Content-type", "application/json");
            xhttp.send(loginData);
    
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    console.log("Server response:", this.responseText);
                    const response = this.responseText.trim();
    
                    if (response === "patient")
                    {
                        alert("Login successful! Redirecting to patient dashboard...");
                        window.location.href = "../view/patientDashboard.php";
                    }
                    
                    else if (response === "doctor")
                    {
                        alert("Login successful! Redirecting to doctor dashboard...");
                        window.location.href = "../view/doctorDashboard.php";
                    }
                    
                    else if (response === "admin")
                    {
                        alert("Login successful! Redirecting to admin dashboard...");
                        window.location.href = "../view/adminDashboard.php";
                    }
                    
                    else
                    {
                        alert("Error: " + response);
                    }
                }
            };
        }
    
