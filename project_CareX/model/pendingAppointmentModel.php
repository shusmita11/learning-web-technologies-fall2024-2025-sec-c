<?php
function getConnection()
{
    $conn = mysqli_connect('localhost', 'root', '', 'web_project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function fetchPendingAppointments($currentDate)
{
    $conn = getConnection();
    $email = $_SESSION['email'];

    if ($_SESSION['type'] == 'admin') {
        $sql = "SELECT * FROM appointment_request WHERE appointment_date >= '$currentDate'";
    }

    if ($_SESSION['type'] == 'patient') {
        $sql = "SELECT * FROM appointment_request WHERE appointment_date >= '$currentDate' AND email='{$email}'";
    }

    if ($_SESSION['type'] == 'doctor') {
        $doctorID = null;
        $fetchSql = "SELECT id FROM doctor_info WHERE email='{$email}'";
        $checkResult = mysqli_query($conn, $fetchSql);

        if ($checkResult) {
            while ($row = mysqli_fetch_assoc($checkResult)) {
                $doctorID = $row['id'];
            }
        }

        $sql = "SELECT * FROM appointment_request WHERE appointment_date >= '$currentDate' AND doctor_id='{$doctorID}'";
    }

    $result = mysqli_query($conn, $sql);

    $pendingAppointments = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pendingAppointments[] = $row;
        }
    }

    mysqli_close($conn);
    return $pendingAppointments;
}
?>
