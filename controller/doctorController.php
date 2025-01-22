<?php
require_once '../model/doctorModelForAdmin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'add') {
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $name = trim($_POST['name']);
        $available_time = trim($_POST['available_time']);
        $speciality = $_POST['speciality'];
        $hospital = trim($_POST['hospital']);
        $password = trim($_POST['password']);

        $isAdded = addDoctor($phone, $email, $name, $available_time, $speciality, $hospital, $password);
        if ($isAdded) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
        exit;
    }

    if ($action === 'delete') {
        $id = intval($_POST['id']);
        deleteDoctor($id);
        echo json_encode(['status' => 'success']);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $doctors = listDoctors();
    $doctorData = [];

    while ($row = mysqli_fetch_assoc($doctors)) {
        $doctorData[] = $row;
    }

    echo json_encode($doctorData);
    exit;
}
?>
