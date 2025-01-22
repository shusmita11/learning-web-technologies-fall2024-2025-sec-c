<?php
session_start();
require_once('../model/appointmentHistoryModel.php');

function archiveExpiredAppointments()
{
    $currentDate = date('Y-m-d');
    $expiredAppointments = fetchExpiredAppointments($currentDate);

    $response = [];

    if (!empty($expiredAppointments))
    {
        $success = archiveAppointments($expiredAppointments);
        $response = 'appointment history';
    }

    else
    {
        $response = 'No appointment history';
    }
    echo json_encode($response);
}
?>
