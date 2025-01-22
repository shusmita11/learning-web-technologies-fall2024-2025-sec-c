<?php
function getConnection()
{
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'web_project');
    return $conn;
}

function addUser($first_name, $last_name, $email, $phone, $nid, $pass, $dob, $gender, $address, $med_history, $emergency_contact)
{
    $conn = getConnection();
    $sql = "INSERT INTO user_info VALUES('{$first_name}', '{$last_name}', '{$email}', '{$phone}', '{$nid}', '{$pass}', '{$dob}', '{$gender}', '{$address}', '{$med_history}', '{$emergency_contact}')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
?>