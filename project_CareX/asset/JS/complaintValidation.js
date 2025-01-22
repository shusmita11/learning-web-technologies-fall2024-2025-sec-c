document.getElementById('submitComplaint').addEventListener('click', function () {
    const firstName = document.getElementById('first_name').value;
    const lastName = document.getElementById('last_name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const complaint = document.getElementById('complaint').value;

    // Validation
    if (!complaint.trim()) {
        alert("Complaint details cannot be empty.");
        return;
    }

    let data = JSON.stringify({
        first_name: firstName,
        last_name: lastName,
        email: email,
        phone: phone,
        complaint: complaint,
    });

    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controller/complaintFormCheck.php', true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send('data=' + data);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
            alert(response.message);
        } else if (this.readyState == 4) {
            alert("Error submitting the complaint. Please try again.");
        }
    };
});
