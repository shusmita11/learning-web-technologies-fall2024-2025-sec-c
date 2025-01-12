<?php
session_start();
require_once('../model/updateModel.php');

    $input = json_decode(file_get_contents('php://input'), true);

    if ($input)
    {
        $empName = $input['empName'];
        $comName = $input['comName'];
        $phone = $input['phone'];
        $userName = $input['userName'];
        $password = $input['password'];
        
        $user = updateUser($empName, $comName, $phone, $userName, $password);

        if ($user)
        {       
            echo 'success';
        }
        
        else
        {
            echo 'invalid';
        }
    }
    
    else
    {
        var_dump($input);
        echo "error";
    }
