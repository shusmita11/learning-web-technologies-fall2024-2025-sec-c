<?php

function getConnection()
{
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'web_project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function fetchDataForComplaintBox($email)
{
    $conn = getConnection();
    $sql = "SELECT first_name, last_name, phone, email FROM user_info WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

function storeComplaint($email, $firstName, $lastName, $phone, $complaint)
{
    $conn = getConnection();
    $sql = "INSERT INTO pcomplaints (email, first_name, last_name, phone, complaint) 
            VALUES ('$email', '$firstName', '$lastName', '$phone', '$complaint')";
    return mysqli_query($conn, $sql);
}
?>
