<?php
session_start();

if (!isset($_SESSION['email'])) {
    echo "Error: Session email not found.";
    exit;
}

$session_email = $_SESSION['email'];

$host = "localhost";
$username = "root";
$password = "";
$database = "web_project";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
    exit;
}

$session_email = $_SESSION['email'];

// Use require to include the model
require_once '../model/userModelComplaint.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $jsonData = json_decode($_POST['data'], true);
    $first_name = $jsonData['first_name'];
    $last_name = $jsonData['last_name'];
    $email = $jsonData['email'];
    $phone = $jsonData['phone'];
    $complaint = $jsonData['complaint'];

    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($complaint)) {
        echo json_encode(["message" => "Please fill out all required fields."]);
        exit;
    }

    $user_info = fetchDataForComplaintBox($email);

    if ($user_info) {
        $success = storeComplaint($email, $user_info['first_name'], $user_info['last_name'], $user_info['phone'], $complaint);
        if ($success) {
            echo json_encode(["message" => "Complaint submitted successfully."]);
        } else {
            echo json_encode(["message" => "Error while submitting complaint."]);
        }
    } else {
        echo json_encode(["message" => "User not found."]);
    }
}
?>