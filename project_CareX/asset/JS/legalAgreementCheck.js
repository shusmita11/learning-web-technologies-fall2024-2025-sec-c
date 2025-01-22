function agreeClick()
{
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/legalAgreementCheck.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");

    const data = JSON.stringify({ action: "agree" });
    console.log("Sending data:", data);
    xhttp.send(data);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log("Response received:", this.responseText.trim());
            const response = this.responseText.trim();
            if (response === '"success"') {
                alert("Redirecting to login...");
                window.location.href = "../view/login.html";
            } else {
                alert("Error: " + response);
            }
        }
    };
}

function cancelClick()
{
    window.location.href = "../view/registration.html";
}
