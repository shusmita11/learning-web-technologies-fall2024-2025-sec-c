function archiveAppointments() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/doctorAppointmentController.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            var response = JSON.parse(xhttp.responseText);
            alert(response.message);

            if (response.status === 'success') {
                location.reload();
            }
        }
    };

    xhttp.send("action=archive");
}
