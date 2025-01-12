<?php
function getConnection()
{
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'employee');
    return $conn;
}

function updateUser($empName, $comName, $phone, $userName, $password)
{
    $conn = getConnection();
    $sql = "update user_info set emp_name = '{$empName}', com_name='{$comName}', contact_no='{$phone}', password='{$password}'where user_name='{$userName}'";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        return true;
    }

    //mysqli_close($conn);
    return false;
}
?>