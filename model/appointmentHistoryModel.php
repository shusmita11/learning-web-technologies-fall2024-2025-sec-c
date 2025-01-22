<?php
function getConnection()
{
    $conn = mysqli_connect('localhost', 'root', '', 'web_project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function fetchExpiredAppointments($currentDate)
{
    $conn = getConnection();
    $email = $_SESSION['email'];

    if ($_SESSION['type'] == 'admin') {
        $sql = "SELECT * FROM appointment_request WHERE appointment_date < '$currentDate'";
    }

    if ($_SESSION['type'] == 'patient') {
        $sql = "SELECT * FROM appointment_request WHERE appointment_date < '$currentDate' AND email='{$email}'";
    }

    if ($_SESSION['type'] == 'doctor') {
        $doctorID = null;
        $fetchSql = "SELECT id FROM doctor_info WHERE email='{$email}'";
        $conn = getConnection();
        $checkResult = mysqli_query($conn, $fetchSql);

        if ($checkResult) {
            while ($row = mysqli_fetch_assoc($checkResult)) {
                $doctorID = $row['id'];
            }
        }

        $sql = "SELECT * FROM appointment_request WHERE appointment_date < '$currentDate' AND doctor_id='{$doctorID}'";
    }

    $result = mysqli_query($conn, $sql);

    $expiredAppointments = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $expiredAppointments[] = $row;
        }
    }

    mysqli_close($conn);
    return $expiredAppointments;
}

function uploadFileForAppointment($appointmentID, $filePath)
{
    $conn = getConnection();
    $sql = "UPDATE appointment_request SET file_path='{$filePath}' WHERE appointment_id='{$appointmentID}'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function fetchPatientDetailsByEmail($email)
{
    $conn = getConnection();
    $sql = "SELECT * FROM user_info WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $patient_details = null;
    if ($result && mysqli_num_rows($result) > 0) {
        $patient_details = mysqli_fetch_assoc($result);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $patient_details;
}

function submitReview($patient_name, $patient_email, $doctor_name, $doctor_id, $review)
{
    $conn = getConnection();

    $sql = "INSERT INTO reviews (patient_email, patient_name, doctor_name, doctor_id, review, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, NOW(), NOW())"; // Use NOW() to insert current timestamps

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sssis", $patient_email, $patient_name, $doctor_name, $doctor_id, $review);

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $result;
}

