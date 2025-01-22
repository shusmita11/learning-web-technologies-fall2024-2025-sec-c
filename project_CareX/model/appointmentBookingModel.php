<?php
//session_start();
require_once 'databaseConnection.php';


function selectDoctor()
{
    $conn = getConnection();

    $sql = "SELECT id, name, available_time FROM doctor_info";
    $result = mysqli_query($conn, $sql);

    if ($result === false)
    {
        echo "Error in query: " . mysqli_error($conn);
    }
    
    else
    {
        if (mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                echo "<option value=\"{$row['id']}\">Dr. {$row['name']} ({$row['available_time']})</option>";
            }
        }
        
        else
        {
            echo "<option>No doctors available</option>";
        }
    }
    mysqli_close($conn);
}

function checkAppointmentSlot($doctorID, $date)
{
    $conn = getConnection();

    $sql = "SELECT COUNT(*) as token_count 
            FROM appointment_request 
            WHERE doctor_id = '{$doctorID}' 
            AND appointment_date = '{$date}'";

    $result = mysqli_query($conn, $sql);

    if (!$result)
    {
        die("Error in query in func checkAppointmentSlot: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    return $row['token_count'];
}

function checkDuplicateAppointment($name, $email, $doctorID, $date, $problem, $token)
{
    $conn = getConnection();
    $checkSql = "SELECT * FROM appointment_request 
                WHERE email = '{$email}' AND doctor_id = '{$doctorID}' AND appointment_date = '{$date}'";

    $checkResult = mysqli_query($conn, $checkSql);

    if (!$checkResult)
    {
        die("Error checking duplicate appointment: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($checkResult) > 0)
    {
        mysqli_close($conn);
        return true;
    }
}


function bookAppointment($name, $email, $doctorID, $date, $problem, $token)
{
    $conn = getConnection();
    $fetch = "SELECT name, available_time FROM doctor_info WHERE id = '{$doctorID}'";
    $result = mysqli_query($conn, $fetch);

    if (!$result || mysqli_num_rows($result) === 0) {
        die("Error fetching doctor info: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    $doctorName = $row['name'];
    $available_time = $row['available_time'];

    $sql = "INSERT INTO appointment_request 
            (name, email, doctor_id, doctor_name, appointment_time, appointment_date, problem, token) 
            VALUES 
            ('{$name}', '{$email}', '{$doctorID}', '{$doctorName}', '{$available_time}', '{$date}', '{$problem}', '{$token}')";

    if (mysqli_query($conn, $sql)) {
        $appointmentID = mysqli_insert_id($conn); // Get the auto-generated appointment ID
        mysqli_close($conn);
        return $appointmentID; // Return the appointment ID
    } else {
        die("Error booking appointment: " . mysqli_error($conn));
    }
}

?>