function booking()
{
    let name = document.getElementById('name').textContent.replace("Name: ", "").trim();
    let email = document.getElementById('email').textContent.replace("Email: ", "").trim();
    let problem = document.getElementById('problem').value.trim();
    let doctorID = document.getElementById('doctorID').value;
    let date = document.getElementById('date').value;

    //validation
    if (problem === "")
    {
        alert("Please describe your problem");
        return;
    }

    if (doctorID === "")
    {
        alert("Please select a doctor.");
        return;
    }

    if (date === "")
    {
        alert("Please select an appointment date.");
        return;
    }
    console.log("Booking:", { name, email, problem, doctorID, date });

    //AJAX request
    const xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/appointmentBookingCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/json");

    //JSON object
    const info = JSON.stringify({
        name: name,
        email: email,
        doctorID: doctorID,
        date: date,
        problem: problem
        });
    
        xhttp.send(info);
    
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200){
                const response = this.responseText;
                if (response === 'success')
                {
                    alert("Proceed to payment");
                    window.location.href = "../view/payment.php";
                }
                
                else
                {
                    alert(response);
                }
            }
        };
}


function goBack()
{
    window.location.href = "../view/patientDashboard.php";
}