<?php

require_once 'databaseConnection.php';
    
    function insertPayment($name, $email, $cardholderName, $cardNumber, $paymentMethod, $expiryMonth, $expiryYear, $cvv, $appointmentID)
    {
        $conn = getConnection();

        $sql = "INSERT INTO payment (user_email, payment_method, name, cardholder_name, card_number, expiry_month, expiry_year, cvv, appointment_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssssssss', $email, $paymentMethod, $name, $cardholderName, $cardNumber, $expiryMonth, $expiryYear, $cvv, $appointmentID);
        $result = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        return $result;
    }


    function fetchPaymentHistory($email)
    {
        $payments = [];
        $conn = getConnection();
        $sql = "SELECT id, name, user_email, card_number, appointment_id FROM payment WHERE user_email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $payments[] = $row;
            }
        } else {
            echo "Error in query: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $payments;
    }

?>
