<?php
function getConnection() {
    $conn = mysqli_connect('localhost', 'root', '', 'web_project');
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    return $conn;
}

function fetchPendingAppointments($currentDate, $doctorEmail) {
    $conn = getConnection();

    // Get doctor ID based on email
    $doctorID = null;
    $sql = "SELECT id FROM doctor_info WHERE email = '$doctorEmail'";
    $result = mysqli_query($conn, $sql);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $doctorID = $row['id'];
    }

    // Fetch appointments for the doctor
    $appointments = [];
    if ($doctorID !== null) {
        $sql = "SELECT * FROM appointment_request WHERE doctor_id = '$doctorID' AND appointment_date >= '$currentDate'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $appointments[] = $row;
            }
        }
    }

    mysqli_close($conn);
    return $appointments;
}



// Fetch all appointments
function fetchAppointments($currentDate) {
    $conn = getConnection();
    $email = $_SESSION['email'];

    if ($_SESSION['type'] == 'admin') {
        $sql = "SELECT * FROM appointment_request WHERE appointment_date > '$currentDate'";
    }

    if ($_SESSION['type'] == 'patient') {
        $sql = "SELECT * FROM appointment_request WHERE appointment_date > '$currentDate' AND email='{$email}'";
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

        $sql = "SELECT * FROM appointment_request WHERE appointment_date > '$currentDate' AND doctor_id='{$doctorID}'";
    }

    $result = mysqli_query($conn, $sql);

    $appointments = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $appointments[] = $row;
        }
    }

    mysqli_close($conn);
    return $appointments;
}

// Archive appointments by moving them to the 'appointment_pending' table
function archiveAppointments($appointments) {
    $conn = getConnection();
    $success = true;

    foreach ($appointments as $appointment) {
        // Insert into the archive table
        $sqlInsert = "INSERT INTO appointment_pending (appointment_id, name, email, doctor_id, doctor_name, appointment_time, appointment_date, problem, token)
                      VALUES ('{$appointment['appointment_id']}', '{$appointment['name']}', '{$appointment['email']}', 
                              '{$appointment['doctor_id']}', '{$appointment['doctor_name']}', '{$appointment['appointment_time']}', 
                              '{$appointment['appointment_date']}', '{$appointment['problem']}', '{$appointment['token']}')";
        if (!mysqli_query($conn, $sqlInsert)) {
            $success = false;
        }

        // Optionally, delete the archived appointment from the original table (uncomment if needed)
        // $sqlDelete = "DELETE FROM appointment_request WHERE appointment_id = '{$appointment['appointment_id']}'";
        // if (!mysqli_query($conn, $sqlDelete)) {
        //     $success = false;
        // }
    }

    mysqli_close($conn);
    return $success;
}


?>
