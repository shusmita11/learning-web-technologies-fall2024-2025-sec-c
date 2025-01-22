function reviewValidate() {
    let review = document.getElementById('review').value.trim();

    if (review === '') {
        document.getElementById('msg').innerHTML = "Review cannot be empty!";
        return false;
    }

    if (review.length < 10) {
        document.getElementById('msg').innerHTML = "Review must be at least 10 characters long!";
        return false;
    }

    if (review.length > 500) {
        document.getElementById('msg').innerHTML = "Review cannot be more than 500 characters!";
        return false;
    }

    // validation for only letter and spaces
    for (let i = 0; i < review.length; i++) {
        let char = review[i];
        let charCode = char.charCodeAt(0);
    
        if (!((charCode >= 65 && charCode <= 90) ||  (charCode >= 97 && charCode <= 122) || charCode === 32)) // Space
        {                   
            document.getElementById('msg').innerHTML = "Review can only contain letters and spaces.";
            return false;
        }
    }
    

    document.getElementById('msg').innerHTML = "";
    return true;
}

function submitReviewAjax() {
    let patientName = document.getElementById('patient_name').value.trim();
    let patientEmail = document.getElementById('patient_email').value.trim();
    let doctorName = document.getElementById('doctor_name').value.trim();
    let doctorId = document.getElementById('doctor_id').value.trim();
    let review = document.getElementById('review').value.trim();

    // Validate the review before submitting
    if (!reviewValidate()) {
        return false;
    }

    let reviewData = {
        'patient_name': patientName,
        'patient_email': patientEmail,
        'doctor_name': doctorName,
        'doctor_id': doctorId,
        'review': review
    };

    let reviewJSON = JSON.stringify(reviewData);

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/submitReview.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('reviewData=' + reviewJSON);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            alert("Review submitted successfully!");
            window.location.replace('../view/appointmentHistory.php');
        }
    };

    return false;
}
