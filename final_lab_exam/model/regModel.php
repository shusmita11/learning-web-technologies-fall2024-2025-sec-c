<?php
function getConnection()
{
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'employee');
    return $conn;
}

function addUser($empName, $comName, $phone, $userName, $password)
{

    $conn = getConnection();
    $sql = "INSERT INTO user_info VALUES('{$empName}', '{$comName}', '{$phone}', '{$userName}', '{$password}')";
    if (mysqli_query($conn, $sql))
    {
        return true;
    }
    
    else
    {
        return false;
    }
}
?>