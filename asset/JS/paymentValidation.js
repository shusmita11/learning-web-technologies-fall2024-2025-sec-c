function confirmBook() {
    let name = document.getElementById('name').textContent.replace("Name: ", "").trim();
    let email = document.getElementById('email').textContent.replace("Email: ", "").trim();
    let cardholderName = document.getElementById('cardholder_name').value.trim();
    let paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
    let cardNumber = document.getElementById("card_number").value.trim();
    let expiryMonth = document.getElementById("expiry_month").value;
    let expiryYear = document.getElementById("expiry_year").value;
    let cvv = document.getElementById("cvv").value;

    if (cardholderName === "") {
        alert("Please enter the cardholder name");
        return;
    }

    if (cardNumber.length !== 16 || isNaN(cardNumber)) {
        alert("Card number must be exactly 16 digits.");
        return;
    }

    if (expiryMonth === "" || expiryYear === "") {
        alert("Please select a valid expiry date.");
        return;
    }

    if (cvv.length !== 3 || isNaN(cvv)) {
        alert("CVC/CVV must be exactly 3 digits.");
        return;
    }

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/paymentController.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");

    const paymentInfo = JSON.stringify({
        name: name,
        email: email,
        cardholderName: cardholderName,
        cardNumber: cardNumber,
        paymentMethod: paymentMethod,
        expiryMonth: expiryMonth,
        expiryYear: expiryYear,
        cvv: cvv
    });

    xhttp.send(paymentInfo);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            const response = this.responseText;

            if (response === 'success') {
                alert("Booking and Payment Successful!");
                window.location.href = "../view/patientDashboard.php";
            } else {
                alert(response);
            }
        }
    };
}
