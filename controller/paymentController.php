<?php
session_start();

require_once '../model/appointmentBookingModel.php';
require_once '../model/paymentModel.php';

$input = json_decode(file_get_contents('php://input'), true);

if ($input) {
    $name = $input['name'];
    $email = $input['email'];
    $cardholderName = $input['cardholderName'];
    $cardNumber = $input['cardNumber'];
    $paymentMethod = $input['paymentMethod'];
    $expiryMonth = $input['expiryMonth'];
    $expiryYear = $input['expiryYear'];
    $cvv = $input['cvv'];

    if (!empty($_SESSION['appointment_info'])) {
        $appointmentInfo = $_SESSION['appointment_info'];

        // Book the appointment and get the generated appointment ID
        $appointmentID = bookAppointment(
            $appointmentInfo['name'],
            $appointmentInfo['email'],
            $appointmentInfo['doctorID'],
            $appointmentInfo['date'],
            $appointmentInfo['problem'],
            $appointmentInfo['token']
        );

        if ($appointmentID) {
            // Insert payment into the database with the generated appointment ID
            $payment = insertPayment(
                $name,
                $email,
                $cardholderName,
                $cardNumber,
                $paymentMethod,
                $expiryMonth,
                $expiryYear,
                $cvv,
                $appointmentID
            );

            if ($payment) {
                unset($_SESSION['appointment_info']); // Clear session data after success
                echo 'success';
            } else {
                echo 'Payment unsuccessful';
            }
        } else {
            echo 'Failed to book appointment';
        }
    } else {
        echo 'No appointment info found';
    }
}
