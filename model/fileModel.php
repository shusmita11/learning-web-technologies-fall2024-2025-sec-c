<?php

//     require_once 'appointmentHistoryModel.php';

// function getConnection()
// {
//     $conn = mysqli_connect('localhost', 'root', '', 'web_project');
//     if (!$conn) {
//         die("Database connection failed: " . mysqli_connect_error());
//     }
//     return $conn;
// }

// function uploadFileForAppointment($appointment_id, $file_url)
// {
//     $conn = getConnection();

//     $sql = "UPDATE appointment_request SET file_path = ? WHERE appointment_id = ?";
//     $stmt = mysqli_prepare($conn, $sql);

//     if ($stmt) {
//         mysqli_stmt_bind_param($stmt, 'si', $file_url, $appointment_id);
//         $result = mysqli_stmt_execute($stmt);
//         mysqli_stmt_close($stmt);
//     } else {
//         $result = false;
//     }

//     mysqli_close($conn);

//     return $result;
// }

?>
