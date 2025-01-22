<?php
require_once '../model/patientModel.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $patients = listPatients();
    $patientData = [];

    while ($row = mysqli_fetch_assoc($patients)) {
        $patientData[] = $row;
    }

    echo json_encode($patientData);
    exit;
}
?>
