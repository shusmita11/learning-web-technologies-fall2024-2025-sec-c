<?php
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'employee');
    $input = json_decode(file_get_contents('php://input'), true);
    $userName = $_SESSION['del_user'];
    $sql = "delete from user_info where user_name='{$userName}'";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo 'sucess';
    }

    //mysqli_close($conn);
    echo 'error';
?>