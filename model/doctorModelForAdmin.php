<?php
function connectDatabase() {
    $conn = mysqli_connect("localhost", "root", "", "web_project");
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function listDoctors() {
    $conn = connectDatabase();
    $sql = "SELECT * FROM doctor_info";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function addDoctor($phone, $email, $name, $available_time, $speciality, $hospital, $password) {
    $conn = connectDatabase();
    
    // Sanitize input to prevent SQL injection
    $phone = mysqli_real_escape_string($conn, $phone);
    $email = mysqli_real_escape_string($conn, $email);
    $name = mysqli_real_escape_string($conn, $name);
    $available_time = mysqli_real_escape_string($conn, $available_time);
    $speciality = mysqli_real_escape_string($conn, $speciality);
    $hospital = mysqli_real_escape_string($conn, $hospital);
    $password = mysqli_real_escape_string($conn, $password);

    // Insert data into the database
    $sql = "INSERT INTO doctor_info (phone, email, name, available_time, speciality, hospital, password) 
            VALUES ('$phone', '$email', '$name', '$available_time', '$speciality', '$hospital', '$password')";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
   
}

function deleteDoctor($id) {
    $conn = connectDatabase();
    $sql = "DELETE FROM doctor_info WHERE id = $id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
?>
