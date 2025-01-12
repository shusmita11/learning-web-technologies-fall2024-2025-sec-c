<?php
function getConnection()
{
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'employee');
    return $conn;
}

function getUser()
{
    $users = [];
    $conn = getConnection();
    $sql = "select * from user_info";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        $users[] = $row;
    }

    //mysqli_close($conn);
    return $users;
}
?>