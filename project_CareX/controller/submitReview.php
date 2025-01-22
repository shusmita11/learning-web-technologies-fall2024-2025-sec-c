<?php
session_start();
require_once '../model/appointmentHistoryModel.php';

if (!isset($_SESSION['email'])) {
    header('Location: ../view/login.html');
    exit();
}

if (isset($_POST['reviewData'])) {
    $reviewData = $_POST['reviewData'];
    $data = json_decode($reviewData, true); // Decode as associative array

    if (isset($data['patient_name'], $data['patient_email'], $data['doctor_name'], $data['doctor_id'], $data['review'])) {
        $patient_name = $data['patient_name'];
        $patient_email = $data['patient_email'];
        $doctor_name = $data['doctor_name'];
        $doctor_id = $data['doctor_id'];
        $review = $data['review'];

        // Validate review length (if needed) on the server side
        if (strlen($review) < 10 || strlen($review) > 500) {
            echo "Review must be between 10 and 500 characters.";
            exit();
        }

        // Ensure the review only contains letters and spaces
        if (!ctype_alpha(str_replace(' ', '', $review))) {
            echo "Review can only contain letters and spaces.";
            exit();
        }

        $status = submitReview($patient_name, $patient_email, $doctor_name, $doctor_id, $review);

        if ($status) {
            echo "Review submitted successfully!";
        } else {
            echo "There was an error submitting your review.";
        }
    } else {
        echo "Invalid data.";
    }
} else {
    echo "No data received.";
}
?>
