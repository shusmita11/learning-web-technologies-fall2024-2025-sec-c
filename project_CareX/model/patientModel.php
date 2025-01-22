<?php
function connectDatabase() {
    $conn = mysqli_connect("localhost", "root", "", "web_project");
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
function listPatients() {
    $conn = connectDatabase();
    $sql = "SELECT * FROM user_info";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function addPatient($firstName, $lastName, $phone, $email) {
    $conn = connectDatabase();
    $sql = "INSERT INTO user_info (first_name, last_name, phone, email) VALUES ('$firstName', '$lastName', '$phone', '$email')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
?>
