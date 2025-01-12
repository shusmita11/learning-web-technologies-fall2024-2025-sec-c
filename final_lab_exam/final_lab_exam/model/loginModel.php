<?php
function getConnection()
{
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'employee');
    return $conn;
}

function getUser($userName, $password)
{

    $conn = getConnection();
    $sql = "select * from user_info where user_name ='{$userName}' and password='{$password}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    
    if($count == 1);
    {
        $_SESSION['userName'] = $userName;
        $_SESSION['password'] = $password;
        return true;
    }

    return false;
}
?>