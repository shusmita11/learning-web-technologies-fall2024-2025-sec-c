<?php
    session_start();
    require_once('../model/forgetPasswordModel.php');
    
    $input = json_decode(file_get_contents('php://input'), true);
    $email = $input['email'];
    $nid = $input['nid'];
    $password = $input['password'];

    $status = updatePassword($email, $nid, $password);

    if ($status)
    {
        echo 'success';
    }
    
    else
    {
        echo 'error';
    }
?>