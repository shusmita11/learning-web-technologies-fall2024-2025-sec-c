function validateUser()
{
    const valEmpName = empName => empName.length !== '';

    const valComName = comName => comName.length !== '';

    const valPhone = phone => phone.length !== '';

    const valUserName = userName => userName.length !== '';

    const valPassword = password => password.length !== '';


    if (valEmpName(empName) && valComName(comName) && valPhone(phone) && valUserName(userName) && valPassword(password))
    {
        return true;
    }

    return false;
}

function confirmReg()
{
    let empName = document.getElementById("empName").value.trim();
    let comName = document.getElementById("comName").value.trim();
    let phone =  document.getElementById("phone").value.trim();
    let userName =  document.getElementById("userName").value.trim();
    let password = document.getElementById("password").value.trim();

    if (!validateUser(empName, comName, phone, userName, password))
    {
        alert("Invalid input");
        return;
    }

    const regData = JSON.stringify({
        empName: empName,
        comName: comName,
        phone: phone,
        userName: userName,
        password: password
    });

    //alert(regData);
    
    // AJAX request
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/regCheck.php", true);
    console.log('flag 1');
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(regData);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
            console.log("response:", this.responseText);
            const response = this.responseText;

            if(response === 'success')
            {
                alert("Registration Successful");
                window.location.href = "../view/login.html";
            }

            else
            {
                alert("Registration Unsuccessful");
            }
        }
    };

}