<?php

function getConnection() {
    $conn = mysqli_connect('localhost', 'root', '', 'web_project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function fetchUserDataByEmail($email) {
    $conn = getConnection();
    $sql = "SELECT * FROM user_info WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

function updateUserPassword($currentEmail, $newPassword) {
    $conn = getConnection();
    $currentEmail = mysqli_real_escape_string($conn, $currentEmail);
    $newPassword = mysqli_real_escape_string($conn, $newPassword);

    $sql = "UPDATE user_info SET password = '$newPassword' WHERE email = '$currentEmail'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    return $result;
}
?>
