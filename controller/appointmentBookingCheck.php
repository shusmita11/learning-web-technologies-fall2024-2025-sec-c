<?php
session_start();
require_once('../model/appointmentBookingModel.php');

$input = json_decode(file_get_contents('php://input'), true);

if($input)
{
    $name = $input['name'];
    $email = $input['email'];
    $problem = $input['problem'];
    $doctorID = $input['doctorID'];
    $date = $input['date'];
    
    $tokenCount = checkAppointmentSlot($doctorID, $date);

    if ($tokenCount >= 3)
    {
        echo "Sorry, the slot is full: $tokenCount";
    }

    else if(checkDuplicateAppointment($name, $email, $doctorID, $date, $problem, $tokenCount))
    {
        echo "You have already booked an appointment in this slot!";
    }

    else
    {
       echo 'success';
       $_SESSION['appointment_info'] = $input;
       $_SESSION['appointment_info']['token'] = $tokenCount+1;
    }
}
?>