<?php
session_start();
require_once '../model/appointmentHistoryModel.php';

if (!isset($_SESSION['email'])) {
    die("Access denied. Please log in.");
}

$patient_email = $_SESSION['email'];
$doctor_name = $_REQUEST['doctor_name'];
$doctor_id = $_REQUEST['doctor_id'];

$patient_details = fetchPatientDetailsByEmail($patient_email); // Function to fetch patient details by email
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Doctor</title>
    <link rel="stylesheet" href="../asset/style_reviewDoctor.css">
</head>
<body>
    <h1>Review Doctor</h1>

    <div class="form-container">
        <?php if (isset($patient_details)): ?>
            <form id="reviewForm" method="POST" action="#" onsubmit="return submitReviewAjax()">
                <label for="patient_name">Patient Name</label>
                <input type="text" id="patient_name" name="patient_name" value="<?= htmlspecialchars($patient_details['first_name']); ?>" readonly><br><br>

                <label for="patient_email">Patient Email</label>
                <input type="email" id="patient_email" name="patient_email" value="<?= htmlspecialchars($patient_details['email']); ?>" readonly><br><br>

                <label for="doctor_name">Doctor Name</label>
                <input type="text" id="doctor_name" name="doctor_name" value="<?= htmlspecialchars($doctor_name); ?>" readonly><br><br>

                <label for="doctor_id">Doctor ID</label>
                <input type="text" id="doctor_id" name="doctor_id" value="<?= htmlspecialchars($doctor_id); ?>" readonly> <br><br>

                <label for="review">Your Complaint/Review</label><br>
                <textarea id="review" name="review" rows="6" placeholder="Write your review here..."></textarea><br><br>
                
                <div id="msg" style="color: red;"></div><br>

                <input type="submit" value="Submit Review">
            </form>
        <?php else: ?>
            <p>Doctor or patient details not found.</p>
        <?php endif; ?>
    </div>

    <script src="../asset/js/submitReview.js"></script>
</body>
</html>
