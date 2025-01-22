<?php
session_start();
function getConnection()
{
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'web_project');
    return $conn;
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $input = json_decode(file_get_contents('php://input'), true);
    
    if($input)
    {
        $email = $input['email'];
        $nid = $input['nid'];

        $conn = getConnection();
        $checkSql = "SELECT * FROM user_info WHERE email = '{$email}' OR nid = '{$nid}'";
        $checkResult = mysqli_query($conn, $checkSql);

        if (mysqli_num_rows($checkResult) > 0)
        {
            echo "Email or NID already registered";

        }
        
        else
        {
            echo "success";
            $_SESSION['userData'] = $input;
        }
    }
    
    else
    {
        var_dump($input);
    }
}
?>
